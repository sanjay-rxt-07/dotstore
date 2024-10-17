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

<div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">your search</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php

            if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $search_data = mysqli_query($con, "SELECT * FROM products WHERE title LIKE '%$search%'");

    while($s_data=mysqli_fetch_array($search_data)){
                $id=$s_data['id'];
            ?>
                <div class="feature-card">
            <a href="product-detail.php?item=<?php echo $id?>">
                <img src="../admin/<?php 
                $image="select * from product_image where product=$id";
                $img=mysqli_query($con,$image);
                if($img=mysqli_fetch_assoc($img)){
                    echo $img['name'];
                }
                 ?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $s_data['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $s_data['title']?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $s_data['price']?></b></center>
            </a>
            </div>    
               <?php
               }
            }
        

elseif (isset($_GET['searchCate'])) {
$search = $_GET['searchCate'];
$search_data = mysqli_query($con, "SELECT * FROM products WHERE category='$search'");

while($s_data=mysqli_fetch_array($search_data)){
    $id=$s_data['id'];
?>
    <div class="feature-card">
<a href="product-detail.php?item=<?php echo $id?>">
    <img src="../admin/<?php 
    $image="select * from product_image where product=$id";
    $img=mysqli_query($con,$image);
    if($img=mysqli_fetch_assoc($img)){
        echo $img['name'];
    }
     ?>" alt="">
    <form action="" method="POST">
        <button type="submit" name="productId" value="<?php echo $s_data['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
    </form>
    <center style="font-family:Montserrat, sans-serif;"><?php echo $s_data['title']?></center>
    <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $s_data['price']?></b></center>
</a>
</div>    
   <?php
   }
}
elseif (isset($_GET['searchCate2'])) {
    $search = $_GET['searchCate2'];
    $search_data = mysqli_query($con, "SELECT * FROM products WHERE subcategory='$search'");
    
    while($s_data=mysqli_fetch_array($search_data)){
        $id=$s_data['id'];
    ?>
        <div class="feature-card">
    <a href="product-detail.php?item=<?php echo $id?>">
        <img src="../admin/<?php 
        $image="select * from product_image where product=$id";
        $img=mysqli_query($con,$image);
        if($img=mysqli_fetch_assoc($img)){
            echo $img['name'];
        }
         ?>" alt="">
        <form action="" method="POST">
            <button type="submit" name="productId" value="<?php echo $s_data['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
        </form>
        <center style="font-family:Montserrat, sans-serif;"><?php echo $s_data['title']?></center>
        <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $s_data['price']?></b></center>
    </a>
    </div>    
       <?php
       }
    }
    elseif (isset($_GET['searchCate3'])) {
        $search = $_GET['searchCate3'];
        $search_data = mysqli_query($con, "SELECT * FROM products WHERE 2subcategory='$search'");
        
        while($s_data=mysqli_fetch_array($search_data)){
            $id=$s_data['id'];
        ?>
            <div class="feature-card">
        <a href="product-detail.php?item=<?php echo $id?>">
            <img src="../admin/<?php 
            $image="select * from product_image where product=$id";
            $img=mysqli_query($con,$image);
            if($img=mysqli_fetch_assoc($img)){
                echo $img['name'];
            }
             ?>" alt="">
            <form action="" method="POST">
                <button type="submit" name="productId" value="<?php echo $s_data['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
            </form>
            <center style="font-family:Montserrat, sans-serif;"><?php echo $s_data['title']?></center>
            <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $s_data['price']?></b></center>
        </a>
        </div>    
           <?php
           }
        }
        else{
            echo "Product not found.";
        }
   ?>

           </div>
           <center><br><hr width="250px" color="blue"></center><br>
         

        
        </div>
    </div>


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