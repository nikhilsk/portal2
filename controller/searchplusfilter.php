<?php 
include '../php/database.php';


if(isset($_POST['search']) or isset($_SESSION['search'])) 
{
    
    // echo $_POST['search'];
    
    if(isset($_POST['search']))
    {
    
  $_SESSION['search']=$_POST['search'];
    $string=mysqli_real_escape_string($conn,$_POST['search']);
    }
    else{
        $string=$_SESSION['search'];
    }
  $limit = isset($_POST["filter"]) ? $_SESSION['filter']=$_POST["filter"] : 5;
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;
  
    
    if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='projects' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='webinars' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='workshops' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='research' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' LIMIT $start, $limit");
    }
    $records=$result->fetch_all(MYSQLI_ASSOC);
    
    if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='projects' LIMIT $start,$limit");
   }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='webinars' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='workshops' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='research' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' LIMIT $start,$limit");
   }
    
   
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $recCount = $result1->fetch_all(MYSQLI_ASSOC);
    $total = $recCount[0]['id'];
    echo $total;
      $pages = ceil( $total / $limit );
      if($page>1)
      {
    $Previous = $page - 1;
      }
    if($page<$pages)
    {
      $Next = $page + 1;
    }
//    echo $Previous;
//    echo $Next;
//    echo $pages;
//    echo $page;


      if(isset($_POST["filter"]) or isset($_SESSION['filter']) )
      {
        if(isset($_POST['filter']))
        {
        $_SESSION['filter']=$_POST["filter"];
        $limit=$_SESSION['filter'];
        $_GET['page']=1;
        
header("location:../php/temp.php");
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

    $string=mysqli_real_escape_string($conn,isset($_POST['search'])?$_POST['search']:$_SESSION['search']);

    if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='projects' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='webinars' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='workshops' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='research' LIMIT $start, $limit");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $result=$conn->query("Select * from resources where filename LIKE '%$string%' LIMIT $start, $limit");
    }
   
        // $result=$conn->query("Select * from resources where filename LIKE '%$string%' and category='webinars' LIMIT $start, $limit");

    
    $records=$result->fetch_all(MYSQLI_ASSOC);
    // $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='webinars' LIMIT $start, $limit ");


    if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='projects' LIMIT $start,$limit");
   }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        // echo "hey";
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='webinars' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='workshops' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' and category='research' LIMIT $start,$limit");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where filename LIKE '%$string%' LIMIT $start,$limit");
   }

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
    $name= $_SESSION['current_file_name'];
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
        
header("location:../php/temp.php");
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
// $result1 = $conn->query("SELECT count(id) AS id FROM resources where category='webinars'");

// $string=mysqli_real_escape_string($conn,$_POST['search']);
if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where category='projects'" );
   }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where category='webinars' ");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where  category='workshops' ");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources where  category='research' ");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $result1 = $conn->query("SELECT count(id) AS id FROM resources" );
   }

$page = isset($_GET['page']) ? $_GET['page'] : 1;
  $start = ($page - 1) * $limit;
//   $result = $conn->query("SELECT * FROM resources where category='webinars' LIMIT $start, $limit");


  if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
  {
      $result=$conn->query("Select * from resources where category='projects' LIMIT $start, $limit");
  }
  if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
  {
      $result=$conn->query("Select * from resources where category='webinars' LIMIT $start, $limit");
  }
  if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
  {
      $result=$conn->query("Select * from resources where category='workshops' LIMIT $start, $limit");
  }
  if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
  {
      $result=$conn->query("Select * from resources where category='research' LIMIT $start, $limit");
  }
  if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
  {
      $result=$conn->query("Select * from resources LIMIT $start, $limit");
  }

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

echo $_SESSION['current_file_name'];
    if($_SESSION['current_file_name']=='uppro.php' or $_SESSION['current_file_name']=='projects.php')
    {
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources where category='projects'");
    }
    if($_SESSION['current_file_name']=='upweb.php' or $_SESSION['current_file_name']=='webinar.php')
    {
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources where category='webinars'");
    }
    if($_SESSION['current_file_name']=='upwork.php' or $_SESSION['current_file_name']=='workshop.php')
    {
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources where category='workshops'");
    }
    if($_SESSION['current_file_name']=='upres.php' or $_SESSION['current_file_name']=='research.php')
    {
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources where category='research'");
    }
    if($_SESSION['current_file_name']=='up.php' or $_SESSION['current_file_name']=='testing.php')
    {
        $sqlq=mysqli_query($conn, "Select max(id) as id from resources");
    }

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