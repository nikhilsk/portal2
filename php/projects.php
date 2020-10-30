<?php 
  
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  
  $workshopquery=mysqli_query($conn,"Select * from resources where category='workshops'");
  $webinarquery=mysqli_query($conn,"Select * from resources where category='webinars'");
  $projectsquery=mysqli_query($conn,"Select * from resources where category='projects'");
  
  if (isset($_GET['file_id'])) 
{
    $id = $_GET['file_id'];


    // fetch file to download from database
    $sql = "SELECT * FROM resources WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = '../uploads/'.$file['file'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('../uploads/'.$file['file']));
        readfile('../uploads/'.$file['file']);

        // Now update downloads count
        $newCount = $file['dcount'] + 1;
        $updateQuery = "UPDATE resourses SET dcount=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
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
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
      <script src = "https://use.fontawesome.com/releases/v5.1.0/js/all.js"></script>
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
      <a href="main.php" class="navbar-item">
        Home
      </a>

      <a class="navbar-item" href="./login.php">
        Login
      </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-link is-outlined">
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
        <a href="./main.php" ><strong>All</strong></a>
        <a href="./projects.php" class="is-active"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
      </p>

      <?php
        while($row = $projectsquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fab fa-github" aria-hidden="true" style="color:black;"></i>
        </span>
        <?php echo $row['filename']; ?>
        <button class = "button is-primary modal-button" data-target = "#modal" style="margin-left:1150px;">Description</button>
        <!--<button class="button is-info ml-2" type="submit" name="down">Download</button>-->
        <a href="projects.php?file_id=<?php echo $row['id'] ?>"class = "button is-primary modal-button">Download</a>
        <div id = "modal" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        
                        <div class = "media-content">
                           <div class = "content">
                              <p>
                                 <strong>Will Smith</strong> 
                                 <small>@wsmith</small> 
                                 <br>
                                 This is simple text. This is simple text. 
                                 This is simple text. This is simple text.
                              </p>
                           </div>  
                        </div>
                     </article>
                  </div>
               </div>
               <button class = "modal-close is-large" aria-label = "close"></button>
            </div>
         </div>
      </section>
      
      <script>
         $(".modal-button").click(function() {
            var target = $(this).data("target");
            $("html").addClass("is-clipped");
            $(target).addClass("is-active");
         });
         
         $(".modal-close").click(function() {
            $("html").removeClass("is-clipped");
            $(this).parent().removeClass("is-active");
         });
      </script>
      </a>

      <?php endwhile; ?>
     
      

    </nav>
  </body>
</html>
