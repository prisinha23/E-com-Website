<div class="box">
    <center>
        <h1>Do You Really Want To Delete Your Account</h1>
    </center>
    <form action="" method="post">
      <center>
            <input type="submit" name="yes" value="Yes I Want To Delete" class="btn btn-danger">
        <input type="submit" name="no" value="No I Don't Want" class="btn btn-success">
      </center>
    </form>
</div>


<?php

$c_email=$_SESSION['customer_email'];
$get_customer="select * from customers where customer_email='$c_email' ";
              $run_cust=mysqli_query($con,$get_customer);
              $row_customer=mysqli_fetch_array($run_cust);
$c_id=$row_customer['customer_id'];
if(isset($_POST['yes'])){
    $delete_q="delete from customers where customer_id='$c_id' ";
    $run_q=mysqli_query($con,$delete_q);
    if($run_q){
        session_destroy();
        echo "<script>alert('Your Account has been DELETED')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

?>