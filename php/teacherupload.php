<?php 
session_start();
$tbl = $_SESSION["tno"];
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");

$_SESSION['teacherupload']=$_SESSION['name'];
header("location:testing.php");
?>