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
                <li>Insert Slider</li>
            </ul>
        </div>
           <hr class="dotted short">
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
                            <label class="col-md-3 control-label" >Slider Name:</label>
                            <div class="col-md-6">
                                <input type="text" name="slide_name" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Slide Image:</label>
                            <div class="col-md-6">
                                <input type="file" name="slide_image" class="form-control">
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
    $slide_name=$_POST['slide_name'];
    $slide_image=$_FILES['slide_image']['name'];
    $temp_name=$_FILES['slide_image']['tmp_name'];
    
    $view_slides="select * from slider";
    $vier_run_slides=mysqli_query($con,$view_slides);
    $count=mysqli_num_rows($vier_run_slides);
    
    if($count<4){
        move_uploaded_file($temp_name,"slides_images/$slide_image");
    

    $insert_slide="insert into slider (slider_name,slider_image) values ('$slide_name','$slide_image')";

    $run_cat=mysqli_query($con,$insert_slide);

        echo "<script>alert('New Slide Has Been Inserted Successfully');</script>";
        echo "<script>window.open('admin.php?view_slider','_self')</script>";
    }else {
        echo "<script>alert('Already 4 slides have been inserted');</script>";
    }

}

