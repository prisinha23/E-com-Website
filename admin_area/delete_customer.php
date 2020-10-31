<?php
if(isset($_GET['delete_customer'])){
    $delete_cat_id=$_GET['delete_customer'];
    $delete_cat="delete from customers where customer_id='$delete_cat_id' ";
    $run_delete=mysqli_query($con,$delete_cat);
    if($run_delete){
        echo "<script>alert('Selected Customer Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_customer','_self')</script>";
    }
}

?>