<?php 
include 'database.php';
  include 'download.php';
//   include 'abcd.php';
  $slno=0;
  // if(isset($_POST['filter']))
  // {
  //     $_SESSION['norecords']=$_POST['filter'];
  //     $limit=$_SESSION['norecords'];
  //   //   header("location:testing.php");
  // }
  // else
  // {
  //     $limit=10;
  // }
  if(!isset($_SESSION['name']))
  {
    $nam=$_SESSION['current_file_name'];
    header("location:$nam");
  }

  $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);
  

  if(isset($_POST['search']))
  {
    //   echo $_POST['search'];
    $_SESSION['search']=$_POST['search'];
    $limit = isset($_POST["filter"]) ? $_SESSION['filter']=$_POST["filter"] : 5;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
      $string=mysqli_real_escape_string($conn,$_POST['search']);
      
      $result=$conn->query("Select * from resources where filename LIKE '%$string%' LIMIT $start, $limit");
      $records=$result->fetch_all(MYSQLI_ASSOC);
      
      $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' LIMIT $start,$limit");
      $page = isset($_GET['page']) ? $_GET['page'] : 1;

      $recCount = $result1->fetch_all(MYSQLI_ASSOC);
      $total = $recCount[0]['id'];
        $pages = ceil( $total / $limit );
        
      $Previous = $page - 1;
        $Next = $page + 1;



        if(isset($_POST["filter"]) or isset($_SESSION['filter']) )
        {
          if(isset($_POST['filter']))
          {
          $_SESSION['filter']=$_POST["filter"];
          $limit=$_SESSION['filter'];
          $_GET['page']=1;
          
header("location:temp.php");
          // echo $_SESSION['filter'];
          }
          else{
            $limit=$_SESSION['filter'];
          //   echo $_SESSION['filter'];
          // echo $limit;
          }
        }
        else
        {
           $limit=5;
          //  echo "hello";
        }
        // echo $limit;
        // echo isset($_SESSION['filter'])?$_SESSION['filter']:$limit;
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $start = ($page - 1) * $limit;

      $string=mysqli_real_escape_string($conn,$_POST['search']);
      $result=$conn->query("Select * from resources where filename LIKE '%$string%' LIMIT $start, $limit");
      $records=$result->fetch_all(MYSQLI_ASSOC);
      $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' LIMIT $start, $limit ");

      $recCount = $result1->fetch_all(MYSQLI_ASSOC);
      $total = $recCount[0]['id'];
        $pages = ceil( $total / $limit );
        if($page>1)
      {
      $Previous = $page - 1;
      }
      if($page<$pages)
      {
        $Next = $page + 1;
      }
    
  }
  else
  {
    if(isset($_POST["filter"]) or isset($_SESSION['filter']) )
    {
      if(isset($_POST['filter']))
      {
      $_SESSION['filter']=$_POST["filter"];
      $limit=$_SESSION['filter'];
      $_GET['page']=1;
          
header("location:temp.php");
      // echo $_SESSION['filter'];
      }
      else{
        $limit=$_SESSION['filter'];
      //   echo $_SESSION['filter'];
      // echo $limit;
      }
    }
    else
    {
       $limit=5;
      //  echo "hello";
    }
    // echo $limit;
    // echo isset($_SESSION['filter'])?$_SESSION['filter']:$limit;
  $result1 = $conn->query("SELECT count(id) AS id FROM resources");
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM resources LIMIT $start, $limit");
	$records = $result->fetch_all(MYSQLI_ASSOC);
	$recCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $recCount[0]['id'];
    $pages = ceil( $total / $limit );
    if($page>1)
  {
  $Previous = $page - 1;
  }
  if($page<$pages)
  {
    $Next = $page + 1;
  }
  }

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
  
  <script src="../js/message.js"></script> 
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
    <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <title>Document</title>
  </head>
  <body><?php include 'navbar.php'; ?>
    <nav class="panel is-link">
     
      <marquee>
      <span style="color:red"  style="font-weight:bold">NEW FILE- </span><?php 
         echo  ucfirst($_SESSION["marq1"])." (". ucfirst($_SESSION["marq2"]).")" . " has been uploaded by " .ucfirst($_SESSION["marq3"]) ; 
       ?></marquee>
      
      <form action="" method="post">
      <div class="panel-block">
        <p class="control has-icons-left">
          <input class="input" type="text" name="search" id="search" style="color:red" placeholder="Search" value="<?php 
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
        <a href="./testing.php" class="is-active"><strong>All</strong></a>
        <a href="./projects.php"> <Strong>Projects</Strong> </a>
        <a href="./research.php"> <strong>Research Papers</strong> </a>
        <a href="./webinar.php"> <strong>Webinars</strong> </a>
        <a href="./workshop.php"><strong>Workshops</strong></a>
        
      </p>



    </nav>
    <br>
    
