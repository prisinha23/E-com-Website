
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
        <ul class="breadcrumb" style="background:transparent">
            <li class="activer">
                <i class="fa fa-dashboard"></i>Dashboard
            </li>
        </ul>
    </div>
</div>
 <!----product ------>

<div class="row">
    <div class="col-lg-3 col-md-6" style="box-sizing: border-box;
width: 100%;
border: solid #000033 5px;
padding: 2px;">
        <div class="panel panel-blue">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_pro ?></div><!--number of products-->
                        <div>Products</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_product">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
     <!--customers------>
    <div class="col-lg-3 col-md-6" style="box-sizing: border-box;
width: 100%;
border: solid #000033 5px;
padding: 5px;">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_cust ?></div>
                            <div>Customers</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_customer">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
    <!----product categories------>
    <div class="col-lg-3 col-md-6" style="box-sizing: border-box;
width: 100%;
border: solid #000033 5px;
padding: 5px;">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_p_cat ?></div>
                            <div>Product Categories</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_product_cat">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div><br><br>
    
      <!----orders------>
       <div class="col-lg-3 col-md-6" style="box-sizing: border-box;
width: 100%;
border: solid #000033 5px;
padding: 5px;">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_order ?></div>
                            <div>Orders</div>
                    </div>
                </div>
            </div>
            <a href="admin.php?view_order">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>New Order
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered tabel-hover table-striped">
                        <thead>
                            <tr>
                                <th>Order No:</th>
                                <th>Customer Email:</th>
                                <th>Invoice No:</th>
                                <th>Product Id:</th>
                                <th>Total:</th>
                                <th>Date:</th>
                                <th>Status:</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                           
                           <?php
                            
                            $i=0;
                                
                            $get_order="select * from customer_order order by 1 DESC LIMIT 0,5";
                            $run_order=mysqli_query($con,$get_order);
                            while ($row_order=mysqli_fetch_array($run_order)){
                                $order_id=$row_order['order_id'];
                                $customer_id=$row_order['customer_id'];
                                $product_id=$row_order['product_id'];
                                $invoice_no=$row_order['invoice_number'];
                                $qty=$row_order['qty'];
                                $date=$row_order['order_date'];
                                $order_status=$row_order['order_status'];
                                $i++;
                                
                           ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php
                                    $get_cust="select * from customers where customer_id='$customer_id'";
                                    $run_cust=mysqli_query($con,$get_cust);
                                    $row_cust=mysqli_fetch_array($run_cust);
                                    $customer_email=$row_cust['customer_email'];
                                    echo $customer_email ;
                                    ?></td>
                                <td><?php echo $invoice_no ?></td>
                                <td><?php echo $product_id ?></td>
                                <td><?php echo $qty ?></td>
                                <td><?php echo $date ?></td>
                                <td><?php echo $order_status ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="admin.php?view_orders">View All Orders
                    <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <div class="col-md-4">
        <div class="panel">
          <?php
           $get_order="select * from admins";
                            $run_order=mysqli_query($con,$get_order);
                            $row_order=mysqli_fetch_array($run_order);
                                $admin_id=$row_order['admin_id'];
                                $admin_name=$row_order['admin_name'];
                                $admin_email=$row_order['admin_email'];
                                $admin_country=$row_order['admin_country'];
                                $admin_job=$row_order['admin_job'];
                                $admin_contact=$row_order['admin_contact'];
                                $admin_about=$row_order['admin_about'];
                                $admin_image=$row_order['admin_image'];
                                ?>
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_images/<?php echo $admin_image ?>" class="img-responsive" style="border: 1px solid #ddd;
  border-radius: 3px;
  padding: 2px;
  width: 200px;
  border-radius: 60%;">
                    <div class="thumb-info-title">
                        <button class="btn btn-primary"><?php echo $admin_name ?></button>
                        <br>
                        <button class="btn btn-info"><?php echo $admin_job ?></button>
                    </div>
                </div>
                
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-envelope"></i><span>Email:</span><?php echo $admin_email ?><br>
                        <i class="fa fa-flag"></i><span>Country:</span><?php echo $admin_country ?><br>
                        <i class="fa fa-phone"></i><span>Contact:</span><?php echo $admin_contact ?><br>
                    </div>
                    <hr class="dotted short">
                    <h5 class="text-muted">About</h5>
                    <p><?php echo $admin_about ?></p>
                </div>
            </div>
        </div>
    </div>
</div>















<style>
    .huge{
        font-size: 40px;
        line-height: normal;
    }
    .panel-blue >.panel-heading{
        color: #fff;
        background-color: dodgerblue;
    }
    .panel-blue >a{
        color: dodgerblue;
    }
    .panel-green > .panel-heading{
        color: #fff;
        background-color: #5cd85c;
    }
    .panel-green > a{
        color: #5cd85c;
    }
    .panel-red >.panel-heading{
        color: #fff;
        background-color: #d9534f;
    }
    .panel-red >a{
        color: #d9534f;
    }
    .panel-yellow >.panel-heading{
        color: #fff;
        background-color: #f0ad4e;
    }
    .panel-yellow >a{
        color: #f0ad4e;
    }
    
</style>
