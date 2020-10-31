<?php

session_start();//as it starts when someone logins

include("includes/db.php");
include("functions/functions.php");
?>




<?php
if(isset($_GET['c_id'])){
    $customer_id=$_GET['c_id'];
    $ip_add=getuserip();//to get product related database
    $status='pending';
    $invoice_no=mt_rand();
    $select_cart="select * from cart where ip_add='$ip_add' ";//as on local host so all ip address remains 1
    $run_cart=mysqli_query($con,$select_cart);
    while($row_cart=mysqli_fetch_array($run_cart)){
        $pro_id=$row_cart['p_id'];//all products related to this pro_id as its unique so only one product
        $pro_size=$row_cart['size'];
        $pro_qty=$row_cart['qty'];
        $pro_colour=$row_cart['colour'];
        
        
        $get_product="select * from products where product_id='$pro_id'";
        $run_product=mysqli_query($con,$get_product);
        while($row_product=mysqli_fetch_array($run_product)){
            $sub_total=$row_product['product_price'] * $pro_qty;
            
            $insert_customer_order="insert into customer_order 
            (customer_id,product_id,due_amount,invoice_number,qty,size,colour,order_date,order_status) values ('$customer_id','$pro_id','$sub_total','$invoice_no','$pro_qty','$pro_size','$pro_colour',NOW(),'$status')
            ";
            $run_customer_order=mysqli_query($con,$insert_customer_order);
            
            $insert_pending_order="insert into pending_order (customer_id,invoice_no,product_id,qty,size,colour,order_status) values ('$customer_id','$invoice_no','$pro_id','$pro_qty','$pro_size','$pro_colour','$status')";
            $run_pending_order=mysqli_query($con,$insert_pending_order);
            $delete_cart="delete from cart where ip_add='$ip_add' ";
            $run_del_cart=mysqli_query($con,$delete_cart);
            
            echo "<script>alert('Order has been Submitted ,We thank You')</script>";
            echo "<script>window.open('customer/myacccount.php?my_order','_self')</script>";
        }
    }
}
?>