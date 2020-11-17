<?php 
include 'database.php';
  include 'download.php';
//   include 'abcd.php';
  $slno=0;
  if(!isset($_SESSION['marq3']))
  {
    header("location:home.php");
  }
  $_SESSION['current_file_name'] = basename($_SERVER['PHP_SELF']);

  
  if(isset($_POST['search']) or isset($_SESSION['search']))
  {
    if(isset($_POST['search']))
    {
    
    $_SESSION['search']=$_POST['search'];
    $string=mysqli_real_escape_string($conn,$_POST['search']);
    }
    else{
        $string=$_SESSION['search'];
    }
  
    
    if(isset($_POST["filter"]) or isset($_SESSION['filter']) )
    {
      if(isset($_POST['filter']))
      {
      $_SESSION['filter']=$_POST["filter"];
      $limit=$_SESSION['filter'];
      $_GET['page']=1;
      
        header("location:temp.php");
      }
      else{
        $limit=$_SESSION['filter'];
      
      }
    }
    else
    {
       $limit=5;
      //  echo "hello";
    }
    
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    // echo $page;
	$start = ($page - 1) * $limit;
      // echo $start;
      $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='webinars' LIMIT $start, $limit");
      $records=$result->fetch_all(MYSQLI_ASSOC);
      
      $result1 = mysqli_query($conn,"SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='webinars'  ");

      $recCount = mysqli_fetch_assoc($result1);
      $total = $recCount['id'];
      
    // echo $total.'<br>';
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
      }
      else{
        $limit=$_SESSION['filter'];
 
      }
    }
    else
    {
       $limit=5;
    }
  $result1 = $conn->query("SELECT count(id) AS id FROM resources where category='webinars'");
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
    $result = $conn->query("SELECT * FROM resources where category='webinars' LIMIT $start, $limit");
	$records = $result->fetch_all(MYSQLI_ASSOC);

      $recCount = mysqli_fetch_assoc($result1);
      $total = $recCount['id'];
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

  $sqlq=mysqli_query($conn, "Select max(id) as id from resources where category='webinars'");
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
    }
  else
    {
    $_SESSION["marq1"]='null';
    $_SESSION["marq2"]='null';
    }
 }
 else
    {
    $_SESSION["marq1"]='null';
    $_SESSION["marq2"]='null';
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
  <body><?php include 'navbar.php';  include 'panel.php';?>
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
echo "<a href='upweb.php' class='button is-black' style='margin-left:1vw;margin-top:0vh;'>My Uploads</a>";
          
         echo "<a href='webinarupload.php' class='button is-black' style='margin-left:0.3vw;margin-top:0vh;'>Upload</a>";
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

        <?php if ($row['file']!=NULL):?>
        <th><button class="button is-success is-outlined" type="submit" name="down" onclick="window.location.href='testing.php?file_id=<?php echo $row['id'] ?>';">Download</button></th>
        <?php endif; ?>
        <?php if ($row['file']==NULL):?>
        <th><button class="button is-success is-outlined hov" title="No file is Uploaded! Check description." type="submit" name="down" onclick="window.location.href='testing.php?file_id=<?php echo $row['id'] ?>';" disabled>Download</button></th>
        <?php endif; ?>
        <th><button class="button is-link is-outlined button is-primary modal-button" data-target = "#modal" onClick="fun(this,'<?php echo $row['id'];?>');">View Details</button></th>
        <div id = "modal" class = "modal">        
        </div>
        
      <?php 
if(isset($_SESSION['loginid']) and $row['uploader']==$_SESSION['name']):?>

    <th><button class="button is-danger is-outlined" type="submit" onclick=window.location.href="javascript:confirmDelete('remove.php?file_id=<?php echo $row['id']?>')">Remove</button></th>
<?php endif; ?>

<?php 
if(isset($_SESSION['loginid']) and $row['uploader']!=$_SESSION['name']):?>

    <th><button class="button is-danger is-outlined" type="submit" disabled>Remove</button></th>
<?php endif; ?>
    </tr>   
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
    <a href="webinar.php?page=<?= $Previous; ?>" class="pagination-previous button is-black ml-6">Previous</a>

  <a href="webinar.php?page=<?= $Next; ?>" class="pagination-next mr-6 button is-black">Next page</a>
  <ul class="pagination-list">
  <?php for($i = 1; $i<= $pages; $i++) : ?>
  <li><a href="webinar.php?page=<?= $i; ?>" class="pagination-link button is-black" aria-label="Goto page 1"><?= $i; ?></a></li>
    <?php endfor; ?>
    </ul>
</nav>
<?php include 'footer.php'; ?><script type="text/javascript">
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
