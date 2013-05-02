<?php
/**
 * Wrapper class for querying data from the database.
 * This function relies heavily on the ezSQL wrapper class
 * developed by Justin Vincent. The code for the class can be found at
 * https://github.com/jv2222/ezSQL. The class enables easy connection and querying.
 */

//include_once SITE_DIR . '/standard/tp-error.php';

/**
 * Inspired by ezSQL.
 */

include_once 'tp_error.php';

class TP_Query{
	var $tpq_user;
	var $tpq_pass;
	var $tpq_host;

	function TP_Query( $user = null, $pass = null ) {
		$this->tpq_host = TP_HOST;
		if( !is_null( $user ) && !is_null( $pass  ) ) {
			$this->tpq_user = $user;
			$this->tpq_pass = $pass;
		} else {
			$this->tpq_user = TP_USER;
			$this->tpq_pass = TP_PASS;
		}
	}

	//Connect to server, not a database
	function connect() {
		var_dump($tpq_user);
		var_dump($tpq_host);
		var_dump($tpq_pass);
		if( ( $this->connection = mysql_connect( $this->tpq_host, $this->tpq_user, $this->tpq_pass ) ) == false ) {
			$error = new TP_Error( 'db_error', 'Could not select database: ' . TP_DB_NAME );
			$error->display();
			mysql_error();
			die();
		}
	}
	
	//Wrap the function so we can just call $this->quick_connect
	function quick_connect() {
		$this->connect();
		if( @mysql_select_db( TP_DB_NAME ) == false ) {
			$error = new TP_Error( 'db_error', 'Could not select database: ' . TP_DB_NAME );
			$error->display();
			die();
		}
	}

	function check_db() {
		$this->connect();
		$db_check = @mysql_select_db( TP_DB_NAME );
		$this->disconnect();
		return $db_check;
	}

	//Better way to determine dropping vs creation?
	function create_database( $db_name, $drop_if_exists = true) {
		$query = "";

		$this->connect();
		
		//Drop it if it exists
		if($drop_if_exists)
			@mysql_query( "DROP DATABASE IF EXISTS " . $db_name . ';' );

		@mysql_query( "CREATE DATABASE " . $db_name );

		$this->disconnect();
	}

	function drop_table( $table_name ) {
		$this->quick_connect();
		@mysql_query( "DROP TABLE IF EXISTS " . $table_name . ';' );
		$this->disconnect();
	}

	//ezSQL doesn't like queries that don't return a "result", like table creations
	//Let's handle those semi-independetly
	function create_table ( $table_query, $drop_table = false ) {
		if( $table_query == null )
			return null;

		if( !$drop_table )
			$this->drop_table( $table_name );

		$this->quick_connect();
		if( !mysql_query( $table_query ) ) {
			$error = new TP_Error( 'db_error', 'Could not create the table.' );
			$error->display();
			die();
		}
		$this->disconnect();
	}

	function prepare( $query, $arguments = array() ) {
		return vsprintf( $query, $arguments );
	}

	function query( $query = null ) {
		if( $query == null )
			return null;

		//Quick connect to the db
		$this->quick_connect();
		//User should always call prepare before submitting a query
		$results = @mysql_query( $query );

		if( !$results ) {
			$error = new TP_Error( 'db_error', 'Could not complete the query.' );
			if( DEBUG ) {
				var_dump( $query );
				mysql_error();
			}

			$error->display();
			die();
		} else {
			$results_array = array();
			if( is_bool( $results ) )
				return true;
			while( $row = mysql_fetch_assoc( $results ) ) {
				$results_array[] = $row;
			}
			return $results_array;
		}
		$this->disconnect();
	
	}

	function disconnect() {
		if( mysql_close( $this->connection ) == false ) {
			$error = new TP_Error( 'db_error', 'Could not close the connection.' );
			$error->display();
			die();
		} else
			return true;
	}
}


global $tp_query;
$tp_query = new TP_Query();
