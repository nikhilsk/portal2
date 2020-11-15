<?php 
  include 'database.php';
  if(!isset($_SESSION['name']))
{
  $name=$_SESSION['current_file_name'];
  header("location:$name");
}
  $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);

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
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"
    ></script>
    <title>Document</title>
  </head>

  <body>
 
 
  <?php include 'navbarup.php' ; ?>   <nav class="panel is-link">
      
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

<script>
  const fileInput = document.querySelector("#file-js-example input[type=file]");
fileInput.onchange = () => {
  if (fileInput.files.length > 0) {
    const fileName = document.querySelector("#file-js-example .file-name");
    fileName.textContent = fileInput.files[0].name;
  }
};

</script>
  </body><?php include 'footer.php'; ?></html>
