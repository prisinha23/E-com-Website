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

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">home</a></li>
                <li>About Us</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>About Us</h2>
                    </center>
                </div>
                
                <img src="images/62a94d959e0cc6baf95c33db35c5c194--time-cartoon-cartoon-picture.jpg" width="1095" height="700">
                <br><br><br><br><br><br><br><br>
                
               <div id="demoFont">
                    <h4 >
                    ToyFight is an award-winning creative design agency.<br>

You’ll find the About Page at the top of the menu under the Who section.<br>

This page has a unique feel, thanks to the deconstructed action figures representing the founders, Leigh Whipday and Jonny Lander.<br>

The great attention to detail and interactivity also reflect the company’s 16 years of experience.<br>

To sum up, this page stands out by providing the perfect mix of fun and information.<br>
                </h4>
                <style>
                #demoFont {
font-family: "Comic Sans MS", cursive, sans-serif;
font-size: 30px;
letter-spacing: 3.8px;
word-spacing: 1.8px;
color: #3718FF;
font-weight: 400;
text-decoration: none;
font-style: italic;
font-variant: small-caps;
text-transform: capitalize;
}   
                </style>
               </div>
                
            </div>
        </div>
      
     <!-----------video number 41------->
    
   
 </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html> 
 




















