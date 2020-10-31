
<?php

$customer_session=$_SESSION['customer_email'];
              $get_customer="select * from customers where customer_email='$customer_session' ";
              $run_cust=mysqli_query($con,$get_customer);
              $row_cust=mysqli_fetch_array($run_cust);
$customer_id=$row_cust['customer_id'];
$customer_name=$row_cust['customer_name'];
$customer_email=$row_cust['customer_email'];
$customer_country=$row_cust['customer_country'];
$customer_city=$row_cust['customer_city'];
$customer_contact=$row_cust['customer_contact'];
$customer_image=$row_cust['customer_image'];
$customer_add=$row_cust['customer_address'];

?>
   

   
   <div class="box">
    <center>
        <h1>Edit Your Account</h1>
    </center>
   <form method="post"  action="">
        <div class="form-group">
        <label>Customer Name</label>
        <input type="text" name="c_name" class="form-control" required="" value="<?php echo $customer_name ?>">
    </div>
    <div class="form-group">
        <label>Customer email</label>
        <input type="email" name="c_email" class="form-control" required="" value="<?php echo $customer_email ?>">
    </div>
    <div class="form-group">
        <label>Customer Country</label>
        <input type="text" name="c_country" class="form-control" required="" value="<?php echo $customer_country ?>">
    </div>
    <div class="form-group">
        <label>Customer City</label>
        <input type="text" name="c_city" class="form-control" required="" value="<?php echo $customer_city ?>">
    </div>
    <div class="form-group">
        <label>Customer Number</label>
        <input type="tel" name="c_number" class="form-control" required="" value="<?php echo $customer_contact ?>">
    </div>
    <div class="form-group">
        <label>Customer Address</label>
        <input type="text" name="c_address" class="form-control" required="" value="<?php echo $customer_add ?>">
    </div>
    <div class="form-group">
        <label>Customer image</label>
        <input type="file" name="image" class="form-control" required="">
        <img src="customer_images/<?php echo $customer_image ?>" class="img-responsive" height="100" width="100">
    </div>
    <div class="tex-center">
            <button type="submit" class="btn btn-success" name="update">Update Now</button>
    </div>
   </form>
</div>

<?php
if(isset($_POST['update'])){
    $update_id=$customer_id;
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_country=$_POST['c_country'];
    $c_city=$_POST['c_city'];
    $c_number=$_POST['c_number'];
    $c_address=$_POST['c_address'];
    $c_image=$_FILES['image']['name'];
    $c_image_tmp=$_FILES['image']['tmp_name'];
    
    
    move_uploaded_file($c_image_tmp,"customer_images/$c_image");
    $update_customer= "update customers set customer_name='$c_name', customer_email='$c_email', customer_county='$c_country', customer_city='$c_city', customer_contact='$c_number', customer_address='$c_address', customer_image='$c_image', customer_id='$update_id' where customer_id='$update_id' ";
    
    $run_customer=mysqli_query($con,$update_customer);
    if($run_customer){
        echo "<script>alert('Details Have Been UPDATED')</script>";
        echo "<script>window.open('myacccount.php?edit_account','_self')</script>";
    }else {
        echo "<script>alert('Sorry Could not UPDATE')</script>";
        exit();
    }
}

?>




