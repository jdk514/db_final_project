<?php
if( !class_exists( 'TP_USER' ) ) {

class TP_User {
	
	function TP_User( $uid ) {
		global $tp_query;
		$query = "SELECT * FROM tp_users WHERE uid = $uid";
		$user = $tp_query->query( $query );
		$user = $user[0];
		$this->uid = $user['uid'];
		$this->address_id = $user['address_id'];
		$this->fname = $user['fname'];
		$this->lname = $user['lname'];
		$this->user_name = $user['user_name'];
		$this->user_email = $user['user_email'];
		$this->date_registered = $user['date_registered'];
		$this->role_id = $user['role_id'];
	}

}

function create_user( $user_id ) {
	if( !isset( $GLOBALS['tp_user'] ) ) {
		$GLOBALS['tp_user'] = new TP_User( $user_id );
	}
}

function is_user_logged_in() {
	if( isset( $GLOBALS['tp_user'] ) ) {
		return true;
	} else {
		return false;
	}
}

function user_is_student() {
	if( isset( $GLOBALS['tp_user'] ) ) {
		global $tp_user;
		if( $tp_user->role_id == 1 ){
			return true;
		}
		else {
			return false;
		}
	}
}

function get_role_info( $rid ) {
	global $tp_query;

	$query = "SELECT * FROM tp_roles WHERE rid = $rid;";
	$role_info = $tp_query->query( $query );

	return $role_info[0];
}

}

function get_user_meta( $user_id, $meta_key ) {
	global $tp_query;

	$query = "SELECT meta_val FROM tp_users_meta WHERE meta_key = '$meta_key' AND user_id = $user_id;";
	$get = $tp_query->query( $query );

	if( !empty( $get ) )
		return $get[0]['meta_val'];
	else
		return false;
}

function set_user_meta( $user_id, $meta_key, $meta_val ) {
	global $tp_query;

	if (! get_user_meta( $user_id, $meta_key ) ) {
		$query = "INSERT INTO tp_users_meta ( user_id, meta_key, meta_val) VALUES( $user_id, '$meta_key', '$meta_val' );";
	} else {
		$query = "UPDATE tp_users_meta SET meta_val = $meta_val WHERE meta_key = '$meta_key' AND user_id = $user_id;";
	}
	$tp_query->query( $query );
}

if( isset( $_SESSION['user_login'] ) )
	create_user( $_SESSION['user_login'] );