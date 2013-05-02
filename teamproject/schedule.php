<?php 
include 'header.php';

if( !isset( $_GET['department'] ) )
	include('course-list.php');
else
	include('course-department.php');

 ?>

<?php include 'footer.php' ?>
