<?php
require_once 'include/db_mysql.php';
$hostname="localhost";
$username="jdk514";
$password="s3cr3t201e";
$usertable="jdk514";

$db = new db;
$db->connect($hostname, $username, $password, $usertable,1);
unset($hostname, $username, $password, $usertable);
?>