<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['user_name']) && isset($_SESSION['user_mail'])){
    $userid=$_SESSION['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dot-Store Your Cart</title>
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
        .shop-cart,.breadcrumb-option{
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



<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Shopping cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Shop Cart Section Begin -->
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cartq="select * from cart where user='$userid'";
                                $cart_data=mysqli_query($con,$cartq);
                                $sum=0;
                                while($cart=mysqli_fetch_assoc($cart_data)){
                                    $product=$cart['product'];
                                    $product_image=mysqli_query($con,"select * from product_image where product='$product'");
                                ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="../admin/<?php if($img=mysqli_fetch_assoc($product_image)){echo $img['name'];}?>" alt="" height="100px" width="100px">
                                        <div class="cart__product__item__title">
                                            <?php
                                    $product_detail=mysqli_query($con,"select * from products where id='$product'");
                                            if($detail=mysqli_fetch_assoc($product_detail)){
                                                echo "<h6>".$detail['title']."</h6>
                                                <div class='rating'>".$detail['model']."</div>";
                                            
                                            ?>
                                            
                                        </div>
                                    </td>
                                    <td class="cart__price"><i class="fa fa-inr"></i> <?php echo $detail['price'];?></td>
                                    <td class="cart__quantity">
                                        <div class="">
                                            <!-- <input type="text" value="1"> -->
                                             <h6><?php echo $cart['quantity'];?></h6>
                                        </div>
                                    </td>
                                    <form method="POST">
                                    <td class="cart__total"><i class="fa fa-inr"> </i> <?php echo $cart['quantity']*$detail['price'];?></td>
                                    <input type="text" name="cartid" value="<?php echo $cart['id'];?>" hidden>
                                    <td class="cart__close"><button style="border:none;" name="delete" type="submit"><span class="icon_close"></span></button></td>
                                </tr>
                                </form>
                                <?php
                                $sum+=$cart['quantity']*$detail['price'];
                                            }
                              }

                              if(isset($_POST['delete'])){
                                $id=$_POST['cartid'];
                                      try {
                                          $query = "DELETE FROM cart WHERE id = '$id'";
                                      
                                      $add_query = $con->query($query);
                                      
                                      if ($add_query == true) {
                                        //   echo "Form submitted successfully";
                                          ?>
                                          <script>window.location.href = window.location.href;</script>
                                          <?php
                                      }
                                  } catch (PDOException $e) {
                                      echo "Error: " . $e->getMessage();
                                  }
                              }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <!-- <div class="cart__btn">
                        <a href="#">Remove All</a>
                    </div> -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="index.php"><span class="icon_loading"></span> Continue Shopping</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="discount__content">
                        <!-- <h6>Discount codes</h6> -->
                        <form action="#">
                            <!-- <input type="text" placeholder="Enter your coupon code">
                            <button type="submit" class="site-btn">Apply</button> -->
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span><i class="fa fa-inr"></i> <?php echo $sum;?></span></li>
                            <li>Total <span><i class="fa fa-inr"></i> <?php echo $sum;?></span></li>
                        </ul>
                        <a href="checkout.php" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->








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