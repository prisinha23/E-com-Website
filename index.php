<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
   
<!------all bootstrap from w3school---------->
    <meta charset="UTF-8">
    <title>E-Commerce Store</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <!-----header  start----->
<?php
include("includes/header.php");  
    
?>
<!-----header  end----->
<div class="slider">
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->

     <!-------slider here is dynamic------------>
      <?php
      
      $get_slider="select * from slider LIMIT 0,3";/*select data from database using querry limit 1 means one image at a time*/
      $run_slider=mysqli_query($con,$get_slider);//2parameter: 1.connection and 2.another query
      while ($row=mysqli_fetch_array($run_slider)){
          $slider_name=$row['slider_name'];//as all data is in row so we take data from row having name as slidername in database
          $slider_image=$row['slider_image'];
          echo "  <div class='mySlides fade''>
    <img src='images/$slider_image' style='width:100%'>
  </div>
          ";
      }
      
      ?>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>
</div>

<script>
    
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>


<div id="advantage"><!---advantage start--->
    <div class="container"><!---container start--->
        <div class="same-height-row">
            <div class="col-sm-4">
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">BEST PRICES</a></h3>
                    <p>you can check all other sites about prices and then compare with us.</p>
                </div>
            </div>
            <div class="col-sm-4"><!---division into 4 start--->
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">100% SATISFACTION GUARANTEED FROM US</a></h3>
                    <p>free return on everything for 3 months.</p>
                </div>
            </div><!---division into 4 end--->
            <div class="col-sm-4"><!---division into 4 start--->
                <div class="box same-height">
                    <div class="icon">
                        <i class="fa fa-heart"></i>
                    </div>
                    <h3><a href="#">WE LOVE OUR CUSTOMERS</a></h3>
                    <p>we are known to provide best possible service ever.</p>
                </div>
            </div><!---division into 4 end--->
        </div>
    </div><!---container end--->
</div><!---advantage end--->
<div class="something">
    <div class="box">
        <div class="container">
            <div class="col-md-12">
                <h2 style=" text-transform: uppercase;
    font-size: 36px;
    color: #4993e4;
    font-weight: 100;
    text-align: center;">Latest this week</h2>
            </div>
        </div>
    </div>
</div>
<div id="content" class="container">
    <div class="row">
        <?php
        getpro();
        ?>
    </div>
</div>
<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html>