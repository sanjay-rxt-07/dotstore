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

    <title>Dot-Store Checkout</title>
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

        .checkout,.breadcrumb-option{
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
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <!-- <div class="row">
                <div class="col-lg-12">
                    <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
                </div>
            </div> -->
            <form method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="f_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="l_name" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" name="country" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" placeholder="Street Address" name="address" required>
                                    <input type="text" placeholder="Apartment. suite, unite ect ( optinal )">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" name="city" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>State <span>*</span></p>
                                    <input type="text" name="state" required>
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" name="pin" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Mobile <span>*</span></p>
                                    <input type="text" name="mobile" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" name="mail" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                    <div class="checkout__form__input">
                                        <p>Account Password <span>*</span></p>
                                        <input type="text">
                                    </div>
                                    <div class="checkout__form__input">
                                        <p>Order notes <span></span></p>
                                        <input type="text"
                                        placeholder="Note about your order, e.g, surprise special delivery" name="order_notes">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout__order">
                                <h5>Your order</h5>
                                
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Product</span>
                                            <span class="top__text__right">Total</span>
                                        </li>
                                        <?php
                                 $cartq="select * from cart where user='$userid'";
                                 $cart_data=mysqli_query($con,$cartq);
                                 $sum=0;
                                 $i=1;
                                 while($cart=mysqli_fetch_assoc($cart_data)){
                                     $product=$cart['product'];
                                     $product_detail=mysqli_query($con,"select * from products where id='$product'");
                                 if($p_detail=mysqli_fetch_assoc($product_detail)){
                                    echo "<li>0.".$i." ".$p_detail['title']." <span><i class='fa fa-inr'></i> ".$p_detail['price'].".0 X ".$cart['quantity']."</span></li>";
                                        $i++;
                                        $sum+=$p_detail['price']*$cart['quantity'];
                                    }
                                     }?>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Subtotal <span><i class='fa fa-inr'></i> <?php echo $sum;?>.0</span></li>
                                        <li>Total <span><i class='fa fa-inr'></i> <?php echo $sum;?>.0</span></li>
                                    </ul>
                                </div>
                                <button type="submit" name="order" class="site-btn">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->
        <?php
if (isset($_POST['order'])) {

    // Retrieve form data
    $f_name = mysqli_real_escape_string($con, $_POST['f_name']);
    $l_name = mysqli_real_escape_string($con, $_POST['l_name']);
    $country = mysqli_real_escape_string($con, $_POST['country']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $pin = mysqli_real_escape_string($con, $_POST['pin']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $email = mysqli_real_escape_string($con, $_POST['mail']);
    $order_notes = mysqli_real_escape_string($con, $_POST['order_notes']);
    
    // Fetch total amount from cart
    $cartq = "SELECT * FROM cart WHERE user = '$userid'";
    $cart_data = mysqli_query($con, $cartq);
    $sum = 0;

    while ($cart = mysqli_fetch_assoc($cart_data)) {
        $product = $cart['product'];
        $product_detail = mysqli_query($con, "SELECT * FROM products WHERE id = '$product'");
        
        if ($p_detail = mysqli_fetch_assoc($product_detail)) {
            $sum += $p_detail['price'] * $cart['quantity'];
        }
    }

    // Insert into orders table
    $insert_order = "INSERT INTO orders (user_id, first_name, last_name, country, address, city, state, postcode, mobile, email, total_amount, order_notes) 
                     VALUES ('$userid', '$f_name', '$l_name', '$country', '$address', '$city', '$state', '$pin', '$mobile', '$email', '$sum', '$order_notes')";

    if (mysqli_query($con, $insert_order)) {
        $order_id = mysqli_insert_id($con);  // Get the last inserted order ID

        // Insert each item from the cart into order_items table
        $cart_data = mysqli_query($con, $cartq);  // Re-fetch cart data
        
        while ($cart = mysqli_fetch_assoc($cart_data)) {
            $product = $cart['product'];
            $quantity = $cart['quantity'];
            $color = $cart['color'];
            $size = $cart['size'];

            $product_detail = mysqli_query($con, "SELECT * FROM products WHERE id = '$product'");

            if ($p_detail = mysqli_fetch_assoc($product_detail)) {
                $price = $p_detail['price'];
                $insert_item = "INSERT INTO order_items (order_id, product_id, quantity, price, color, size) 
                                VALUES ('$order_id', '$product', '$quantity', '$price', '$color', '$size')";
                mysqli_query($con, $insert_item);
            }
        }

        // Clear the cart after successful order placement
        mysqli_query($con, "DELETE FROM cart WHERE user = '$userid'");

        echo "<script>alert('Order placed successfully!')</script>";
    } else {
        echo "Error placing order: " . mysqli_error($con);
    }
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