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
      <a class="navbar-item">
        Home
      </a>

      <a class="navbar-item" href="./login.php">
        Logout
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
      <!-- <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" placeholder="Search" />
          <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div> -->
      <p class="panel-tabs ">
        <a href="./main.php" class="is-active"><strong>All</strong></a>
        <a href="./projects.php"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
        <a ><strong>Others</strong></a>
      </p>

      </nav>
            <div class = "columns">
               <div class = "column">
               <div class="card">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Webinars
    </p>
    </header>
                    <div class="card-content">
                    <label class="label">Name</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input">
                         </div>
                    </div>

                    <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>
<label class="label">Upload File</label>
  
<div id="file-js-example" class="file is-info is-boxed has-name is-centered">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
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
  <button class="button is-link">Upload</button>
</div>


                    </div>
                  </div>
                  </div>
               
               <div class = "column">
               <div class="card">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Workshop
    </p>
    </header>

                    <div class="card-content">
                    <label class="label">Name</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input">
                         </div>
                    </div>

                    <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>
<label class="label">Upload File</label>
  
<div id="file-js-example" class="file is-info is-boxed has-name is-centered">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
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
  <button class="button is-link">Upload</button>
</div>


                    </div>
                  </div>
                  </div>
               
               <div class = "column">
               <div class="card">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Projects
    </p>
    </header>
                    <div class="card-content">
                    <label class="label">Name</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input">
                         </div>
                    </div>

                    <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>
<label class="label">Upload File</label>
  
<div id="file-js-example" class="file is-info is-boxed has-name is-centered">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
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
  <button class="button is-link">Upload</button>
</div>


                    </div>
                  </div></div>
               
               <div class = "column">
               <div class="card">
               <header class="card-header ">
    <p class="card-header-title is-centered">
      Research Paper
    </p>
    </header>
                    <div class="card-content">
                    <label class="label">Name</label>
                    <div class="field">
                        <div class="control">
                             <input class="input is-info" type="text" placeholder="Info input">
                         </div>
                    </div>

                    <div class="field">
  <label class="label">Message</label>
  <div class="control">
    <textarea class="textarea" placeholder="Textarea"></textarea>
  </div>
</div>
<label class="label">Upload File</label>
  
<div id="file-js-example" class="file is-info is-boxed has-name is-centered">
  <label class="file-label">
    <input class="file-input" type="file" name="resume">
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
  <button class="button is-link">Upload</button>
</div>


                    </div>
                  </div> </div>
               
            </div>
            </div>
      </section>
    
    <footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>© Copyright 2020. All Rights Reserved.</strong> 
    </p>
  </div>
</footer>
   </body>
</html>