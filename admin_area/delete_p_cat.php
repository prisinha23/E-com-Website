<?php
if(isset($_GET['delete_p_cat'])){
    $delete_p_cat_id=$_GET['delete_p_cat'];
    $delete_p_cat="delete from product_categories where p_cat_id='$delete_p_cat_id' ";
    $run_delete=mysqli_query($con,$delete_p_cat);
    if($run_delete){
        echo "<script>alert('Product Category Has been deleted')</script>";
        echo "<script>window.open('admin.php?view_product_cat','_self')</script>";
    }
}

?>