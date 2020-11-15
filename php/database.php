<?php 
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");

?>