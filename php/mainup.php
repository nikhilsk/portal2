<?php 
  include 'download.php';
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  
  $workshopquery=mysqli_query($conn,"Select * from resources where category='workshops'");
  $webinarquery=mysqli_query($conn,"Select * from resources where category='webinars'");
  $projectsquery=mysqli_query($conn,"Select * from resources where category='projects'");
  $researchquery=mysqli_query($conn,"Select * from resources where category='research'");
  
 

  if(isset($_POST['btn-save'])) 
   {
    $myusername = mysqli_real_escape_string($conn, $_POST['emailid']);
    //session_start();
    //$_SESSION['us']=$myusername;
    //session_abort();
    $mypassword = mysqli_real_escape_string($conn, $_POST['psw']);

    $query= "SELECT * from login WHERE email= '$myusername' and passwords='$mypassword'";
    $result= mysqli_query($conn, $query);
   
    
     if($result)
     {
        //  echo $username;
             if(mysqli_num_rows($result)>0)
             {
                $helloname= mysqli_query($conn, "SELECT username from login WHERE email= '$myusername' and passwords='$mypassword'");
                //header("Location: ./mainup.php");

             }
             else
            { 
                echo '<script>alert("NOT FOUND")</script>';  
                header("Location: ./login.php");
            
            }
        
     }
     else
     {
        echo '<script>alert("ERROR")</script>';  
        header("Location: ./login.php");
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
    <link rel="stylesheet" href="../css/layout.css" />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    ></script>
    <title>Document</title>
  </head>
  <body>
      
    <nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
        <div class="logo" style="color: #0168fa;font-size:1vw 1vh;">
            <strong>BMSCE</strong>
        </div>
        
        <span style="color: #0168fa;">CAMPUS</span>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
    
      <a href="mainup.php" class="navbar-item">
        Home
      </a>

      <a class="navbar-item" href="./main.php">
        Logout
      </a>

      <a class="navbar-item">

        <?php
         session_start();
         echo $_SESSION['us']; 
         session_abort();
         ?>
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-danger is-outlined" href="./workshopupload.php">
            <strong>Upload</strong>
          </a>
          <a class="button is-link is-outlined" >
            <strong>Department of ISE</strong>
          </a>
          
        </div>
      </div>
    </div>
  </div>
</nav>

    <nav class="panel is-link">
      <p class="panel-heading">Resources</p>
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" placeholder="Search" />
          <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>
      <p class="panel-tabs">
        <a href="./main.php" class="is-active"><strong>All</strong></a>
        <a href="./projects.php"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
      
      </p>
  <?php
        while($row = $workshopquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fas fa-book" aria-hidden="true"></i>
        </span>
        <?php echo $row['filename']; ?>
      </a>

      <?php endwhile; ?>
      <?php
        while($row = $projectsquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fab fa-github" aria-hidden="true" style="color:black;"></i>
        </span>
        <?php echo $row['filename']; ?>
      </a>

      <?php endwhile; ?>
      <?php
        while($row = $webinarquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fas fa-file-video" aria-hidden="true" style="color:red;"></i>
        </span>
        <?php echo $row['filename']; ?>
      </a>

      <?php endwhile; ?>

      
      <?php
        while($row = $researchquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fas fa-scroll" aria-hidden="true" style="color:black;"></i>
        </span>
        <?php echo $row['filename']; ?>
      </a>

      <?php endwhile; 
       ?>

      <footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>© Copyright 2020. All Rights Reserved.</strong> 
      <br>
      <strong>BMS College of Engineering.</strong> 
    </p>
  </div>
</footer>
      

    </nav>
  </body>
</html>
