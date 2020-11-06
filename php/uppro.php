<?php 
session_start();
// $tbl = $_SESSION["tno"];
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");
$nameofteacher=$_SESSION['name'];
session_destroy();
// session_start();
$_SESSION['myupload']=$nameofteacher;
$_SESSION['name']=$nameofteacher; 
header("location:testing.php");

?>