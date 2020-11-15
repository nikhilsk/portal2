<?php 

include 'database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
  <nav class="navbar" role="navigation" aria-label="main navigation" style="background:hsl(217, 71%, 53%);">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
        <div class="logo" style="color: #0d0043;font-size:1vw 1vh;">
            <strong>BMSCE</strong>
        </div>
        
        <span style="color:white;">RESOURCES</span>
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbarBasicExample" class="navbar-menu">
    <div class="navbar-start">
      <a href="home.php" class="navbar-item hov" style="color:white;"  onMouseOver="this.style.backgroundColor='hsl(217, 71%, 58%)'"
   onMouseOut="this.style.backgroundColor='hsl(217, 71%, 53%)'" >
        Home
      </a>
      <?php
   if(isset($_SESSION['loginid']))
   {
    echo "<a class='navbar-item' href='' style='color:white;' onMouseOver=\"this.style.backgroundColor='hsl(217, 71%, 58%)'\"
    onMouseOut=\"this.style.backgroundColor='hsl(217, 71%, 53%)'\">Hello, ";
    echo $_SESSION['name'];
      echo "</a>";
   }
   ?>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
        <?php 
            if(isset($_SESSION['loginid']))
            {
               echo "<a class='button is-primary' href='./destroy.php'>
               <strong>Logout</strong>
             </a>";
            }
            else{
              
              echo "<a class='button is-primary' href='./login.php'>
              <strong>Login</strong>
            </a>";
            }
        ?>
          <?php 
            if(isset($_SESSION['loginid']))
            {
               echo "<a class='button is-danger' href='./testing.php'>
               <strong>Go back</strong>
             </a>";
            }
        ?>
          <a class="button is-ghost" href="https://bmsce.ac.in/home/Information-Science-and-Engineering-About" target="_blank" >
            <strong>Department of ISE</strong>
          </a>
          
        </div>
      </div>   
    </div>
  </div>
</nav>
</body>
</html>