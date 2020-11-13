<?php
$host='localhost';
$user='root';
$password='';
$db='portal';

$conn = new mysqli($host, $user, $password,$db);

$conn ->select_db($db) or die( "Unable to select database");
// echo "hey";
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
  <?php 
  
  echo isset($_GET['file_id'])?1:0;
  if (isset($_GET['file_id'])) 
{  echo "hey";
    $id = $_GET['file_id'];
    $sql = "SELECT * FROM resources WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result); 
   //  echo '<p>sdvsvs</p>';        
    if ($row['category']=='workshops'): ?>
    
    <div id="modal" class = "modal">
               <div class = "modal-background"></div>
               <div class = "modal-content">
                  <div class = "box">
                     <article class = "media">
                        <div class = "media-content">
                           <div class = "content">
                              <p>
                                <strong> <?php echo $row['filename'];?></strong> 
                                 <small><?php echo ucfirst($row['category']);?> </small> 
                                 <br>
                                 <p><?php echo $row['descrip'];?></p>
                                 <br>
                                 <p>Google drive Link: 
                                 <?php if($row['drivelink']==NULL)
                                          {echo 'NA';}
                                       else {echo $row['drivelink'];}?></p>
                              </p>                             
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
      <?php endif;
}
    ?>
<?php include 'footer.php'; ?>
    </body>
    </html>
