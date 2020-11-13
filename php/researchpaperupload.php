<?php 
  session_start();
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");
  $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);

  if (isset($_POST['save']))
 { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    $driv= mysqli_real_escape_string($conn, $_REQUEST['drive']);// functon used to remove special characters
    $topic= mysqli_real_escape_string($conn, $_REQUEST['fname']);
    $mess= mysqli_real_escape_string($conn, $_REQUEST['msg']);
    $corj= mysqli_real_escape_string($conn, $_REQUEST['cj']);
    $resname= mysqli_real_escape_string($conn, $_REQUEST['conname']);

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
            $sql = "insert into resources (id,category, filename, file, filesize, descrip, drivelink, publish, confer, uploader) values ('$newid','research', '$topic', '$filename', '$size', '$mess' , '$driv', '$corj', '$resname','$nameofteacher')";
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
              <strong>Go Back</strong>
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

    

    <div class="columns">
  <div class="column is-two-fifths">
    <br><br><br>
    <div class="m-6 ">
    <a href="./workshopupload.php" class="button is-fullwidth is-outlined is-link">Workshops</a>
    </div>
    <div class="m-6">
    <a href="./researchpaperupload.php" class="button is-fullwidth is-danger is-outlineda">Research Papers</a>
    </div>
    <div class="m-6">
    <a href="./projectsupload.php" class="button is-fullwidth is-success is-outlined">Projects</a>
    </div>
    <div class="m-6">
    <a href="./webinarupload.php" class="button is-fullwidth is-outlined is-info">Webinars</a>
    </div>
    
  </div>
  <div class="column">
  <div class="card m-4">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Research Papers
    </p>
    </header>
    <form action="researchpaperupload.php" method="post" enctype="multipart/form-data">
                    <div class="card-content">
                    <label class="label">Title*</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input" name="fname">
                         </div>
                    </div>

                    <label class="label">Published at : </label>
                   
                    <div class="select is-rounded">
  <select name="cj">
    <option>Select</option>
    <option>Journal</option>
    <option>Conference</option>
  </select>
  
</div>

<br>
                    <label class="label">Name of conference/journal</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input" name="conname">
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
  <footer class="footer" style="background:hsl(217, 71%, 53%); color:white;">
  <div class="content has-text-centered" >
    <p> 
      <a href="https://bmsce.ac.in/" target="_blank" style="color:hsl(217, 71%, 53%);" class="button is-rounded">BMSCE Home Page</a>
      <br>
      <br>
      <strong style="color:black">Contact us: </strong>
      <br>Email: info@bmsce.ac.in 
      <br>Fax: +91-80-26614357
      <br>
      <br><span style="color:#dbdcdc">Website designed by Nikhil S.K & Gowrishankar G- 3rd Year ISE Department, BMSCE</span>
      
    </p>
  </div>
  
  <button class="button" style="margin-left:90%;" onclick="topFunction()" id="myBtn" title="Go to top"><span class="icon is-small">
      <i class="fas fa-arrow-up"></i>
    </span></button>
</footer>
</html>
