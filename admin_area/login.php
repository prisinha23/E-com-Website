<?php
session_start();
include ("includes/db.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-Commerce Store/Admin Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="css/login.css">

</head>
<body>
  <div class="sidenav">
         <div class="login-main-text">
            <h2>ADMIN LOGIN PAGE<br></h2>
            <p>Login from here to access Admin Page.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="" method="post">
                  <div class="form-group">
                     <label>Admin Email Id</label>
                     <input type="text" class="form-control" placeholder="Email Address" name="admin_email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" placeholder="Password" name="admin_pass">
                  </div>
                  <center>
                      <button type="submit" class="btn btn-black" name="admin_login">Login</button>
                  </center>
                  <br>
                  <br>
                  <br>
                  <center>
                      Forgot Password????
                  <a href="forget_password.php" ><button class="btn btn-danger">click Here</button></a>
                  </center>
               </form>
            </div>
         </div>
      </div>  
</body>
</html>




<?php
if(isset($_POST['admin_login'])){
    $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);//validate strign as email or not
    $admin_password=mysqli_real_escape_string($con,$_POST['admin_pass']);
    $get_admin="select * from admins where admin_email='$admin_email' AND admin_pass='$admin_password'";
    $run_admin=mysqli_query($con,$get_admin);
    $count=mysqli_num_rows($run_admin);//check whether admin is present there or not
    if($count==1){
        $_SESSION['admin_email']=$admin_email;
        echo "<script>alert('You Are Logged In')</script>";
        echo "<script>window.open('admin.php?dashboard','_self')</script>";
    }else {
        echo "<script>alert('Wrong Email or Password')</script>";
    }
    
}

?>






