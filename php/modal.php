<?php 
// session_start();
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);
$conn ->select_db($db) or die( "Unable to select database");

if(isset($_GET['file_id']))
{
    $_SESSION['modid']=$_GET['file_id'];
}


$qid=$_SESSION['modid'];
// echo $qid;
$que= mysqli_query($conn,"select * from resources where id='$qid'");
$q=mysqli_fetch_assoc($que);
// echo $_SESSION['modid'];
// header("location:testing.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />
    <link rel="stylesheet" href="../css/layout.css" />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    ></script>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    
    <title>Document</title>
</head>
<body>
<article class="message is-link ">
  <div class="message-header">
    <p><?php echo $q['filename']; ?></p>
    <button class="delete" aria-label="delete"></button>
  </div>
  <div class="message-body">
  <div class="subtitle">Message</div>
    <?php echo $q['descrip'];?>
  </div>
</article>
</body>
</html>