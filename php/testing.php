<?php 
session_start();
  include 'download.php';
//   include 'abcd.php';
  $host='localhost';
  $user='root';
  $password='';
  $db='portal';
  
  $conn = new mysqli($host, $user, $password,$db);
  
  $conn ->select_db($db) or die( "Unable to select database");


  if(isset($_POST['filter']))
  {
      $_SESSION['norecords']=$_POST['filter'];
      $limit=$_SESSION['norecords'];
    //   header("location:testing.php");
  }
  else
  {
      $limit=10;
  }
  
  if(isset($_POST['search']))
  {
    //   echo $_POST['search'];
      $string=mysqli_real_escape_string($conn,$_POST['search']);
      $result=$conn->query("Select * from resources where filename LIKE '%$string%'");
      $records=$result->fetch_all(MYSQLI_ASSOC);
  }
  else
  {
  $result1 = $conn->query("SELECT count(id) AS id FROM resources");
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM resources LIMIT $start, $limit");
	$records = $result->fetch_all(MYSQLI_ASSOC);
// echo $start;
// echo $limit;
	$recCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $recCount[0]['id'];
    $pages = ceil( $total / $limit );
    
	$Previous = $page - 1;
    $Next = $page + 1;
  }

  $sqlq=mysqli_query($conn, "Select max(id) as id from resources");
 $r=mysqli_fetch_assoc($sqlq);
 $rid=$r['id'];
 $new=mysqli_query($conn, "select * from resources where id=$rid");
 if (mysqli_num_rows($new)>0)
 {
 $r1=mysqli_fetch_assoc($new);
 $_SESSION["marq1"]=$r1['filename'];
  $_SESSION["marq2"]=$r1['category'];
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
               echo "<a class='button is-danger is-outlined' href='./workshopupload.php'>
               <strong>Upload</strong>
             </a>";
            }
        ?>
          <a href="https://bmsce.ac.in/home/Information-Science-and-Engineering-About" target="_blank" class="button is-link is-outlined">
            <strong>Department of ISE</strong>
          </a>
          
        </div>
      </div>
    </div>
  </div>
</nav>

    <nav class="panel is-link">
      <p class="panel-heading">Resources</p>
      <marquee>
      <span style="color:red"  style="font-weight:bold">NEW- </span><?php 
         echo ucfirst($_SESSION["marq1"])." (". ucfirst($_SESSION["marq2"]).")"; 
       ?></marquee>
      
      <form action="" method="post">
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" name="search" id="search" placeholder="Search" />
          
          <span class="icon is-left">
            <i class="fas fa-search" aria-hidden="true"></i>
          </span>
        </p>
      </div>
      </form>
      <p class="panel-tabs ">
        <a href="./testing.php.php" class="is-active"><strong>All</strong></a>
        <a href="./projects.php"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
        
      </p>



    </nav>
    <br>
    
  <form action="" method="post">
  <div class="select is-right">
  
    <select name="filter" id="filter">
      <option disabled="disabled" selected="selected">--No of records--</option>
      <?php foreach([10,25,50,100] as $limit): ?>
			<option <?php if( isset($_POST["filter"]) && $_POST["filter"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
		<?php endforeach; ?>
      
    </select>
    </form>
  </div>

<br>
<br>


    <table class="table is-fullwidth is-striped">
  <thead>
  <tr>
        <th>Sl No</th>
      <th>FileName</th>
      <th>Uploaded By</th>
      <th>Download Count</th>
      <th>Download</th>
      <th>Description</th>
      <?php 
      if(isset($_SESSION['loginid']))
{
      echo "<th>Delete</th>";
}
?>
    </tr>
  </thead>
  
  <tbody>
  <?php foreach($records as $row) :  ?>    
    <tr>
    <th><?php 
        // $_SESSION['num']=$_SESSION['num']+1;
        echo $row['id'];
    ?></th>
      <th>
            <?php if ($row['category']=='projects'):?>
          <i class="fab fa-github" aria-hidden="true" style="color:black;"></i>
        <?php endif; ?>
        <?php if ($row['category']=='workshops'):?>
          <i class="fas fa-book" aria-hidden="true" style="color:blue;"></i>
        <?php endif; ?>
        <?php if ($row['category']=='research'):?>
          <i class="fas fa-scroll" aria-hidden="true" style="color:black;"></i>
        <?php endif; ?>
        <?php if ($row['category']=='webinars'):?>
          <i class="fas fa-file-video" aria-hidden="true" style="color:red;"></i>
        <?php endif; ?>
        <?php echo $row['filename'] ?></th>
      <th><?php echo $row['uploader'] ?></th>
        <th><?php echo $row['dcount'] ?></th>

        <th><button class="button is-success is-outlined" type="submit" name="down" onclick="window.location.href='testing.php?file_id=<?php echo $row['id'] ?>';">Download</button></th>
        <th><button class="button is-link is-outlined button is-primary modal-button" data-target = "#modal">View Details</button></th>
              
        <div id = "modal" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        <div class = "media-content">
                           <div class = "content">
                           <?php if($row['category']=='workshops'):?>
                              <p>
                                   <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo ucfirst($row['category']);?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['drivelink']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
                              </p>
                              <?php endif; ?>

                              <?php if($row['category']=='projects'):?>
                                <p>
                              <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo ucfirst($row['category']);?> </small> 
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
                              <?php endif; ?>

                              <?php if($row['category']=='webinars'):?>
                                <p>
                              <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo ucfirst($row['category']);?> </small> 
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
                              <?php endif;?>

                              <?php if($row['category']=='research'):?>
                                <p>
                              <strong> <?php echo $row['filename'];?> -</strong> 
                                 <small><?php echo ucfirst($row['category']);?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['link']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
                                 <p>Name of conference/journal:
                                 <?php echo $row['confer'];?>
                              </p>
                              <?php endif; ?>
                           </div>  
                        </div>
                     </article>
                  </div>
               </div>
               <button class = "modal-close is-large" aria-label = "close"></button>
            </div>
         </div>
      
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

<?php 
if(isset($_SESSION['loginid'])):?>

    <th><button class="button is-danger is-outlined" type="submit" onclick="window.location.href='remove.php?file_id=<?php echo $row['id']?>';">Remove</button></th>
<?php endif; ?>
    </tr>   
        <?php endforeach; ?>
    
  </tbody>
</table>

    <nav class="pagination is-left" role="navigation" aria-label="pagination">
    <a href="testing.php?page=<?= $Previous; ?>" class="pagination-previous">Previous</a>

  <a href="testing.php?page=<?= $Next; ?>" class="pagination-next">Next page</a>
  <ul class="pagination-list">
  <?php for($i = 1; $i<= $pages; $i++) : ?>
    <li><a href="testing.php?page=<?= $i; ?>" class="pagination-link" aria-label="Goto page 1"><?= $i; ?></a></li>
    <?php endfor; ?>
    </ul>
</nav>

    <footer class="footer">
  <div class="content has-text-centered">
    <p>
      <strong>© Copyright 2020. All Rights Reserved.</strong> 
    </p>
  </div>
</footer>
<script type="text/javascript">
	$(document).ready(function(){
		$("#filter").change(function(){
			$('form').submit();
		})
	})
    $(document).ready(function(){
		$("#search").change(function(){
			$('form').submit();
		})
	})
</script>
  </body>
</html>
