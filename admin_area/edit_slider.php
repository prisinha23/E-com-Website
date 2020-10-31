<?php
if(isset($_GET['edit_slide'])){
    $edit_id=$_GET['edit_slide'];
    $get_cat="select * from slider where id='$edit_id'";
    $run_edit=mysqli_query($con,$get_cat);
    $row_edit=mysqli_fetch_array($run_edit);
    $id=$row_edit['id'];
    $slide_name=$row_edit['slider_name'];
    $slide_image=$row_edit['slider_image'];
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
                <li>Edit Slider</li>
            </ul>
        </div>
           <hr class="dotted short">
            <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-pencils fa-w"></i>Edit Slider
                    </h3>
                </div>
                <center>
                <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-w"></i>Insert Slider
                    </h3>
                </div>
                
                
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label" >Slider Name</label>
                            <div class="col-md-6">
                                <input type="text" name="slider_name" class="form-control" value="<?php echo $slide_name; ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slider Image</label>
                            <div class="col-md-6">
                                <input type="file" name="slider_image" class="form-control">
                                <br>
                                <img src="slides_images/<?php echo $slide_image; ?>" width="70" height="70">
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
     $slide_name=$_POST['slider_name'];
    $slide_image=$_FILES['slider_image']['name'];
    $temp_name=$_FILES['slider_image']['tmp_name'];
    
    move_uploaded_file($temp_name,"slides_images/$slide_image");



    $update_cat="update slider set slider_name='$slide_name',slider_image='$slide_image' where id='$id'";

    $run_product=mysqli_query($con,$update_cat);

    if($run_product){
        echo "<script>alert('Slider Updated Successfully');</script>";
        echo "<script>window.open('admin.php?view_slider','_self')</script>";
    }

}
?>






