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
<nav class="panel is-link">
      
      <marquee>
      <span style="color:red"  style="font-weight:bold">NEW FILE- </span><?php 
         echo  ucfirst($_SESSION["marq1"])." (". ucfirst($_SESSION["marq2"]).")" . " has been uploaded by " .ucfirst($_SESSION["marq3"]) ; 
       ?></marquee>
      
      <form action="" method="post">
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" name="search" id="search" placeholder="Search" value="<?php 
          if (isset($_POST['search']))
          {
            echo $_POST['search'];
          }
          elseif(isset($_SESSION['search']))
          {
            echo $_SESSION['search'];
          }  ?>" />
          
          <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>
      </form>
      <p class="panel-tabs ">
          <?php if($_SESSION['current_file_name']=='testing.php' or $_SESSION['current_file_name']=='up.php')
          {
            echo "<a href='./testing.php' class='is-active'><strong>All</strong></a>";
        
          }
          else
          {
            echo "<a href='./testing.php' ><strong>All</strong></a>";
        
          }
          if($_SESSION['current_file_name']=='projects.php' or $_SESSION['current_file_name']=='uppro.php')
          {
            echo "<a href='./projects.php' class='is-active'><strong>Projects</strong></a>";
        
          }
          else
          {
            echo "<a href='./projects.php' ><strong>Projects</strong></a>";
        
          }

          if($_SESSION['current_file_name']=='research.php' or $_SESSION['current_file_name']=='upres.php')
          {
            echo "<a href='./research.php' class='is-active'><strong>Research papers</strong></a>";
        
          }
          else
          {
            echo "<a href='./research.php' ><strong>Research papers</strong></a>";
        
          }

          if($_SESSION['current_file_name']=='webinar.php' or $_SESSION['current_file_name']=='upweb.php')
          {
            echo "<a href='./webinar.php' class='is-active'><strong>Webinars</strong></a>";
        
          }
          else
          {
            echo "<a href='./webinar.php' ><strong>Webinars</strong></a>";
        
          }

          if($_SESSION['current_file_name']=='workshop.php' or $_SESSION['current_file_name']=='upwork.php')
          {
            echo "<a href='./workshop.php' class='is-active'><strong>Workshops</strong></a>";
        
          }
          else
          {
            echo "<a href='./workshop.php' ><strong>Workshops</strong></a>";
        
          }
          ?>
        
      </p>



    </nav>
</body>
</html>