<?php
$host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  
  
  if (isset($_GET['file_id'])) 
{
    $id = $_GET['file_id'];
    // fetch file to download from database
    $sql = "SELECT * FROM resources WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/'.$file['file'];

    if (file_exists($filepath)||$file['file']==NULL) 
    {
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
        $updateQuery =  mysqli_query($conn, "update resources set dcount='$newCount' WHERE id='$id'");
        header("location:testing.php");
        //header("Refresh:0 ; url=testing.php");
        
        exit;
        
    }
}
?>