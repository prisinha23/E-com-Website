<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
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
<body>
<!-----header  start----->
<?php
include("includes/header.php");  
    
?>
<!-----header  end----->

<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="index.php">home</a></li>
                <li>shop</li>
            </ul>
        </div>
        
        <!----sidebar------->
        <div class="col-md-3">
            <?php 
            include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <?php
            if(!isset($_GET['p_cat_id'])){
                if(!isset($_GET['cat_id'])){
                    echo "<div class='box'>
                <h1>Shop</h1>
                <p>this place is to do shooping and other stuffs</p>
            </div>";
                    }
                }
            
            
            ?>
            <div class="row">
               
               <?php
                if(!isset($_GET['p_cat_id']))
                {
                    if(!isset($_GET['cat_id']))
                    {
                        $per_page=6;//per page display 6 products
                        if(isset($_GET['page'])){//page is created in pagination section to count number of pages
                            $page=$_GET['page'];
                        }else {
                            $page=1;//if not clicekd the page value is 1
                        }
                        $start_from=($page-1) * $per_page;//6 in one then page-2 so from 6onwards
                        $get_product="select * from products order by 1 DESC LIMIT $start_from,$per_page";//showing items from 0-5|6-12 etc..
                        $run_product=mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array($run_product)){
                            $pro_id=$row['product_id'];
                            $pro_title=$row['product_title'];
                            $pro_price=$row['product_price'];
                            $pro_img1=$row['product_img1'];
                             
                            
                            echo "
                            
                             <div class='col-md-4  col-sm-6 center responsive'><!----products images start---->
                                <div class='product box'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin_area/uploaded_images/$pro_img1' class='img-responsive'>
                        </a>
                            <h3>
                                <a href='details.php?pro_id=$pro_id'>$pro_title</a>
                            </h3>
                            <p class='price'>INR $pro_price</p>
                            <p class='buttons'>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                <a href='details.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                            </p>
                    </div>
                </div><!----products images end---->
                            
                            ";
                        }
               
                ?>
               
            </div>
            <center>
                <ul class="pagination">
                   <?php
                    
                    $query="select * from products";
                    $result=mysqli_query($con,$query);
                    $total_record=mysqli_num_rows($result);//number of rows in the table
                    $total_page=ceil($total_record / $per_page);//for 48 items dives in to 8pages as 6*8
                    echo "<li><a href='shop.php?page=1'>".'First Page'."</a></li>";
                    for($i=1;$i<=$total_page;$i++){
                        echo "<li><a href='shop.php?page=".$i."'>".$i."</a></li>";
                    }
                    echo "<li><a href='shop.php?page=$total_page'>".'last Page'."</a></li>";
                    }
                }
                
                    ?> 
                </ul>
            </center>
                <?php
                getpcatpro();
                getcatpro();
                ?>
        </div>
    </div>
</div>


<!-----footer  start----->
<?php
include("includes/footer.php");  
    
?>
<!-----footer  end----->
</body>
</html>