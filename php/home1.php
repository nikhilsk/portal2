<?php
include 'database.php';
  $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);

        $que= mysqli_query($conn,"select count(id) as id from resources");
        $q=mysqli_fetch_assoc($que);
        
        $que2= mysqli_query($conn,"select count(DISTINCT uploader) as id from resources");
        $q2=mysqli_fetch_assoc($que2);
        $que3= mysqli_query($conn,"select count(category) as id from resources where category='workshops'");
        $q3=mysqli_fetch_assoc($que3);
        $que4= mysqli_query($conn,"select count(category) as id from resources where category='research'");
        $q4=mysqli_fetch_assoc($que4);
        $que5= mysqli_query($conn,"select count(category) as id from resources where category='projects'");
        $q5=mysqli_fetch_assoc($que5);
        $que6= mysqli_query($conn,"select count(category) as id from resources where category='webinars'");
        $q6=mysqli_fetch_assoc($que6);

        $que= mysqli_query($conn,"select count(id) as id from resources");
        $q=mysqli_fetch_assoc($que);
        $qued=mysqli_query($conn,"select sum(dcount) as down from resources");
        $qd=mysqli_fetch_assoc($qued);
      
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources");
        $z=mysqli_fetch_assoc($sqlq);

          if ($z['id']>0)
          {
            $rid=$z['id'];
            $new=mysqli_query($conn, "select * from resources where id=$rid");
            if(mysqli_num_rows($new)>0)
              {
              $r1=mysqli_fetch_assoc($new);
              $_SESSION["marq1"]=$r1['filename'];
              $_SESSION["marq2"]=$r1['category'];
              $_SESSION["marq3"]=$r1['uploader'];
              }
            else
              {
              $_SESSION["marq1"]='null';
              $_SESSION["marq2"]='null';
              $_SESSION["marq3"]='null';
              }
          }
          else
              {
              $_SESSION["marq1"]='null';
              $_SESSION["marq2"]='null';
              $_SESSION["marq3"]='null';
              }
          
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    ></script>
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<style>
    body
    {
      /* background:#cccbcc; */
      /* font-size:0.5vw; */
    }
    .txt
    {
      color:black;
    }
    .progress::-webkit-progress-value {
  transition: width 0.1s ease;
    }

    .circle-wrap {  
      position: relative;
      left:10px;
  width: 150px;
  height: 150px;
  background: #e6e2e7;
  border-radius: 50%;
}
.circle-wrap2 {
  position: relative;
 left: 155%;
 width: 150px;
 height: 150px;
 background: #e6e2e7;
 border-radius: 50%;
}
.circle-wrap .circle .mask,
.circle-wrap .circle .fill {
  width: 150px;
  height: 150px;
  position: absolute;
  border-radius: 50%;
}
.circle-wrap .circle .mask {
  clip: rect(0px, 150px, 150px, 75px);
}
.circle-wrap .circle .mask .fill {
  clip: rect(0px, 75px, 150px, 0px);
  background-color: #00d1b2;
}
.circle-wrap .circle .mask.full,
.circle-wrap .circle .fill {
  animation: fill ease-in-out 3s;
  transform: rotate(180deg);
}
@keyframes fill {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(180deg);
  }
}
.circle-wrap .inside-circle {
  width: 130px;
  height: 130px;
  border-radius: 50%;
  background: #fff;
  line-height: 130px;
  text-align: center;
  margin-top: 10px;
  margin-left: 10px;
  position: absolute;
  z-index: 100;
  font-weight: 700;
  font-size: 2em;
  color: black;
}
  </style>
<body>


<nav class="navbar" role="navigation" aria-label="main navigation" style="background:hsl(217, 71%, 53%);">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
        <div class="logo ml-4" style="color: black;font-size:1.5vw 1.5vh;">
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


