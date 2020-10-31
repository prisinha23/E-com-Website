<?php
if(isset($_GET['edit_profile'])){
    $edit_id=$_GET['edit_profile'];
    $get_p="select * from admins where admin_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_p);
    $row_edit=mysqli_fetch_array($run_edit);
    $admin_id=$row_edit['admin_id'];
    $admin_email=$row_edit['admin_name'];
    $admin_image=$row_edit['admin_image'];
    $admin_contact=$row_edit['admin_contact'];
    $admin_country=$row_edit['admin_country'];
    $admin_job=$row_edit['admin_job'];
    $admin_about=$row_edit['admin_about'];

}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Admin</title>
     <style type="text/css" href="styles/style.css"></style>
      <script>tinymce.init({selector:'textarea'});</script>
 </head>
<body>

<div id="content">
    <div class="container">
        
        <div class="box">
           <div class="col-md-12">
            <ul class="breadcrumb">
                <li>Admin Page</li>
                <li>Edit Admin Info</li>
            </ul>
        </div>
           <hr class="dotted short">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencils fa-w"></i>Edit Admin Info
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Name</label>
                            <input type="text" name="admin_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin email</label>
                            <input type="text" name="admin_email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Image</label>
                            <input type="file" name="admin_image" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Contact</label>
                            <input type="text" name="admin_contact" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Country</label>
                            <input type="text" name="admin_country" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin Job</label>
                            <input type="text" name="admin_job" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Admin About</label>
                            <textarea name="admin_about" class="form-control" rows="6" cols="19"></textarea>
                        </div>


                        <div class="form-group">
                            <input type="submit" name="update" value="Confirm To Edit" class="btn btn-primary form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>




 </div>
</div>
     </body>
</html>


<?php

if(isset($_POST['update'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_contact=$_POST['admin_contact'];
    $admin_country=$_POST['admin_country'];
    $admin_job=$_POST['admin_job'];
    $admin_about=$_POST['admin_about'];

    $admin_image=$_FILES['admin_image']['name'];


    $temp_admin_image=$_FILES['product_imgage']['tmp_name'];


    move_uploaded_file($temp_admin_image, "admin_images/$admin_image");



    $update_product="update admins set admin_name='$admin_name',admin_email='$admin_email',admin_image='$admin_image',admin_contact='$admin_contact',admin_country='$admin_country',admin_job='$admin_job',admin_about='$admin_about' where admin_id='$edit_id'";

    $run_product=mysqli_query($con,$update_product);

    if($run_product){
        echo "<script>alert('Admin Profile Updated Successfully');</script>";
        echo "<script>window.open('admin.php?view_user','_self')</script>";
    }

}
?>






