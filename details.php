<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<?php

if(isset($_GET['pro_id'])){//we are sending pro-id for identification
    $pro_id=$_GET['pro_id'];
    $get_products="select * from products where product_id='$pro_id' ";
    $run_products=mysqli_query($con,$get_products);
    $row_products=mysqli_fetch_array($run_products);
    $p_cat_id=$row_products['p_cat_id'];
    $p_title=$row_products['product_title'];
    $p_price=$row_products['product_price'];
    $p_desc=$row_products['product_desc'];
    $p_img1=$row_products['product_img1'];
    $p_img2=$row_products['product_img2'];
    $p_img3=$row_products['product_img3'];
    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id' ";
    $run_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_id=$row_p_cat['p_cat_id'];
    $p_cat_title=$row_p_cat['p_cat_title'];
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!------all bootstrap from w3school---------->
    <meta charset="UTF-8">
    <title>E-Commerce Store</title>
    
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body bgcolor="#fff">
    
<!-----header  start----->
<?php
include("includes/header.php");  
    
?>
<!-----header  end----->
   <!----sidebar------->
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">home</a></li>
                <li>shop</li>
                <li> <a href="shop.php?p_cat=<?php
                    echo $p_cat_id;
                    ?>"><?php
                    echo $p_cat_title;
                    ?></a></li>
                    <li><?php
                        echo $p_title ;
                        ?></li>
            </ul>
        </div>
        
        <!----sidebar------->
        <div class="col-md-3">
            <?php 
            include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
<div class="row" id="productmain">
    <div class="col-sm-6">
      <div class="mySlides fade">
    <img src="admin_area/uploaded_images/<?php
                        echo $p_img1 ;
                        ?>" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="admin_area/uploaded_images/<?php
                        echo $p_img2 ;
                        ?>" style="width:100%">
  </div>

  <div class="mySlides fade">
    <img src="admin_area/uploaded_images/<?php
                        echo $p_img3 ;
                        ?>" style="width:100%">
  </div>

  <!-- Next and previous buttons -->
  <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  </div>
    </div>
    <div class="col-sm-6">
        <div class="box">
            <h1 class="text-center"><?php
                        echo $p_title ;
                        ?></h1>
            <?php
            addcart();
            ?>
            <form action="details.php?add_cart=<?php
                        echo $pro_id ;
                        ?>" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="col-md-5 control-label">Product Quantity</label>
                    <div class="col-md-7">
                        <select name="product_qty" class="form-control">
                            <option>Select a Quantity</option>
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-5 control-label">Size</label>
                    <div class="col-md-7">
                        <select name="product_size" class="form-control">
                            <option>Select a Size</option>
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-5 control-label">Colour</label>
                    <div class="col-md-7">
                        <select name="product_colour" class="form-control">
                            <option>Select a Colour</option>
                            <option>Black</option>
                            <option>Green</option>
                            <option>Red</option>
                            <option>Blue</option>
                            <option>White</option>
                            <option>Orange</option>
                        </select>
                    </div>
                </div>
                
                
                <p class="price" style="text-align:center">INR <?php
                        echo $p_price ;
                        ?></p>
                <p class="text-center buttons">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa fa-shopping-cart"></i>Add to Cart
                    </button>
                </p>
                
            </form>
        </div>
        
        
        
        <div class="col-xs-4">
            <a href="#" class="thumb">
                <img src="admin_area/uploaded_images/<?php
                        echo $p_img1 ;
                        ?>" class="img-responsive">
            </a>
        </div>
        <div class="col-xs-4">
            <a href="#" class="thumb">
                <img src="admin_area/uploaded_images/<?php
                        echo $p_img2 ;
                        ?>" class="img-responsive">
            </a>
        </div>
        <div class="col-xs-4">
            <a href="#" class="thumb">
                <img src="admin_area/uploaded_images/<?php
                        echo $p_img3 ;
                        ?>" class="img-responsive">
            </a>
        </div>
    </div>
    
</div>

<div class="box" id="details">
    <h4>Product Details</h4>
    <p><?php
        echo $p_desc ;
        ?>
    </p>
    <h4>Size</h4>
    <ul>
        <li>Small</li>
        <li>Medium</li>
        <li>Large</li>
        <li>Xtra Large</li>
    </ul>
</div>

<div id="row same-height-row">
    <div class="col-md-3 col-sm-6">
        <div class="box same-height-headline">
            <h3 class="text-center">You also like these products</h3>
        </div>
    </div>
    
    <?php
    
    $get_product="select * from products order by 1 LIMIT 0,3";
    $run_product=mysqli_query($con,$get_product);
    while($row=mysqli_fetch_array($run_product)){
        $pro_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_price=$row['product_price'];
        $product_img1=$row['product_img1'];
        
        echo "
        <div class='center-responsive col-md-3'>
        <div class='product same-height'>
            <a href='details.php?pro_id=$pro_id'>
                <img src='admin_area/product_images/$product_img1' class='img-responsive'>
            </a>
                <h3><a href='details.php?pro_id=$pro_id'>$product_title</a></h3>
                <p class='price'>INR $product_price</p>
        </div>
    </div>
        
        ";
    }
    
    ?>
    
 </div>


 </div>
        
    </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
<script>
    
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>