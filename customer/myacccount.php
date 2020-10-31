<?php
session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('checkout.php','_self')</script>";
}else {
    

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
                <li><a href="../index.php">home</a></li>
                <li>My Account</li>
            </ul>
        </div>
                <!----sidebar------->
        <div class="col-md-3">
            <?php 
            include("includes/sidebar.php");
            ?>
        </div>
       
       
       <div class="col-md-9">
           <?php
           
           if(isset($_GET['my_order']))
           {
               include("my_order.php");
           }
           
           ?>
           <?php
           
           if(isset($_GET['pay_offline']))
           {
               include("pay_offline.php");
           }
           
           ?>
           <?php
           
           if(isset($_GET['my_address']))
           {
               include("my_address.php");
           }
           
           ?>
           <?php
           
           if(isset($_GET['edit_account']))
           {
               include("edit_account.php");
           }
           
           ?>
            <?php
           
           if(isset($_GET['change_pas']))
           {
               include("change_pas.php");
           }
           
           ?>
             <?php
           
           if(isset($_GET['delete']))
           {
               include("delete.php");
           }
           
           ?>
       </div>
      
     
    
   
  
 




    </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html>


<?php } ?>