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
                <li>Insert User</li>
            </ul>
        </div>
           <hr class="dotted short">
            <center>
                <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencil fa-w"></i>Insert User
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Name</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Email</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Password</label>
                            <div class="col-md-6">
                                <input type="password" name="admin_pass" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Country</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_country" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Job</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_job" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Contact</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_contact" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User About</label>
                            <div class="col-md-6">
                                <input type="text" name="admin_about" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" >User Image</label>
                            <div class="col-md-6">
                                <input type="file" name="admin_image" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </center>
        </div>




 </div>
</div>
     </body>
</html>
<?php

if(isset($_POST['submit'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_pass=$_POST['admin_pass'];
    $admin_country=$_POST['admin_country'];
    $admin_job=$_POST['admin_job'];
    $admin_contact=$_POST['admin_contact'];
    $admin_about=$_POST['admin_about'];
    $admin_image=$_FILES['admin_image']['name'];
    $temp_admin_image=$_FILES['admin_image']['tmp_name'];
    
    move_uploaded_file($temp_admin_image,"admin_images/$admin_image");
    
    $insert_admin="insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_country,admin_job,admin_about) values ('$admin_name','$admin_email','$admin_pass','$admin_image','$admin_contact','$admin_country','$admin_job','$admin_about')";

    $run_admin=mysqli_query($con,$insert_admin);

    if($run_admin){
        echo "<script>alert('ONE MORE ADMIN ADDED successfully');</script>";
        echo "<script>window.open('admin.php?view_user','_self')</script>";
    }

}

