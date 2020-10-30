<?php 
session_start();
$tbl = $_SESSION["tno"];
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");

session_destroy();

header("location:login.php");
?>