<?php
if(isset($_GET['order_delete'])){
    $delete_cat_id=$_GET['order_delete'];
    $delete_cat="delete from customer_order where order_id='$delete_cat_id' ";
    $run_delete=mysqli_query($con,$delete_cat);
    if($run_delete){
        echo "<script>alert('Selected Order Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_order','_self')</script>";
    }
}

?>