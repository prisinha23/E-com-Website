<?php

session_start();//as it starts when someone logins

include("includes/db.php");
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else {
include("functions/functions.php");
?>
<?php
$admin_session=$_SESSION['admin_email'];
$get_admin="select * from admins where admin_email='$admin_session' ";
    $run_admin=mysqli_query($con,$get_admin);
    $row_admin=mysqli_fetch_array($run_admin);
    $admin_id=$row_admin['admin_id'];
    $admin_name=$row_admin['admin_name'];
    $admin_image=$row_admin['admin_image'];
    $admin_job=$row_admin['admin_job'];
    $admin_email=$row_admin['admin_email'];
    $admin_country=$row_admin['admin_country'];
    $admin_contact=$row_admin['admin_contact'];
    $admin_about=$row_admin['admin_about'];
    
    
    $get_product="select * from products";
    $run_product=mysqli_query($con,$get_product);
    $count_pro=mysqli_num_rows($run_product);
    
    
    
    $get_cust="select * from customers";
    $run_cust=mysqli_query($con,$get_cust);
    $count_cust=mysqli_num_rows($run_cust);
    
    
    $get_p_cat="select * from product_categories";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $count_p_cat=mysqli_num_rows($run_p_cat);
    
    
    $get_order="select * from customer_order";
    $run_order=mysqli_query($con,$get_order);
    $count_order=mysqli_num_rows($run_order);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Com/Admin PAGE</title>
    
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="styles/style.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>

<!----style page starts here---->
<style>
body{
  background-image: linear-gradient(to right, #99ffcc, white);
}   
</style>

<div class="wrapper">
   <?php include("includes/sidebar.php"); ?>
    <div class="col-md-12">
        <div class="page-wrapper">
        <div class="container-fluid">
            <?php 
            if(isset($_GET['dashboard'])){
                include 'dashboard.php';
            }
           if(isset($_GET['insert_product'])){
                include 'insert_product.php';
           }
          if(isset($_GET['view_product'])){
                include 'view_product.php';
           }
            if(isset($_GET['delete_product'])){
                include 'delete_product.php';
           }
            if(isset($_GET['edit_product'])){
                include 'edit_product.php';
           }
           if(isset($_GET['insert_product_cat'])){
                include 'insert_p_cat.php';
           }
           if(isset($_GET['view_product_cat'])){
                include 'view_p_cat.php';
           }
           if(isset($_GET['delete_p_cat'])){
                include 'delete_p_cat.php';
           }
           if(isset($_GET['edit_p_cat'])){
                include 'edit_p_cat.php';
           }
           if(isset($_GET['insert_categories'])){
                include 'insert_cat.php';
           }
           if(isset($_GET['view_categories'])){
                include 'view_cat.php';
           }
           if(isset($_GET['delete_cat'])){
                include 'delete_cat.php';
           }
           if(isset($_GET['edit_cat'])){
                include 'edit_cat.php';
           }
           if(isset($_GET['insert_slider'])){
                include 'insert_slider.php';
           }
           if(isset($_GET['view_slider'])){
                include 'view_slider.php';
           }
           if(isset($_GET['delete_slide'])){
                include 'delete_slider.php';
           }
           if(isset($_GET['edit_slide'])){
                include 'edit_slider.php';
           }
           if(isset($_GET['view_customer'])){
                include 'view_customer.php';
           }
           if(isset($_GET['delete_customer'])){
                include 'delete_customer.php';
           }
           if(isset($_GET['view_order'])){
                include 'view_order.php';
           }
           if(isset($_GET['order_delete'])){
                include 'order_delete.php';
           }
           if(isset($_GET['view_payments'])){
                include 'view_payments.php';
           }
           if(isset($_GET['payment_delete'])){
                include 'payment_delete.php';
           }
           if(isset($_GET['insert_user'])){
                include 'insert_user.php';
           }
           if(isset($_GET['view_user'])){
                include 'view_user.php';
           }
           if(isset($_GET['user_delete'])){
                include 'user_delete.php';
           }
           if(isset($_GET['edit_profile'])){
                include 'edit_profile.php';
           }
           
            ?>

            
        </div>
    </div>
    </div>
</div>

</body>
</html> 
      
<?php } ?>      
     
    
   
  
 
