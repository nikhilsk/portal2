<?php include 'database.php';
// session_destroy();

// $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);
$name= $_SESSION['current_file_name']."\n";
header("location:$name");
?>