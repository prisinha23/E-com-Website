<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="">
                <i class="fa fa-dashboard"></i>Dashboard / Admins
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i>View Admins
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Admin Id</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                                <th>Admin Image</th>
                                <th>Admin Contact</th>
                                <th>Admin Country</th>
                                <th>Admin Job</th>
                                <th>Admin About</th>
                                <th>Delete Admin</th>
                                <th>Edit Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=0;
                            $get_order="select * from admins";
                            $run_order=mysqli_query($con,$get_order);
                            while($row_order=mysqli_fetch_array($run_order)){
                                $admin_id=$row_order['admin_id'];
                                $admin_name=$row_order['admin_name'];
                                $admin_email=$row_order['admin_email'];
                                $admin_country=$row_order['admin_country'];
                                $admin_job=$row_order['admin_job'];
                                $admin_contact=$row_order['admin_contact'];
                                $admin_about=$row_order['admin_about'];
                                $admin_image=$row_order['admin_image'];
                                $i++;
                            ?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $admin_name ?></td>  
                              <td><?php echo $admin_email ?></td>
                              <td><img src="admin_images/<?php echo $admin_image ?>" width="70" height="70"></td>
                              <td><?php echo $admin_contact ?></td> 
                              <td><?php echo $admin_country ?></td>
                              <td><?php echo $admin_job ?></td>
                              <td><?php echo $admin_about ?></td>
                              <td>
                                  <a href="admin.php?user_delete=<?php echo $admin_id; ?>"><i class="fa fa-trash"></i>Delete</a>
                              </td>
                              <td>
                                  <a href="admin.php?edit_profile=<?php echo $admin_id; ?>"><i class="fa fa-pencil"></i>Edit</a>
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