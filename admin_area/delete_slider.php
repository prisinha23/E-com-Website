<?php
if(isset($_GET['delete_slide'])){
    $delete_cat_id=$_GET['delete_slide'];
    $delete_cat="delete from slider where id='$delete_cat_id' ";
    $run_delete=mysqli_query($con,$delete_cat);
    if($run_delete){
        echo "<script>alert('slide Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_slider','_self')</script>";
    }
}

?>