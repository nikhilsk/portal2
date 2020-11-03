<?php 
  session_start();
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");

  if (isset($_POST['save']))
 { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    $driv= mysqli_real_escape_string($conn, $_REQUEST['drive']);// functon used to remove special characters
    $topic= mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $mess= mysqli_real_escape_string($conn, $_REQUEST['msg']);
    $git= mysqli_real_escape_string($conn, $_REQUEST['glink']);

    // destination of the file on the server
    $destination = '../uploads/' . $filename;//need to have a folder named 'uploads'

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    
    {
        // move the uploaded (temporary) file to the specified destination

        if (move_uploaded_file($file, $destination)||$file==NULL)
         {
          $que= mysqli_query($conn,"select max(id) as id from resources");
          $q=mysqli_fetch_assoc($que);
          $newid= $q['id']+1;
           $nameofteacher=$_SESSION['name'];
            $sql = "insert into resources (id,category, filename, file, filesize, descrip, drivelink, link, uploader) values ('$newid','projects', '$topic', '$filename', '$size', '$mess' , '$driv', '$git','$nameofteacher')";
            if (mysqli_query($conn, $sql)) 
            {
                      echo '<script>alert("File uploaded successfully")</script>'; 
            }
          }
        else
        {
            echo '<script>alert("File upload FAILED")</script>';
        }
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
      <a href="testing.php" class="navbar-item">
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
               echo "<a class='button is-danger is-outlined' href='./testing.php'>
               <strong>Go Back</strong>
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
    </nav>

    <div class="columns">
  <div class="column is-two-fifths">
    <br><br><br>
    <div class="m-6 ">
    <a href="./workshopupload.php" class="button is-fullwidth is-outlined is-link">Workshops</a>
    </div>
    <div class="m-6">
    <a href="./researchpaperupload.php" class="button is-fullwidth is-danger is-outlined">Research Papers</a>
    </div>
    <div class="m-6">
    <a href="./projectsupload.php" class="button is-fullwidth is-success is-outlinedq">Projects</a>
    </div>
    <div class="m-6">
    <a href="./webinarupload.php" class="button is-fullwidth is-outlined is-info">Webinars</a>
    </div>
    
  </div>
  <div class="column">
  <div class="card m-4">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Projects
    </p>
    </header>
    <form action="projectsupload.php" method="post" enctype="multipart/form-data">
                    <div class="card-content">
                    <label class="label">Project title*</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input" name="fname">
                         </div>
                    </div>

                    <label class="label">GitHub Link</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input" name="glink">
                         </div>
                    </div>

                    <label class="label">Drive link(for multiple files)</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input" name="drive">
                         </div>
                    </div>

                    <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea" name="msg"></textarea>
  </div>
</div>
<label class="label">Upload File</label>
  
<div id="file-js-example" class="file is-info is-boxed has-name is-centered">
  <label class="file-label">
    <input class="file-input" type="file" name="myfile">
    <span class="file-cta">
      <span class="file-icon">
        <i class="fas fa-cloud-upload-alt"></i>
      </span>
      <span class="file-label">
        Choose a file…
      </span>
    </span>
    <span class="file-name">
      No file uploaded
    </span>
  </label>
</div>

<script>
  const fileInput = document.querySelector('#file-js-example input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-example .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
<br>
<div class="buttons is-centered">
  <button class="button is-link" type="submit" name="save">Upload</button>
</div>
</form>


                    </div>
                  </div>
                  </div>
               
              
  </div>
</div>
  </body>
  <footer class="footer">
  <div class="content has-text-centered">
    <p> 
      <br>
      <a href="https://bmsce.ac.in/" target="_blank">BMSCE Home Page</a>
      <br>
      <strong>Contact us: </strong>
      <br>Email: info@bmsce.ac.in 
      <br>Fax: +91-80-26614357
      <br><span style="color:grey">Website designed by Nikhil S.K & Gowrishankar G- 3rd Year ISE Department, BMSCE</span>
    </p>
  </div>
</footer>
</html>
