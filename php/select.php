<?php 
session_start();
// $tbl = $_SESSION["tno"];
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");
$json = file_get_contents("php://input");
$data = json_decode($json,true);
//echo "he";
echo strlen($json);
// echo isset($data["emp_id"])?1:0;
echo isset($data["employee_id"])?1:0;
 if(isset($_POST["employee_id"]))  
 {  
     echo "he";
      $output = '';  
    //   $connect = mysqli_connect("localhost", "root", "", "testing");  
      // $query = "SELECT * FROM resources WHERE id = '".$_POST["employee_id"]."'";  
      // $result = mysqli_query($conn, $query);  
      // $output .= '  
      // <div class="table-responsive">  
      //      <table class="table table-bordered">';  
    //   while($row = mysqli_fetch_array($result))  
    //   {  
    //        $output .= `  
    //             <tr>  
    //                  <td width="30%"><label>Name</label></td>  
    //                  <td width="70%">'.$row["uploader"].'</td>  
    //             </tr>  
                  
    //             `;  
    //   }  
      // $output .= "</table></div>";   
 }  
 ?>
