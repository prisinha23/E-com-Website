<?php
session_start();

if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('checkout.php','_self')</script>";
}else {
    

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    $order_id=&$_GET['order_id'];
}
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
            include("../customer/includes/sidebar.php");
            ?>
        </div>
       
       
        
        <div class="col-md-9">
            <div class="box">
                <h1 align="center">Please Confirm your Payment</h1>
                
                
                <?php
              
              $customer_session=$_SESSION['customer_email'];
              $get_customer="select * from customers where customer_email='$customer_session' ";
              $run_cust=mysqli_query($con,$get_customer);
              $row_customer=mysqli_fetch_array($run_cust);
              $customer_id=$row_customer['customer_id'];
              $get_order="select * from customer_order where customer_id='$customer_id' ";
              $run_order=mysqli_query($con,$get_order);
              $row_order=mysqli_fetch_array($run_order);
                  $due_amount=$row_order['due_amount'];
                  $invoice_no=$row_order['invoice_number'];
                 
              
             ?>
                <form action="confirm.php?update_id=<?php echo $order_id?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Invoice Number</label>
                        <input type="text" class="form-control" name="invoice_number" required="" value="<?php echo $invoice_no ?>">
                    </div>
                     <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" name="amount" required="" value="<?php echo $due_amount ?>">
                    </div>
                     <div class="form-group">
                        <label>Payment Mehtod</label>
                        <select class="form-control" name="payment_mode">
                            <option>Bank Transfer</option>
                            <option>Paytm</option>
                            <option>PhonePay</option>
                            <option>Bhim</option>
                            <option>Amazon Pay</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Transaction Number</label>
                        <input type="tel" class="form-control" name="trfr_number" required="">
                    </div>
                     <div class="form-group">
                        <label>payment Date</label>
                        <input type="date" class="form-control" name="date" required="">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
                    </div>
                </form>
                
                
                
                <?php
                if(isset($_POST['confirm_payment'])){
                    $update=$_GET['update_id'];
                    $invoice_no=$_POST['invoice_number'];
                    $amount=$_POST['amount'];
                    $payment_mode=$_POST['payment_mode'];
                    $trfr_number=$_POST['trfr_number'];
                    $date=$_POST['date'];
                    $complete="complete";
                    $insert="insert into payments (invoice_id,amount,payment_mode,ref_no,payment_date) values ('$invoice_no','$amount','$payment_mode','$trfr_number','$date')";
                    $run_insert=mysqli_query($con,$insert);
                    
                    
                    $update_q="update customer_order set order_status ='$complete' where order_id='$update'";
                    $run_update=mysqli_query($con,$update_q);
                     $update_p="update pending_order set order_status ='$complete' where order_id='$update'";
                    $run_update=mysqli_query($con,$update_p);
                    
                    echo "<script>alert('Your Order has Been RECEIVED')</script>";
                    echo "<script>window.open('myacccount.php?my_order','_self')</script>";
                }
                
                ?>
            </div>
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