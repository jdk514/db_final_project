<?php

function get_option( $option_key ) {
	global $tp_query;

	$query = "SELECT option_value FROM tp_site_options WHERE option_key = '$option_key'";
	$option_value = $tp_query->query( $query );
	return $option_value[0]['option_value'];
}

function set_option( $option_key, $option_value ) {
	global $tp_query;

	$query = "UPDATE tp_site_options SET option_value = $option_value WHERE option_key = '$option_key'";
	$option_value = $tp_query->query( $query );
}