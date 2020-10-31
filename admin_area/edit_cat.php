<?php
if(isset($_GET['edit_cat'])){
    $edit_id=$_GET['edit_cat'];
    $get_cat="select * from categories where cat_id='$edit_id'";
    $run_edit=mysqli_query($con,$get_cat);
    $row_edit=mysqli_fetch_array($run_edit);
    $cat_id=$row_edit['cat_id'];
    $cat_title=$row_edit['cat_title'];
    $cat_desc=$row_edit['cat_desc'];
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
                <li>Edit Categories</li>
            </ul>
        </div>
           <hr class="dotted short">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencils fa-w"></i>Edit Categories
                    </h3>
                </div>
                <center>
                <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i>Insert Categories
                    </h3>
                </div>
                
                
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label" >Category Title</label>
                            <div class="col-md-6">
                                <input type="text" name="cat_title" class="form-control" value="<?php echo $cat_title; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" name="cat_desc" class="form-control" value="<?php echo $cat_desc; ?>" required></textarea>
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
     $cat_title=$_POST['cat_title'];
    $cat_desc=$_POST['cat_desc'];



    $update_cat="update categories set cat_title='$cat_title',cat_desc='$cat_desc' where cat_id='$cat_id'";

    $run_product=mysqli_query($con,$update_cat);

    if($run_product){
        echo "<script>alert('Category Updated Successfully');</script>";
        echo "<script>window.open('admin.php?view_categories','_self')</script>";
    }

}
?>






