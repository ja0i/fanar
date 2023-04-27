<?php
error_reporting(E_NOTICE || E_CORE_WARNING || E_USER_WARNING) ;
$username = "root";
$password = "";
$server = "localhost";
$dbName = "web_info";

$connect = mysqli_connect($server,$username,$password,$dbName);
?>