<div class="tile is-ancestor m-4 p-4">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary animate__animated animate__fadeInRight" sty >
          <p class="title" style="color:#05386B">Why??
        
        </p>
          <p class="subtitle"><strong style="color: black;">BMSCE</strong><span style="color: white;">RESOURCES</span></p>
          <p class="subtitle" style="color:#0d0043; font-weight:500">A one stop website where professors can upload any useful resource- be it projects and research papers or information about webinars and workshops. Also, a hassle free platform for students to find all useful resources & announcements in the department.</p>
        </article>
        <article class="tile is-child notification is-warning animate__animated animate__fadeInUp" style="background:#05386B">
          <p class="title" style="color:white;"><span class="animate__animated animate__flash animate__infinite	infinite">...What's new!!</span> <div class="subtitle" style="color:#00d1b2;"><br> <span ><strong style="color:#00d1b2;">New File:</strong> </span>
         <?php echo  ucfirst($_SESSION["marq1"])." (". ucfirst($_SESSION["marq2"]).")" . " has been uploaded by " .ucfirst($_SESSION["marq3"]); ?></div></p>
          <p class="subtitle"></p>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification animate__animated animate__fadeInDown" style="background:#05386B;">
          <p class="title" style="color: white;"> File Uploader</p>
          <p class="subtitle" style="color: #00d1b2;">What does the website do?</p>
          <!-- <div class="columns">
          <div class="column "> -->
          <!-- <figure class="is-4by3sdf"> -->
          
          <img style="width:105vw;height:30vh;" src="../img/fileupload.gif" alt="description of gif" />
          <!-- </figure> -->
         
          <!-- </div> -->
          <!-- <div class="column">
      
          <img style="width:55vw;height:25vh;" src="../img/filedownload.gif" alt="" srcset="">
          
        
          </div> -->
          <!-- </div> -->
          <p class="subtitle" style="margin-left:5vw;margin-top:-1vh;font-size:2vw bold; color: #00d1b2;">Upload and download files</p>
          <!-- <figure class="">
        
          </figure> -->
          <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
          <!-- &nbsp;&nbsp;&nbsp; -->
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?php if (isset($_SESSION['name'])):?>
          <button onclick="location.href='./testing.php';" class="button is-ghost"><span class="icon is-small">
      <i class="fas fa-upload"></i>
          </span>&nbsp;&nbsp;&nbsp;Click here to Upload</button> <?php endif;?>
          <?php if (!isset($_SESSION['name'])):?>
          <button onclick="location.href='./login.php';" class="button is-ghost"><span class="icon is-small">
      <i class="fas fa-upload"></i>
          </span>&nbsp;&nbsp;&nbsp;Click here to Upload</button> <?php endif;?>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification animate__animated animate__fadeInRight" style="background:#00d1b2; color:white;">
      
        <p class="title" style="color:#05386B"><span class="icon is-small" >
      <i class="fas fa-key"></i>
    </span>&nbsp;Authentication</p>
        <p class="subtitle" style="color:#0d0043; font-weight:500">Who can download resources?<br><span class="icon is-small">
      <i class="fas fa-id-card"></i>
    </span>&nbsp;All students of BMSCE have access to all the resources.</p>
        <!-- <progress class="progress" value="15" max="100">15%</progress> -->
        
        <p class="subtitle" style="color:#0d0043; font-weight:500">Who can upload resources?<br><span class="icon is-small">
      <i class="fas fa-chalkboard-teacher"></i>
    </span>&nbsp;All teachers of BMSCE ISE Department have access to upload the resources.</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-black animate__animated animate__fadeInLeft" style="background:#05386B">
      <div class="content">
      <!-- <br><br> -->
        <p class="title m-2 ">Statistics</p>
        <p class="subtitle m-2 p-2"></p>
        <div class="content">
          <!-- Content -->
          <p style="font-size:20px"><strong>Total number of files- <span id="value"> <?php echo $q['id']; ?></span></strong></p>
          <progress class="progress is-primary" id="pb1" value="100" max="100">15%</progress> 
          
          <p>Number of workshops- <span id="val4"><?php echo $q3['id']; ?></span></p>
          <progress class="progress is-primary" id="pb2" value=<?php echo $q3['id']; ?> max=<?php echo $q['id']; ?>>15%</progress>

          <p>Number of research papers- <span id="val5"><?php echo $q4['id']; ?></span></p>
          <progress class="progress is-primary" id="pb3" value=<?php echo $q4['id']; ?> max=<?php echo $q['id']; ?>>15%</progress>

          <p>Number of projects- <span id="val6"><?php echo $q5['id']; ?></span></p>
          <progress class="progress is-primary" id="pb4" value=<?php echo $q5['id']; ?> max=<?php echo $q['id']; ?>>15%</progress>

          <p>Number of webinars- <span id="val7"><?php echo $q6['id']; ?></span></p>
          <progress class="progress is-primary" id="pb5" value=<?php echo $q6['id']; ?> max=<?php echo $q['id']; ?>>15%</progress>

          <br>
         <p style="font-size:20px"><strong>Total downloads- <span id="val2"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Uploaders- <span id="val3"><</strong></p>
         <!--  <progress class="progress is-primary" id="pb6" value="100" max="100">15%</progress> 

          <p style="font-size:20px"><strong>Number of teachers using this website- <span id="val3"><?php //echo $q2['id'];?></span></strong></p>
          <progress class="progress is-primary" id="p7" value="15" max="15">15%</progress>-->
        </div>

        <div class="circle-wrap">
  <div class="circle">
    
    <div class="mask full">
      <div class="fill"></div>
    </div>
   
    <div class="mask half">
      <div class="fill"></div>
    </div>
    
    <div class="inside-circle">
    <?php echo $qd['down'];?>
    </div>
  </div>

  <div class="circle-wrap2">
  <div class="circle">
    
    <div class="mask full">
      <div class="fill"></div>
    </div>
   
    <div class="mask half">
      <div class="fill"></div>
    </div>
    
    <div class="inside-circle">
    <?php echo $q2['id'];?>
    </div>
  </div>


  
        <script>
        function animateValue(obj, start, end, duration) 
          {
            let startTimestamp = null;
            const step = (timestamp) => {
              if (!startTimestamp) startTimestamp = timestamp;
              const progress = Math.min((timestamp - startTimestamp) / duration, 1);
              obj.innerHTML = Math.floor(progress * (end - start) + start);
              if (progress < 1) {
                window.requestAnimationFrame(step);
              }
            };
            window.requestAnimationFrame(step);
          }
          const obj = document.getElementById("value");
          const obj2= document.getElementById("val2");
          const obj3= document.getElementById("val3");
          const obj4= document.getElementById("val4");
          const obj5= document.getElementById("val5");
          const obj6= document.getElementById("val6");
          const obj7= document.getElementById("val7");
          animateValue(obj, 0, <?php echo $q['id'];?> , 2000); 
          animateValue(obj2, 0, <?php echo $qd['down'];?>, 2000);
          animateValue(obj3, 0, <?php echo $q2['id'];?> , 2000); 
          animateValue(obj4, 0, <?php echo $q3['id'];?> , 2000); 
          animateValue(obj5, 0, <?php echo $q4['id'];?> , 2000); 
          animateValue(obj6, 0, <?php echo $q5['id'];?> , 2000); 
          animateValue(obj7, 0, <?php echo $q6['id'];?> , 2000); 
        </script>

      </div>
    </article>
  </div>
</div>
<?php include 'footer.php'; ?>
<script>
var progressArr = [5, 15, 30, 40, 60, 65, 80, 90, 95, 100];
function fillProgress() {
  progressArr.forEach(function(num, index) {
    setTimeout(function() {
      $('#pb1').val(num);
    }, 300 * index);
  });
}

fillProgress();
</script>
</html>
