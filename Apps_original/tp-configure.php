<?php

function find_current_page() {
	$current_page = $_SERVER['REQUEST_URI'];
	if( $current_page == '/' )
		$current_page = 'index.php';
	else {
		$last_slash = strrpos( $current_page, '/' );
		if( $last_slash !== false ) {
			$current_page = substr( $current_page, $last_slash + 1);
		} else {
			$current_page = null;
		}
	}
	return $current_page;
}
//Flippable constants, making things easy to modify
//define( 'TP_USER', 'cojennin' );
//define( 'TP_PASS', 'Swnny.D8y!' );
define( 'TP_USER', 'root');
define( 'TP_PASS', 'root');
define( 'TP_HOST', 'localhost' );
define( 'TP_DB_NAME', 'newteamproject' );
define( 'DEBUG', true);
define( 'SITE_DIR', '/~jennings/' );
define( 'SITE_ABS', 'http://' . $_SERVER['HTTP_HOST'] . '/~jdk514/dbproject/test/');
define( 'SINGLE', true );
//define( 'SITE_ABS', 'http://' . $_SERVER['HTTP_HOST'] .'/' );
$GLOBALS['pagenow'] = find_current_page();
?>