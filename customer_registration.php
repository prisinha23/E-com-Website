<?php

session_start();//as it starts when someone logins

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
                <li>Registration</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Customer Registration</h2>
                    </center>
                </div>
                
                <form action="customer_registration.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Customer email</label>
                        <input type="email" name="email" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" required="" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" required="" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" required="" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>city</label>
                        <input type="text" name="city" required="" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" name="number" required="" class="form-control">
                    </div>
                     <div class="form-group">
                        <label>Customer Imager</label>
                        <input type="file" name="image" required="" class="form-control">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>REGISTER
                        </button>
                    </div>
                    
                </form>
                
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
 
<?php
if(isset($_POST['submit'])){
    $c_name=$_POST['name'];
    $c_email=$_POST['email'];
    $c_pass=$_POST['password'];
    $c_country=$_POST['country'];
    $c_address=$_POST['address'];
    $c_city=$_POST['city'];
    $c_number=$_POST['number'];
    $c_image=$_FILES['image']['name'];
    $c_tmp_image=$_FILES['image']['tmp_name'];
    $c_ip=getuserip();
    
    move_uploaded_file($c_tmp_image,"customer/customer_images/$c_image");
    $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_address,customer_city,customer_contact,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_address','$c_city','$c_number','$c_image','$c_ip')";
    $run_customer=mysqli_query($con,$insert_customer);
    $sel_cart="select * from cart where ip_add='$c_ip' ";
    $run_cart=mysqli_query($con,$sel_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('you have been registered succefully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
    else {
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('you have been registered succefully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}

?>



















