<?php 
include 'database.php';
 
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
            if($file['category']=='workshops'){
                header("location:workshop.php");}
            else if($file['category']=='projects'){
                header("location:projects.php");}
            else if($file['category']=='research'){
                header("location:research.php");}
            else if($file['category']=='webinars'){
                    header("location:webinar.php");}
            
            unlink("../uploads/".$file['file']);
        }
        else
        {
            header("location:testing.php");   
        }
        exit;
    }
    else
    {
        header("location:testing.php");   
        exit;
    
    }

}

?>
