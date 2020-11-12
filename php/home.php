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
    <!-- <link rel="stylesheet" href="../css/layout.css" /> -->
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
    }
    .txt
    {
      color:black;
    }
  </style>
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


<div class="tile is-ancestor m-4 p-4">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">
          <p class="title">Why??
        
        </p>
          <p class="subtitle"><strong style="color: black	;">BMSCE</strong><span style="color: white;">RESOURCES</span></p>
          <p class="subtitle">A one stop website where professors can upload any useful resource- be it projects and research papers or information about webinars and workshops. Also, a hassle free platform for students to find all useful resources & announcements in the department.</p>
        </article>
        <article class="tile is-child notification is-warning">
          <p class="title">...tiles</p>
          <p class="subtitle">Bottom tile</p>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title"> File Uploader</p>
          <p class="subtitle">What does the app do?</p>
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
          <p class="subtitle" style="margin-left:5vw;margin-top:-1vh;font-size:2vw bold;">Upload and download files</p>
          <!-- <figure class="">
        
          </figure> -->
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button class="button is-ghost">Click here to Upload</button>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification is-danger">
        <p class="title">Authentication</p>
        <p class="subtitle">Who can download resources?</p>
        <p class="subtitle">All students of BMSCE have access to all the resources</p>
        <!-- <progress class="progress" value="15" max="100">15%</progress> -->
        
        <p class="subtitle">Who can upload resources?</p>
        <p>All teachers of BMSCE have access to upload the resources</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-black" style="background:#00416A">
      <div class="content">
      <!-- <br><br> -->
        <p class="title m-4 ">Statistics</p>
        <p class="subtitle m-4 p-4"></p>
        <div class="content">
          <!-- Content -->
        </div>
      </div>
    </article>
  </div>
</div>

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
