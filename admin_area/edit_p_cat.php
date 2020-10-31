<?php
if(isset($_GET['edit_p_cat'])){
    $edit_id=$_GET['edit_p_cat'];
    $get_p="select * from product_categories where p_cat_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_p);
    $row_edit=mysqli_fetch_array($run_edit);
    $p_cat_id=$row_edit['p_cat_id'];
    $p_cat_title=$row_edit['p_cat_title'];
    $p_cat_desc=$row_edit['p_cat_desc'];
}
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Admin</title>
     <style type="text/css" href="styles/style.css"></style>
      <script>tinymce.init({selector:'textarea'});</script>
 </head>
<body>

<div id="content">
    <div class="container">
        
        <div class="box">
           <div class="col-md-12">
            <ul class="breadcrumb">
                <li>Admin Page</li>
                <li>Edit Product Categories</li>
            </ul>
        </div>
           <hr class="dotted short">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencils fa-w"></i>Edit Product Categories
                    </h3>
                </div>
                <center>
                <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i>Insert Product Categories
                    </h3>
                </div>
                
                
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label" >Product Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="p_cat_title" class="form-control" value="<?php echo $p_cat_title; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" name="p_cat_desc" class="form-control" value="<?php echo $p_cat_desc; ?>" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="update" value="Update Now" class="btn btn-primary form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </center>
            </div>
        </div>
        </div>




 </div>
</div>
     </body>
</html>


<?php

if(isset($_POST['update'])){
     $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];



    $update_p_cat="update product_categories set p_cat_title='$p_cat_title',p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'";

    $run_product=mysqli_query($con,$update_p_cat);

    if($run_product){
        echo "<script>alert('Product Category Updated Successfully');</script>";
        echo "<script>window.open('admin.php?view_product_cat','_self')</script>";
    }

}
?>






