<?php
if(isset($_GET['payment_delete'])){
    $delete_cat_id=$_GET['payment_delete'];
    $delete_cat="delete from payments where payment_id='$delete_cat_id' ";
    $run_delete=mysqli_query($con,$delete_cat);
    if($run_delete){
        echo "<script>alert('Selected Payment Made Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_payments','_self')</script>";
    }
}

?>