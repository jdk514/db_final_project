<?php 
include_once '../../header.php';

$user_id = 1;

if( !isset( $user_id ) ){
	echo '<div id="main">';
	echo '<p>You must be logged in to view this page.</p>';
	echo '</div>';
}
else
	//get_role()
	//if role is student
	include('transcript-display.php');
	//else if - views for other roles

 ?>

<?php include_once SITE_DIR . 'footer.php'; ?>
