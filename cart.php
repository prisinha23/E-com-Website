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
                <li>Shopping Cart</li>
            </ul>
        </div>
        
       <div class="col-md-9" id="cart">
           <div class="box">
               <form action="cart.php" method="post" enctype="multipart-form-data">
                   <h1>Shopping Cart</h1>
                   <?php
                   $ip_add=getuserip();
                   $select_cart="select * from cart where ip_add='$ip_add' ";
                   $run_cart=mysqli_query($con,$select_cart);
                   $count=mysqli_num_rows($run_cart);
                   ?>
                   <p class="text-muted">Currently you have <strong><?php echo $count ?></strong> item(s) in your Cart</p>
                   <div class="table-responsive">
                       <table class="table">
                           <thead>
                               <tr>
                                   <th colspan="2">product</th>
                                   <th>Quantity</th>
                                   <th>unit price</th>
                                   <th>size</th>
                                   <th>colour</th>
                                   <th colspan="1">Delete</th>
                                   <th colspan="1">sub total</th>
                               </tr>
                           </thead>
                           <tbody>
                              <?php
                               $total=0;
                               while($row=mysqli_fetch_array($run_cart))
                               {
                                   $pro_id=$row['p_id'];
                                   $pro_size=$row['size'];
                                   $pro_qty=$row['qty'];
                                   $pro_colour=$row['colour'];
                                   $get_product="select * from products where product_id='$pro_id' ";
                                   $run_pro=mysqli_query($con,$get_product);
                                   while($row_pro=mysqli_fetch_array($run_pro))
                                   {
                                       $p_title=$row_pro['product_title'];
                                       $p_img=$row_pro['product_img1'];
                                       $p_price=$row_pro['product_price'];
                                       $sub_total=$row_pro['product_price'] * $pro_qty;
                                       $total += $sub_total;
                               
                               ?>
                               <tr>
                                   <td><img src="admin_area/uploaded_images/<?php echo $p_img ?>"></td>
                                   <td><?php echo $p_title ?></td>
                                   <td><?php echo $pro_qty ?></td>
                                   <td><?php echo $p_price ?></td>
                                   <td><?php echo $pro_size ?></td>
                                   <td><?php echo $pro_colour ?></td>
                                   <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
                                   <td><?php echo $sub_total ?></td>
                               </tr>
                               <?php
                                     }
                                } 
                               ?>
                           </tbody>
                           
                           <tfoot>
                               <tr>
                                   <th colspan="6">Total</th>
                                   <th colspan="2"> INR <?php echo $total ?></th>
                               </tr>
                           </tfoot>
                           
                       </table>
                   </div>
                   
                   <div class="box-footer">
                       <div class="pull-left">
                           <a href="index.php" class="btn btn-default">
                               <i class="fa fa-chevron-left"></i>Continue Shopping
                           </a>
                       </div>
                       <div class="pull-right">
                           <button class="btn btn-default" type="submit" name="update" value="Update Cart">
                               <i class="fa fa-refresh">Update Cart</i>
                           </button>
                           <a href="checkout.php" class="btn btn-primary">Proceed To Checkout
                           <i class="fa fa-chevron-right"></i>
                           </a>
                       </div>
                   </div>
                   
                   
               </form>
           </div>
           
           <?php
           function update_cart(){
              global $db;
              if(isset($_POST['update'])){
                  foreach ($_POST['remove'] as $remove_id)
                  {
                      $delete_product="delete from cart where p_id='$remove_id' ";
                      $run_del=mysqli_query($db,$delete_product);
                      if($run_del){
                          echo "<script>alert('Updated Successfully')</script>";
                          echo "<script>window.open('cart.php','_self')</script>";
                      }
                  }
              }
            }
                                       
            update_cart();
           ?>
       </div>
        
          
          <div class="col-md-3">
              <div class="box" id="order-summary">
                  <div class="box-header">
                      <h3>Order Summary</h3>
                  </div>
                  <p class="text-muted">
                      Shipping and additional costs are calculated based on the values you have purchased
                  </p>
                  <div class="table-responsive">
                      <table class="table">
                          <tbody>
                              <tr>
                                  <td>Order Subtotal</td>
                                  <th>INR <?php echo $total ?></th>
                              </tr>
                              <tr>
                                  <td>Shipping and Handling</td>
                                  <td>INR <?php $shipping_charges=47; echo $shipping_charges;?></td>
                              </tr>
                              <tr>
                                  <td>TAX</td>
                                  <td>INR <?php $tax=$sub_total/20; echo $tax; ?></td>
                              </tr>
                              <tr class="total">
                                  <td>Total</td>
                                  <th>INR <?php echo $total+$tax+$shipping_charges; ?></th>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>  
              
                
                  
                    
                      
                        
                          
      
    
    
   </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
    
    
</body>
</html>