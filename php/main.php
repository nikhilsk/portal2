<?php 
session_start();
  include 'download.php';
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  $limit=100;
  $workshopquery=mysqli_query($conn,"Select * from resources where category='workshops' LIMIT $limit");
  $webinarquery=mysqli_query($conn,"Select * from resources where category='webinars'");
  $projectsquery=mysqli_query($conn,"Select * from resources where category='projects'");
  $researchquery=mysqli_query($conn,"Select * from resources where category='research'");
  $sqlq=mysqli_query($conn, "Select * from resources where id=1");
  $r=mysqli_fetch_assoc($sqlq);
  $_SESSION["marq1"]=$r['filename'];
  $_SESSION["marq2"]=$r['category'];
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
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
  </head>
  <body>

  <marquee behavior="scroll" direction="left">Here is some scrolling text... right to left!</marquee>

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
      <?php
   if(!isset($_SESSION['loginid']))
   {
      echo "<a class='navbar-item' href='./login.php'>
        Login
      </a>";
   }
   else{
               
      echo "<a class='navbar-item' href='./destroy.php'>";
      echo "Logout";
      echo "</a>";
    
    echo "<a class='navbar-item' href=''>Hello , ";
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
               echo "<a class='button is-danger is-outlined' href='./workshopupload.php'>
               <strong>Upload</strong>
             </a>";
            }
        ?>
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
      <p>
      <marquee>
      <span style="color:red"  style="font-weight:bold">NEW- </span><?php 
         echo $_SESSION["marq1"]." (". ucfirst($_SESSION["marq2"]).")"; 
       ?></marquee>
      </p>
      <p class="panel-tabs ">
        <a href="./main.php" class="is-active"><strong>All</strong></a>
        <a href="./projects.php"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
        
      </p>

      <?php
        while($row = $workshopquery->fetch_assoc()): ?>
      <a class="panel-block is-active navbar-end ">
        <span class="panel-icon">
          <i class="fas fa-book" aria-hidden="true"></i>
        </span>
        <div style="overflow:hidden">
        <?php echo $row['filename']; ?>
        <button class = "button is-primary modal-button" data-target = "#modal" style="margin-left:70vw;position:absolute;" >Description</button>
        <button class="button is-info ml-2" type="submit" name="down" style="margin-left:7vw;position:absolute;" onclick="window.location.href='main.php?file_id=<?php echo $row['id'] ?>';">Download</button>

        </div>
        <div id = "modal" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        
                        <div class = "media-content">
                           <div class = "content">
                              <p>
                                 <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo $row['category'];?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['drivelink']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
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


      <?php
        while($row = $projectsquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fab fa-github" aria-hidden="true" style="color:black;"></i>
        </span>
        <?php echo $row['filename']; ?>
        <button class = "button is-primary modal-button" data-target = "#modal2" style="margin-left:1170px;">Description</button>
        <button class="button is-info ml-2" type="submit" name="down" onclick="window.location.href='main.php?file_id=<?php echo $row['id'] ?>';">Download</button>

        <!--MODAL-->
        <div id = "modal2" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        
                        <div class = "media-content">
                           <div class = "content">
                              <p>
                              <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo $row['category'];?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['link']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
                                 <p>Project Link:
                                 <?php echo $row['link'];?>
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


      <?php
        while($row = $webinarquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fas fa-file-video" aria-hidden="true" style="color:red;"></i>
        </span>
        <?php echo $row['filename']; ?>
        <button class = "button is-primary modal-button" data-target = "#modal3" style="margin-left:1150px;">Description</button>
        <button class="button is-info ml-2" type="submit" name="down" onclick="window.location.href='main.php?file_id=<?php echo $row['id'] ?>';">Download</button>

        <div id = "modal3" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        
                        <div class = "media-content">
                           <div class = "content">
                              <p>
                              <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo $row['category'];?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['link']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
                                 <p>Web Link:
                                 <?php echo $row['link'];?>
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

      
      <?php
        while($row = $researchquery->fetch_assoc()): ?>
      <a class="panel-block is-active">
        <span class="panel-icon">
          <i class="fas fa-scroll" aria-hidden="true" style="color:black;"></i>
        </span>
        <?php echo $row['filename']; ?>
        <button class = "button is-primary modal-button" data-target = "#modal4" style="margin-left:1170px;">Description</button>
        <button class="button is-info ml-2" type="submit" name="down" onclick="window.location.href='main.php?file_id=<?php echo $row['id'] ?>';">Download</button>

        <div id = "modal4" class = "modal">
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
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
  <a class="pagination-previous">Previous</a>
  <a class="pagination-next">Next page</a>
  <ul class="pagination-list">
    <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
    <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
    <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
  </ul>
</nav>

    <footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>© Copyright 2020. All Rights Reserved.</strong> 
    </p>
  </div>
</footer>
  </body>
</html>
