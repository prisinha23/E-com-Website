<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!------all bootstrap from w3school---------->
    <meta charset="UTF-8">
    <title>E-Commerce Store</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<!-----header  start----->
<?php
include("includes/header.php");  
    
?>
<!-----header  end----->

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Contact Us</h2>
                        <p class="text-muted">If any Queries feel free to drop us your question</p>
                    </center>
                </div>
                
                <form action="contactus.php" method="post">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <input type="email" name="email" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" name="subject" required="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control" name="message"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="Submit" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>Send Message
                        </button>
                    </div>
                    
                </form>
                
            </div>
        </div>
      
     <!-----------video number 41------->
    
   
 </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html> 
 
<?php
//admin mail
if(isset($_POST['submit'])){
    $sendername=$_POST['name'];
    $senderemail=$_POST['email'];
    $sendersubject=$_POST['subject'];
    $sendermessage=$_POST['message'];
    $recieveremail="priyeshsinha.ranchi@gmail.com";
    mail($recieveremail,$sendername,$sendersubject,$sendermessage,$senderemail);//reciever is admin so he gets the mail
//customer mail
$email=$_POST['email'];
$subject="Welcome to our Website";
$msg="I shall Get You Soon and Thanks for SENDING email";
$from="priyeshsinha.ranchi@gmail.com";
mail($email,$subject,$msg,$from);

echo "<h2 align='center'>Your Mail Sent</h2>" ;//works when project goes online not on localhost
}
?>



















