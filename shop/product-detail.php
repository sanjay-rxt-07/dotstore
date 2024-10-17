<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['user_name']) && isset($_SESSION['user_mail'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dot-Store-Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

     <!-- Css Styles -->
     <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="../css/style.css">

    
    <style>

        .product-details,.breadcrumb-option{
            background: white;
        }

        .product-details,.breadcrumb-option{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<div id="preloder">
        <div class="loader"></div>
    </div>


<?php 
    include("../include/header.php");
    ?>

    
<?php 
if(isset($_GET['item'])){
    $product=$_GET['item'];
    $p_query="select * from products where id='$product'";
    $p_data=mysqli_query($con,$p_query);

    if($mrow=mysqli_fetch_assoc($p_data)){

?>

 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <?php
                        $p_cat=$mrow['category'];
                        $cat="select * from category where id='$p_cat'";
                        $get_cat=mysqli_query($con,$cat);
                        if($category=mysqli_fetch_assoc($get_cat)){

                          echo " <a href='#'>".$category['name']."</a>";
                        }
                        ?>
                        <span><?php echo $mrow['title'];?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <?php 
                            $image="select * from product_image where product='$product'";
                            $get_image=mysqli_query($con,$image);
                            $i=0;
                            while($img=mysqli_fetch_assoc($get_image)){
                                $i++;
                                if($i=1){
                                    echo "<a class='pt active' href='#product-".$img['id']."'>
                                <img src='../admin/".$img['name']."' alt=''>
                            </a>" ;
                                }
                                else{
                                    echo "<a class='pt' href='#product-".$img['id']."'>
                                <img src='../admin/".$img['name']."' alt=''>
                            </a>" ;
                                }
                               
                            }
                            ?>
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                            <?php 
                            $image="select * from product_image where product='$product'";
                            $get_image=mysqli_query($con,$image);
                            while($img=mysqli_fetch_assoc($get_image)){
                                echo "<img data-hash='product-".$img['id']."'' class='product__big__img' src='../admin/".$img['name']."' alt=''>";
                            }
                                ?>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3><?php echo $mrow['title'];?> <span>Brand: <?php echo $mrow['model'];?></span></h3>
                        <!-- <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>( 138 reviews )</span>
                        </div> -->
                        <div class="product__details__price"><i class="fa fa-inr"></i> <?php echo $mrow['price'];?> <span>MRP. <i class="fa fa-inr"></i> <?php echo $mrow['mrp'];?></span></div>
                        <p><?php echo $mrow['name'];?> Nemo enim ipsam voluptatem quia aspernatur aut odit aut loret fugit, sed quia consequuntur
                        magni lores eos qui ratione voluptatem sequi nesciunt.</p>
                        <div class="product__details__button">
                            <div class="quantity">

                            <form method="POST" enctype="multipart/form-data">
                                <span style="position: relative;bottom: 20px;">Quantity:</span>
                                <div class="pro-qty">
                                    <input type="number" name="quantity" value="1" min="1">
                                </div>
                            </div>
                            <button type="submit" name="cart" class="cart-btn" style="border:none;"><span class="icon_bag_alt"></span> Add to cart</button>
                            <!-- <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a> -->
                            <ul>
                                <!-- <li><a href="#"><span class="icon_heart_alt"></span></a></li> -->
                                <!-- <li><a href="#"><span class="icon_adjust-horiz"></span></a></li> -->
                            </ul>
                        </div>

                        <div class="product__details__widget">
                            <ul>
                                <!-- <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li> -->
                                <li>
                                    <span>Available color:</span>
                                    <div class="color__checkbox">
                                        <?php 
                                        $color="select * from product_color where product='$product'";
                                        $get_color=mysqli_query($con,$color);
                                        $num=0;
                                        while($row=mysqli_fetch_assoc($get_color)){
                                            $num++;
                                            $name = strtoUpper($row['name']);
                                            if($num==1){
                                             echo "<label for='".$name."'>
                                            <input type='radio' name='color'  value='".$name."' checked><br>".$name."  
                                        </label>";
                                    }else{
                                        echo "<label for='".$name."'>
                                        <input type='radio' name='color'  value='".$name."'><br>".$name."  
                                    </label>";
                                    }
                                            
                                            
                                        }
                                        ?>
                                        
                                    </div>
                                </li>
                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                    <?php 
                                        $size="select * from product_size where product='$product'";
                                        $get_size=mysqli_query($con,$size);
                                        $num=0;
                                        while($row=mysqli_fetch_assoc($get_size)){
                                            $num++;
                                            if($num==1){
                                             echo "<label for='xs-btn'>
                                            <input type='radio' value='".$row['name']."' name='size' checked><br>
                                            ".$row['name']."
                                        </label>"; 
                                            }else{
                                                echo "<label for='xs-btn'>
                                                <input type='radio' value='".$row['name']."' name='size'><br>
                                                ".$row['name']."
                                            </label>"; 
                                            }
                                        }
                                        ?>

                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                </form>

               


                <?php 
                if(isset($_POST['cart'])){
                    $quantity=$_POST['quantity'];
                    $color=$_POST['color'];
                    $size=$_POST['size'];
                    $user=$_SESSION['user_id'];

                    try {
                    $cart="insert into cart (product,user,quantity,color,size) value ('$product','$user','$quantity','$color','$size')";
                    $add_query = $con->query($cart);
                    if($cart==true){
                           ?>
                           <script>alert("product added to the cart.")</script>
                           <?php
                       }
                           
                       } catch (PDOException $e) {
                           echo "Error: " . $e->getMessage();
                       }
                }
                
                ?>

                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ( 2 )</a>
                            </li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <h6>Description</h6>
                                <?php echo $mrow['description'];?>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <h6>Specification</h6>
                                <?php echo $mrow['detail'];?>
                            </div>
                            <!-- <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <h6>Reviews ( 2 )</h6>
                                <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed
                                    quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt loret.
                                    Neque porro lorem quisquam est, qui dolorem ipsum quia dolor si. Nemo enim ipsam
                                    voluptatem quia voluptas sit aspernatur aut odit aut loret fugit, sed quia ipsu
                                    consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Nulla
                                consequat massa quis enim.</p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                    dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                    nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium
                                quis, sem.</p>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-1.jpg">
                            <div class="label new">New</div>
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Buttons tweed blazer</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-2.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-2.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Flowy striped skirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 49.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-3.jpg">
                            <div class="label stockout">out of stock</div>
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-3.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Cotton T-Shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/related/rp-4.jpg">
                            <ul class="product__hover">
                                <li><a href="img/product/related/rp-4.jpg" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Slim striped pocket shirt</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">$ 59.0</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->




<?php
    }



}
else{
    echo "product not found";
}
?>




<?php 
    include("../include/footer.php");
    ?>


</body>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    <script src="index.js"></script>
    <script>
  //TO NOT SEE RESUBMIT FORM NOTIFICATION
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>
<?php
}
else{
  header('location:../login');
}
?>  