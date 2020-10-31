<div class="box">
    <div class="box-header">
        <center><h2>Login</h2>
        <p class="lead">Already our customer</p>
        </center>
        
    </div>
    
    <form action="checkout.php" method="post" >
		<div class="form-group text-center" >
		   <label> Email:</label>
		    <input type="text" class="form-control" name="email" required>
		</div> 
   <div class="form-group text-center">
		    <label> Password:</label>
		    <input type="password" class="form-control" name="password" required>
		</div>   
        
        <div class="text-center text-align">
            <button name="login" value="Login" class="button">
               <i class="fa fa-sign-in"></i> Log-in
            </button>
        </div>         
    </form>	
    <center>
        <a href="customer_registration.php"><h3 class="registration">Not Registered????Click Here</h3></a>
    </center>	
</div>


<style>
.button {
  border-radius: 4px;
  background-color:  #cc33ff;
  border: none;
  color:  white;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}


.button:hover{
  
  border-radius: 4px;
  background-color:  #40ff00;
  border: none;
  color: black;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  width: 200px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
    .registration {
  border-radius: 2px;
  background-color:  #4d79ff;
  border: none;
  color:  white;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}


.registration:hover{
  
  border-radius: 4px;
  background-color:  #002080;
  border: none;
  color: whitesmoke;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
</style>




<?php
if(isset($_POST['login'])){
    $customer_email=$_POST['email'];
    $customer_pass=$_POST['password'];
    $select_customer="select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer=mysqli_query($con,$select_customer);
    $get_ip=getuserip();
    $check_customer=mysqli_num_rows($run_customer);
    $select_cart="select * from cart where ip_add='$get_ip' ";//check wheter the peson has done any shopping or not
    $run_cart=mysqli_query($con,$select_cart);
    $check_cart=mysqli_num_rows($run_cart);
    if($check_customer==0){//no infromation for this data
        echo "<script>alert('wrong Email or Password')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0){//is valid user but no shopping done
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('You Are Logged in')</script>";
        echo "<script>window.open('customer/myacccount.php','_self')</script>";
    } else {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('You Are Logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    }
}
?>





