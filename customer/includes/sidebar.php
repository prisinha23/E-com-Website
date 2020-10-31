<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
       
       
       <?php
        $session_customer=$_SESSION['customer_email'];
        $get_cust="select * from customers where customer_email='$session_customer' ";
        $run_cust=mysqli_query($con,$get_cust);
        $row_customer=mysqli_fetch_array($run_cust);
        $customer_image=$row_customer['customer_image'];
        $customer_name=$row_customer['customer_name'];
        if(!isset($_SESSION['customer_email'])){
            
        }else {
            echo "<center>
            <img src='customer_images/$customer_image' class='img-responsive'>
        </center>
        <br>
        <h3 align='center' class='panel-title'>$customer_name</h3>";
        }
        ?>
        
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET[my_order])){echo "active";}?>">
                <a href="myacccount.php?my_order" >
                <i class="fa fa-list"></i>
                My Order</a>
            </li>
            <li class="<?php if(isset($_GET[pay_offline])){echo "active";}?>">
                <a href="myacccount.php?pay_offline" >
                <i class="fa fa-bolt"></i>
                Pay Offline</a>
            </li>
            <li class="<?php if(isset($_GET[my_address])){echo "active";}?>">
                <a href="myacccount.php?my_address" >
                <i class="fa fa-user"></i>
                Address</a>
            </li>
            <li class="<?php if(isset($_GET[edit_account])){echo "active";}?>">
                <a href="myacccount.php?edit_account" >
                <i class="fa fa-pencil"></i>
                Edit Account</a>
            </li>
            <li class="<?php if(isset($_GET[change_pas])){echo "active";}?>">
                <a href="myacccount.php?change_pas" >
                <i class="fa fa-user"></i>
                Change Password</a>
            </li>
            <li class="<?php if(isset($_GET[delete])){echo "active";}?>">
                <a href="myacccount.php?delete" >
                <i class="fa fa-trash-o"></i>
                Delete Account</a>
            </li>
            <li class="<?php if(isset($_GET[logout])){echo "active";}?>">
                <a href='../../../ecom/logout.php'>
                <i class="fa fa-sign-out"></i>
                Logout</a>
            </li>
        </ul>
    </div>
</div>