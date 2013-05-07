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

function get_user_address( $user_id ) {
	global $tp_query;

	$query = "SELECT * FROM tp_address WHERE user_id = $user_id";
	return array_shift( $tp_query->query( $query ) );
}

function update_address() {
	global $tp_user, $tp_query;

	$user_id = $tp_user->uid;
	$street_1 = $_POST['street1'];
	$street_2 = $_POST['street2'];
	$state_prov = $_POST['state_prov'];
	$zipcode = $_POST['zipcode'];
	$city = $_POST['city'];

	$query = "SELECT address_id FROM tp_users WHERE uid = $user_id";

	$user_address = $tp_query->query( $query );
	$user_address = array_shift( $user_address );
	if( is_null( $user_address['address_id'] ) ) {
		$query = "INSERT INTO tp_address(user_id, street1, street2, state_prov, zipcode, city) VALUES ($user_id, $street_1, $street_2, $state_prov, $zipcode, $city);";
		$tp_query->query( $query );

		$query = "SELECT aid FROM tp_address WHERE user_id = $user_id;";

		$addr_id = $tp_query->query( $query );
		$addr_id = array_shift( $addr_id );
		$addr_id = $addr_id['aid'];

		$query = "UPDATE tp_users SET address_id = $addr_id WHERE uid = $user_id;";
		$tp_query->query( $query );
	} else {
		$query = "UPDATE tp_address SET street1 = '$street_1', street2 = '$street_2', state_prov = '$state_prov', zipcode = '$zipcode', city = '$city' WHERE user_id = $user_id;";
		$tp_query->query( $query );
	}
}

if( isset( $_SESSION['user_login'] ) )
	create_user( $_SESSION['user_login'] );