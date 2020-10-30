<?php
  session_start();
     $host='localhost';
     $user='root';
     $password='';
     $db='portal';
     
     $conn = new mysqli($host, $user, $password,$db);
     
     $conn ->select_db($db) or die( "Unable to select database");
     
  if(isset($_POST['emailid']))
  {
    $_SESSION['loginid']=$_POST['emailid'];
    
    $myusername = mysqli_real_escape_string($conn, $_POST['emailid']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['psw']);
    echo $mypassword;
    echo $myusername;
    $helloname= mysqli_query($conn, "SELECT * from login WHERE email= '$myusername' and passwords='$mypassword'");
    $name1=$helloname->fetch_assoc();
   $_SESSION['name']=$name1['username'];
   echo $_SESSION['name'];
   $_SESSION['pass']=$mypassword;
   echo $_SESSION['pass'];

    header("location:main.php");
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/login.css" />
    <script src="../js/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <div class="pen-title">
      <h1>Login Form</h1>
      <!-- <span
        >Pen <i class="fa fa-code"></i> by
        <a href="http://andytran.me">Andy Tran</a></span
      > -->
    </div>
    <div class="container">
      <div class="card"></div>
      <div class="card">
        <h1 class="title">Login</h1>
        <form action="" method="post">
          <div class="input-container">
            <input type="email" name="emailid" required />
            <label for="emailid">Email</label>
            <div class="bar"></div>
          </div>
          <div class="input-container">
            <input type="password" name="psw" required />
            <label for="psw">Password</label>
            <div class="bar"></div>
          </div>
          <div class="button-container">
            <button type="submit" value="submit" name="btn-save"><span>Login</span></button>
          </div>
          <div class="footer"><a href="#">Forgot your password?</a></div>
        </form>
      </div>
      
      <div class="card alt">
        <div class="toggle"></div>
      
   
  </body>
</html>
