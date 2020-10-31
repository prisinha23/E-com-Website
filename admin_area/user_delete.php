<?php
if(isset($_GET['user_delete'])){
    $delete_cat_id=$_GET['user_delete'];
    $delete_cat="delete from admins where admin_id='$delete_cat_id' ";
    $run_delete=mysqli_query($con,$delete_cat);
    if($run_delete){
        echo "<script>alert('Selected Admin Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_user','_self')</script>";
    }
}

?>