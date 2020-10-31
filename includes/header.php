 <div class="offercolumn"><!------header navbar start---------->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="nav navbar-header col-md-6 offer">
     <a href="#" class="btn btn-success btn-sm">
         
         <?php
         if(!isset($_SESSION['customer_email'])){
             echo "Welcome Guest";
         }else {
             echo "Welcome :" .$_SESSION['customer_email']. "";
         }
         ?>
         </a>
     Total product in cart :<?php item(); ?>  Total Price: INR <?php totalprice(); ?>
    </div>
    <ul class="nav navbar-nav  navbar-right">
      <li><a href="../../ecom/customer_registration.php">Register</a></li>
      <li>
          <?php
          if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>My Account</a>";
          }else {
              echo "<a href='../../ecom/customer/myacccount.php?my_order'>My Account</a>";
          }
          ?>
      </li>
      <li><a href="cart.php">Go To Cart</a></li>
      <li>
          <?php
          if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>Login</a>";//if a person is not logged in
          }else {
              echo "<a href='logout.php'>Logout</a>";
          }
          ?>
      </li>
      <li><a href="admin_area/admin.php">Admin</a></li>
    </ul>
  </div>
</nav>
  
   </div><!------header navbar end---------->
   <div id="navbar1"><!------navbar start---------->
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
   <a class="navbar-brand" href="index.php">
    <img src="images/horse-logo2.jpg" width="30" height="30" alt="">
  </a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li>
          <?php
          if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>My Account</a>";
          }else {
              echo "<a href='../../ecom/customer/myacccount.php?my_order'>My Account</a>";
          }
          ?>
      </li>
      <li><a href="cart.php">Shopping Cart</a></li>
      <li><a href="aboutus.php">About Us</a></li>
      <li><a href="#">Services</a></li>
      <li><a href="contactus.php">Contact Us</a></li>
    </ul>
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
      </div>
       <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>

    </div><!------navbar end---------->