<div style="display:flex;margin:auto;width:94%;">
  <form action="" method="post">
  <div class="select is-right">
  
    <select name="filter" id="filter">
      <option disabled="disabled" selected="selected">--No of records--</option>
      
      <option <?php ?> value="<?= 1; ?>" <?php echo (isset($_SESSION['filter']) && $_SESSION['filter'] == 1) ? 'selected="selected"' : ''; ?>><?= $limit=1; ?></option>
		  <option <?php ?> value="<?= 5; ?>" <?php echo (isset($_SESSION['filter']) && $_SESSION['filter'] == 5) ? 'selected="selected"' : ''; ?> ><?= $limit=5; ?></option>
		  <option <?php ?> value="<?= 10; ?>" <?php echo (isset($_SESSION['filter']) && $_SESSION['filter'] == 10) ? 'selected="selected"' : ''; ?>><?= $limit=10; ?></option>
		  <option <?php ?> value="<?= 25; ?>" <?php echo (isset($_SESSION['filter']) && $_SESSION['filter'] == 25) ? 'selected="selected"' : ''; ?>><?= $limit=25; ?></option>
		      
    </select>
    </div>
    </form>
    <?php
if(isset($_SESSION['name']))
{
echo "<a href='testing.php' class='button is-black' style='margin-left:1vw;margin-top:0vh;'>All Uploads</a>";
          
         echo "<a href='workshopupload.php' class='button is-black' style='margin-left:0.3vw;margin-top:0vh;'>Upload</a>";
}      
  ?>
</div>
<br>
<br>

<div style="display:flex;margin:auto;width:94%;">
    <table class="table is-bordered is-fullwidth is-striped">
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
  
  <?php foreach($records as $row) : 
    if($row['uploader']==$_SESSION['name']): ?>  
    
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

        <?php if ($row['file']!=NULL):?>
        <th><button class="button is-success is-outlined" type="submit" name="down" onclick="window.location.href='testing.php?file_id=<?php echo $row['id'] ?>';">Download</button></th>
        <?php endif; ?>
        <?php if ($row['file']==NULL):?>
        <th><button class="button is-success is-outlined hov" title="No file is Uploaded! Check description." type="submit" name="down" onclick="window.location.href='testing.php?file_id=<?php echo $row['id'] ?>';" disabled>Download</button></th>
        <?php endif; ?>

        <th><button class="button is-link is-outlined button is-primary modal-button " onClick="fun(this,'<?php echo $row['id'];?>');" data-target = "#modal">View Details</button></th>
        
        <div id = "modal" class = "modal">
                  
         </div>

<?php 
if(isset($_SESSION['loginid']) and $row['uploader']==$_SESSION['name']):?>

    <th><button class="button is-danger is-outlined" type="submit" onclick=window.location.href="javascript:confirmDelete('removetest.php?file_id=<?php echo $row['id']?>')">Remove</button></th>
<?php endif; ?>

<?php 
if(isset($_SESSION['loginid']) and $row['uploader']!=$_SESSION['name']):?>

    <th><button class="button is-danger is-outlined hov" title="Not uploaded by you!!" type="submit" disabled >Remove</button></th>
<?php endif; ?>
    </tr>   
    <?php endif; ?>
        <?php endforeach; ?>
    
  </tbody>
</table>
</div>

      <script>
      function confirmDelete(delUrl) {
        if (confirm("Are you sure you want to delete")) 
        {
        document.location = delUrl;
        }
      }
      </script>
<br>
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <a href="testing.php?page=<?= $Previous; ?>" class="pagination-previous button is-black ml-6">Previous</a>

  <a href="testing.php?page=<?= $Next; ?>" class="pagination-next mr-6 button is-black">Next page</a>
  <ul class="pagination-list">
  <?php for($i = 1; $i<= $pages; $i++) : ?>
  <li><a href="testing.php?page=<?= $i; ?>" class="pagination-link button is-black" aria-label="Goto page 1"><?= $i; ?></a></li>
    <?php endfor; ?>
    </ul>
</nav>

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
<script>
      var a=document.querySelectorAll(".modal-button");
      console.log(a);
      a.forEach((e, i) => {
 

  e.addEventListener("click", () => {
    
    console.log(e);
    var target = $(this).data("target");
    e.classList.toggle("is-clipped");
    e.classList.toggle("is-active");
  });
});

      
      </script>
      
  </body><?php include 'footer.php'; ?></html>
