<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="">
                <i class="fa fa-dashboard"></i>Dashboard / Payments
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Payments
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Payment No</th>
                                <th>Invoive Number</th>
                                <th>Amount Paid</th>
                                <th>Payment Method</th>
                                <th>Reference No</th>
                                <th>Payment Date</th>
                                <th>Delete Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=0;
                            $get_order="select * from payments";
                            $run_order=mysqli_query($con,$get_order);
                            while($row_order=mysqli_fetch_array($run_order)){
                                $payment_id=$row_order['payment_id'];
                                $invoice_no=$row_order['invoice_id'];
                                $amount=$row_order['amount'];
                                $payment_mode=$row_order['payment_mode'];
                                $ref_no=$row_order['ref_no'];
                                $payment_date=$row_order['payment_date'];
        
                                
                                $i++;
                            ?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $invoice_no ?></td>  
                              <td><?php echo $amount ?></td>
                              <td><?php echo $payment_mode ?></td> 
                              <td><?php echo $ref_no ?></td>
                              <td><?php echo $payment_date ?></td>
                              <td>
                                  <a href="admin.php?payment_delete=<?php echo $payment_id ?>"><i class="fa fa-trash"></i>Delete</a>
                              </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>