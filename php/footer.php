<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
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

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>


</body>
</html>