<?php 


include 'database.php';
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