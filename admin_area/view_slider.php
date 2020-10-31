<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="">
                <i class="fa fa-dashboard"></i>Dashboard / Slides
            </li>
        </ol>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-list fa-fw"></i>View Slider
                </h3>
            </div>
            
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Category Id</th>
                                <th>Category title</th>
                                <th>Category Description</th>
                                <th>Delete Category</th>
                                <th>Edit Category</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                            $i=0;
                            $get_slides="select * from slider";
                            $run_slides=mysqli_query($con,$get_slides);
                            while($row_slide=mysqli_fetch_array($run_slides)){
                                $slide_id=$row_slide['id'];
                                $slide_name=$row_slide['slider_name'];
                                $slide_image=$row_slide['slider_image'];
                                $i++;
                            ?>
                            <tr>
                              <td><?php echo $i ?></td>
                              <td><?php echo $slide_name ?></td>
                              <td><img src="slides_images/<?php echo $slide_image ?>" width="70" height="70"></td>
                              <td>
                                  <a href="admin.php?delete_slide=<?php echo $slide_id ?>"><i class="fa fa-trash"></i>Delete</a>
                              </td> 
                              <td>
                                  <a href="admin.php?edit_slide=<?php echo $slide_id ?>"><i class="fa fa-pencil"></i>Edit</a>
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