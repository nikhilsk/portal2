<?php
$host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  
  $workshopquery=mysqli_query($conn,"Select * from resources where category='workshops'");
  $webinarquery=mysqli_query($conn,"Select * from resources where category='webinars'");
  $projectsquery=mysqli_query($conn,"Select * from resources where category='projects'");
  
  if (isset($_GET['file_id'])) 
{
    $id = $_GET['file_id'];


    // fetch file to download from database
    $sql = "SELECT * FROM resources WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/'.$file['file'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/'.$file['file']));
        readfile('../uploads/'.$file['file']);

        // Now update downloads count
        $newCount = $file['dcount'] + 1;
        $updateQuery = "UPDATE resourses SET dcount=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>