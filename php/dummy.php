<?php

include 'database.php';
if(isset($_GET['nameid']))
{
//     $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

//    echo json_encode($age);
$id=$_GET['nameid'];
$que= mysqli_query($conn,"select * from resources where id='$id'");
$q=mysqli_fetch_assoc($que);

$arr=array("name"=>$q['filename'],"descrip"=>$q['descrip'],"link"=>$q['link'],"drive"=>$q['drivelink'],"category"=>$q['category']);
echo json_encode($arr);
}

?>