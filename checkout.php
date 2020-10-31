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
                <li>Checkout Page</li>
            </ul>
        </div>
        <div class="col-md-12">
            
                    
                    <?php
                    if(!isset($_SESSION['customer_email'])){
                        include("customer/customer_login.php");
                    }else {
                        include("payment_options.php");
                    }
                    ?>
                    
                </div>
            
          </div>
        </div>
      
     <!-----------video number 41------->
    

<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html> 
      
      
     
    
   
  
 
