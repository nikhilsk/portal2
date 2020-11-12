<?php 
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);

$conn ->select_db($db) or die( "Unable to select database");
 
if (isset($_GET['file_id'])) 
{
    $confirma= "<script> confirm('Confirm to remove');</script>";
    //echo $confirma;
    if($confirma== true)
    {
        $id = $_GET['file_id'];
        $sql=  "delete from resources where id=$id";
        $sqlq = "SELECT * FROM resources WHERE id=$id";
        $result = mysqli_query($conn, $sqlq);
        $file = mysqli_fetch_assoc($result);
        
        if((mysqli_query($conn,$sql)))
        {
            unlink("../uploads/".$file['file']);    
            header("location:testing.php");
            
        }
        else
        {
            header("location:testing.php");   
        }
        
    }
    else
    {
        header("location:testing.php");   
        
    }
    exit;
}

?>
