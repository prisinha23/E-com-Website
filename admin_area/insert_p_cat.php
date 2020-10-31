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
                <li>Insert Product Categories</li>
            </ul>
        </div>
           <hr class="dotted short">
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
                                <input type="text" name="p_cat_title" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Product Category Description</label>
                            <div class="col-md-6">
                                <textarea type="text" name="p_cat_desc" class="form-control" required></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">
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
     </body>
</html>
<?php

if(isset($_POST['submit'])){
    $p_cat_title=$_POST['p_cat_title'];
    $p_cat_desc=$_POST['p_cat_desc'];
    

    $insert_p_cat="insert into product_categories (p_cat_title,p_cat_desc) values ('$p_cat_title','$p_cat_desc')";

    $run_p_cat=mysqli_query($con,$insert_p_cat);

    if($run_p_cat){
        echo "<script>alert('Product Category Has Been Inserted Successfully');</script>";
        echo "<script>window.open('admin.php?view_product_cat.php','_self')</script>";
    }

}

