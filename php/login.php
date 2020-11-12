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
    // echo $mypassword;
    // echo $myusername;
    $helloname= mysqli_query($conn, "SELECT * from login WHERE email= '$myusername' and passwords='$mypassword'");
    $name1=$helloname->fetch_assoc();
   $_SESSION['name']=$name1['username'];
  //  echo $_SESSION['name'];
   $_SESSION['pass']=$mypassword;
  //  echo $_SESSION['pass'];
  
if(mysqli_num_rows($helloname)>0)
{
    header("location:testing.php");
  }
  else{
    echo "<script>alert('Invalid credentials');</script>";
  }

  
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="../css/layout.css" /> -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    ></script>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
  <style>
    body
    {
      /* background:#cccbcc; */
    }
    .txt
    {
      color:black;
    }
  </style>
  </head>
  <body>


  <nav class="navbar" role="navigation" aria-label="main navigation" style="background:hsl(217, 71%, 53%);">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
        <div class="logo ml-4" style="color: black	;font-size:1.5vw 1.5vh;">
            <strong>BMSCE</strong>
        </div>
        
        <span style="color: white;">RESOURCES</span>
    </a>
    <!-- <a class="navbar-item" href="">
    <button class="button is-link" onclick="location.href='./testing.php';">
          <span class="icon is-small">
      <i class="fas fa-home"></i>
    </span>
            <span>View resources</span>
      </button>
      </a> -->

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      
   
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        
         
          <button class="button" onclick="location.href='./testing.php';">
          <span class="icon is-small">
      <i class="fas fa-home"></i>
         </span>
            <span><strong>View resources</strong></span>
      </button>
      <a href="https://bmsce.ac.in/home/Information-Science-and-Engineering-About" target="_blank" class="button  is-outlined">
            <strong>Department of ISE</strong>
          </a>
        </div>
      </div>
    
    </div>
  </div>

</nav>
  
    <div class="columns">
      
  <div class="column is-one-fifths m-6 p-6" >
  <br><br><br><br>
    <div class="card p-4" style="background:hsl(217, 71%, 53%);">
    <!-- <button class="button is-fullwidth is-outlined" style="color:blue;">Faculty Sign-In</button> -->
    <strong style="color:white;font-family: 'Roboto Condensed', sans-serif;">WELCOME TO BMSCE RESOURCES</strong>
    <br>
    <h3 style="color:white;font-family: 'Roboto Condensed', sans-serif;">To keep connected with us please login with your personal credentials</h3>
    <br>
    <form action="" method="post">    <div class="field">
    <label class="label" style="color:black;">Email</label>
  <div class="control has-icons-left">
    <input class="input is-info" type="text" name="emailid" placeholder="Enter your mail id" required>
    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
  </div>
</div>
<div class="field">
<label class="label" style="color:black;">Password</label>
  <div class="control has-icons-left">
    <input class="input is-info" name="psw" type="password" placeholder="Enter password" required>
    <span class="icon is-small is-left">
      <i class="fas fa-unlock"></i>
    </span>
  </div>
  <br>
  <button type="submit" class="button is-success is-rounded is-fullwidth p-3" style="background:white;color:black;">Login</button>
</div>

</form>

      </div>
</div>
      <div class="column m-4 p-4" style="margin-left:2vw;">
      <br><br><br>
      <img src="../img/login4.jpg" alt=""></div>
      </div>
   
  </body>
  <footer class="footer txt" style="background:hsl(217, 71%, 53%);">
  <div class="content has-text-centered">
    <p> 
      <br>
      <a href="https://bmsce.ac.in/" target="_blank" style="color:black">BMSCE Home Page</a>
      <br>
      <strong class="txt">Contact us: </strong>
      <br>Email: info@bmsce.ac.in 
      <br>Fax: +91-80-26614357
      <br><span style="color:black">Website designed by Nikhil S.K & Gowrishankar G- 3rd Year ISE Department, BMSCE</span>
    </p>
    </div>
    <button class="button" style="margin-left:90%;" onclick="topFunction()" id="myBtn" title="Go to top"><span class="icon is-small">
      <i class="fas fa-arrow-up"></i>
    </span></button>
  
</footer>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
</html>
