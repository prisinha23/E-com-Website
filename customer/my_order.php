<?php

$con=mysqli_connect("localhost","root","","ecom");/*connect("hostname","root is by default name","password of database","name of database")*/

?>
 

 <div class="box">
  <center>
    <h1>My Order</h1>
    <p>feel free to <a href="../contactus.php">contact</a> us any time</p>
  </center>
  <hr>
  <div class="table-responsive">
      <table class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th>Sr No.</th>
                  <th>Due Amount</th>
                  <th>Invoice Number</th>
                  <th>Quantity</th>
                  <th>Size </th>
                  <th>colour </th>
                  <th>Order Date</th>
                  <th>Paid/Unpaid</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
             
             <?php
              
              $customer_session=$_SESSION['customer_email'];
              $get_customer="select * from customers where customer_email='$customer_session' ";
              $run_cust=mysqli_query($con,$get_customer);
              $row_customer=mysqli_fetch_array($run_cust);
              $customer_id=$row_customer['customer_id'];
              $get_order="select * from customer_order where customer_id='$customer_id' ";
              $run_order=mysqli_query($con,$get_order);
              $i=1;
              while($row_order=mysqli_fetch_array($run_order)){
                  $order_id=$row_order['order_id'];
                  $due_amount=$row_order['due_amount'];
                  $invoice_no=$row_order['invoice_number'];
                  $qty=$row_order['qty'];
                  $size=$row_order['size'];
                  $colour=$row_order['colour'];
                  $order_date=substr($row_order['order_date'], 0,11);
                  $order_status=$row_order['order_status'];
                  $i++;
                  if($order_status=='pending'){
                      $order_status="unpaid";
                  }else {
                      $order_status="paid";
                  }
              
             ?>
              <tr>
                  <td><?php echo $i ?></td>
                  <td>INR <?php echo $due_amount ?></td>
                  <td><?php echo $invoice_no ?></td>
                  <td><?php echo $qty ?></td>
                  <td><?php echo $size ?></td>
                  <td><?php echo $colour ?></td>
                  <td><?php echo $order_date ?></td>
                  <td><?php echo $order_status ?></td>
                  <td><a href="confirm.php?order_id=<?php echo $order_id?>" target="_blank" class="btn btn-primary btn-sm">Confirm if paid</a></td>
              </tr>
              <?php } ?>
          </tbody>
          
      </table>
      
  </div>
</div>