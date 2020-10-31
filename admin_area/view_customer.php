<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="">
                <i class="fa fa-dashboard"></i>Dashboard / Customers
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-list fa-fw"></i>View Customers
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Customer No:</th>
                                <th>Customer Name:</th>
                                <th>Customer Email:</th>
                                <th>Customer Image:</th>
                                <th>Customer Country:</th>
                                <th>Customer City:</th>
                                <th>Customer Contact:</th>
                                <th>Delete Customer</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=0;
                            $get_cats="select * from customers";
                            $run_cats=mysqli_query($con,$get_cats);
                            while($row_cats=mysqli_fetch_array($run_cats)){
                                $cat_id=$row_cats['customer_id'];
                                $cat_name=$row_cats['customer_name'];
                                $cat_email=$row_cats['customer_email'];
                                $cat_image=$row_cats['customer_image'];
                                $cat_country=$row_cats['customer_country'];
                                $cat_city=$row_cats['customer_city'];
                                $cat_contact=$row_cats['customer_contact'];
                                $i++;
                            ?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $cat_name ?></td>
                              <td><?php echo $cat_email ?></td>
                              <td><img src="../customer/customer_images/<?php echo $cat_image ?>" width="70" height="70"></td>
                              <td><?php echo $cat_country ?></td>
                              <td><?php echo $cat_city ?></td>
                              <td><?php echo $cat_contact ?></td>
                              <td>
                                  <a href="admin.php?delete_customer=<?php echo $cat_id ?>"><i class="fa fa-trash"></i>Delete</a>
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