<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="">
                <i class="fa fa-dashboard"></i>Dashboard/ Product
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Products
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product title</th>
                                <th>Product Image</th>
                                <th>Product price</th>
                                <th>Product keyword</th>
                                <th>Product date</th>
                                <th>Product delete</th>
                                <th>Product edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=0;
                            $get_product="select * from products";
                            $run_product=mysqli_query($con,$get_product);
                            while($row_product=mysqli_fetch_array($run_product)){
                                $pro_id=$row_product['product_id'];
                                $pro_title=$row_product['product_title'];
                                $pro_img1=$row_product['product_img1'];
                                $pro_price=$row_product['product_price'];
                                $pro_keyword=$row_product['product_keyword'];
                                $date=$row_product['date'];
                                $i++;
                            ?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $pro_title ?></td>
                              <td><img src="product_images/<?php echo $pro_img1 ?>" width="50" height="60"></td>
                              <td><?php echo $pro_price ?></td>
                              <td><?php echo $pro_keyword ?></td>
                              <td><?php echo $date ?></td> 
                              <td>
                                  <a href="admin.php?delete_product=<?php echo $pro_id ?>"><i class="fa fa-trash"></i>Delete</a>
                              </td> 
                              <td>
                                  <a href="admin.php?edit_product=<?php echo $pro_id ?>"><i class="fa fa-pencil"></i>Edit</a>
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