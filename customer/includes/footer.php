<div id="footer"><!--- footer section top----->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>
                <ul>
                    <li><a href="../../../ecom/cart.php">shopping cart</a></li>
                    <li><a href="../../../ecom/contactus.php">Contact Us</a></li>
                    <li><a href="../../../ecom/shop.php">shop</a></li>
                    <li> <?php
          if(!isset($_SESSION['customer_email'])){
              echo "<a href='checkout.php'>My Account</a>";
          }else {
              echo "<a href='../../ecom/customer/myacccount.php?my_order'>My Account</a>";
          }
          ?></li>
                </ul>
              <hr class="hidden-md hidden-lg hidden-sm">
                <h4>USer Section</h4>
                <ul>
                    <li><a href="checkout.php">login</a></li>
                    <li><a href="../../../ecom/customer_registration.php">Register</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Top Product Categories</h4>
                <ul>
                    <?php
                    $get_p_cats="select * from product_categories";
                    $run_p_cats=mysqli_query($con,$get_p_cats);
                    while ($row_p_cat=mysqli_fetch_array($run_p_cats)){
                        $p_cat_id=$row_p_cat['p_cat_id'];
                        $p_cat_title=$row_p_cat['p_cat_title'];
                        echo "<li><a href='../../../ecom/shop.php?p_cat_id=$p_cat_id'>$p_cat_title</a></li>";
                    }
                    ?>
                </ul>
                <hr class="hidden-md hidden-sm hidden-lg">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Where to find Us</h4>
                <p>
                    <strong>E-commerce_new.Com</strong>
                    <br>H.H colony
                    <br>Ranchi
                    <br>jharkhand
                    <br>India
                    <br>priyeshsinha23@yahoo.com
                    <br>+91-9572556221
                </p>
                <a href="contact.php">Goto Contact Us page</a>
                <hr class="hidden-md hidden-sm hidden-lg">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Get the News</h4>
                <p class="text-muted">
                    Subcribe here to get news of something
                </p>
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" name="email" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" class="btn btn-danger" value="subscribe">
                        </span>
                    </div>
                </form>
                <hr class="hidden-md hidden-sm hidden-lg">
                <h4>stay in Touch</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-telegram"></i></a>
                </p>
            </div>
        </div>
    </div>
</div><!--- footer section top end----->


<!--- footer section copywrite section start----->
<div id="copywrite">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
            &copy;2020   -Priyesh Sinha
            </p><!--text moves to left-->
        </div>
         <div class="col-md-6">
            <p class="pull-right">
            Templete by Priyesh Sinha<a href="www.something.com">Click Here</a>
            </p><!--text moves to right-->
        </div>
    </div>
</div>




