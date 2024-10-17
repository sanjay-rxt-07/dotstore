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
    <title>Dot-Store</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    
</head>
<body>
<div id="page" class="main">
    <?php 
    include("../include/header.php");
    ?>
      
     <main>
        <div class="top-main">
            <div class="flexitem" id="top-img">

               <div class="slider">
               <?php 
               $slider="select * from slider";
               $sliderdata=mysqli_query($con,$slider);
               while($row=mysqli_fetch_assoc($sliderdata)){
               ?>
                   <a href="<?php echo $row['url'];?>"><img class="slide" src="../admin/<?php echo $row['image'];?>" alt="img"></a>

                   <?php
               }
                   ?>
                   <button id="next" onclick="nxt()"><i class="ri-arrow-right-s-line" ></i></button>
                   <button id="previous" onclick="prv()"><i class="ri-arrow-left-s-line" ></i></button>
                </div>
            </div>
        </div>

<br>
<br>
        <div class="main-tranding">
            <h1>Newly Added</h1>
            <center><hr width="200px" color="blue"></center>
            <br>
            <div class="all-card">
    <?php

    $fetch_product = "SELECT * FROM products ORDER BY id DESC LIMIT 12";
    $product = mysqli_query($con, $fetch_product);

    while ($fetch_card = mysqli_fetch_array($product)) {
        $id= $fetch_card['id'];
        ?>
        <div class="card">
            <a href="product-detail.php?item=<?php echo $id; ?>">
                <img src="../admin/<?php 
                $image="select * from product_image where product=$id";
                $img=mysqli_query($con,$image);
                if($img=mysqli_fetch_assoc($img)){
                    echo $img['name'];
                }
                 ?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $id; ?>" id="add-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $fetch_card['title'] ?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $fetch_card['price'] ?></b></center>
                <br>
            </a>
        </div>
        <?php
    };
    ?>
</div>
            
        </div>

        <div class="main-tranding container mt-5 ">
        <h1>Shop By Category</h1>
            <center><hr width="200px" color="blue"></center>
            <br>
        <div class="row justify-content-centern category-box">

        <?php 
        $shopc="select * from category";
        $shopdata=mysqli_query($con,$shopc);
        while($row=mysqli_fetch_assoc($shopdata)){
        ?>
            <div class="col-12 col-md-4 d-flex category-section">
                <img src="../admin/<?php echo $row['image'];?>" class="img-fluid" alt="Image 1" height="300px">
                <p id="category-text"><?php echo $row['name'];?></p>
            </div>
            <?php 
        }
        ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


       
    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">Feature products</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $feature_prod_query="select * from products";
            $feature_prod=mysqli_query($con,$feature_prod_query);
            while($fetch_feat_prod=mysqli_fetch_array($feature_prod)){
                $id=$fetch_feat_prod['id'];
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
                    <button type="submit" name="productId" value="<?php echo $fetch_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $fetch_feat_prod['title']?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $fetch_feat_prod['price']?></b></center>
            </a>
            </div>    
               <?php
               }
               ?>
                
     
           </div>
           <center><br><hr width="250px" color="blue"></center><br>
         

        
        </div>
    </div>


    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">For Mens</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $feature_prod_query="select * from products";
            $feature_prod=mysqli_query($con,$feature_prod_query);
            while($fetch_feat_prod=mysqli_fetch_array($feature_prod)){
                $id=$fetch_feat_prod['id'];
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
                    <button type="submit" name="productId" value="<?php echo $fetch_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $fetch_feat_prod['title']?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $fetch_feat_prod['price']?></b></center>
            </a>
            </div>    
               <?php
               }
               ?>
                
     
           </div>
           <center><br><hr width="250px" color="blue"></center><br>
         

        
        </div>
    </div>

    <div class="main-fade">
        <?php 
         $slider2="select * from slider2";
         $slider2data=mysqli_query($con,$slider2);
         while($row=mysqli_fetch_assoc($slider2data)){

        ?>
        <div class="fade-img"><img src="../admin/<?php echo $row['image'];?>"></div>
		<div class="fade-scbar"></div>
		<div class="fade-text"><?php echo $row['name'];?></div>
        <?php 
         }
        ?>
        <button>Shop Now</button>
    </div>
  
    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">For Womens</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $feature_prod_query="select * from products";
            $feature_prod=mysqli_query($con,$feature_prod_query);
            while($fetch_feat_prod=mysqli_fetch_array($feature_prod)){
                $id=$fetch_feat_prod['id'];
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
                    <button type="submit" name="productId" value="<?php echo $fetch_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $fetch_feat_prod['title']?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $fetch_feat_prod['price']?></b></center>
            </a>
            </div>    
               <?php
               }
               ?>
                
     
           </div>
           <center><br><hr width="250px" color="blue"></center><br>
         

        
        </div>
    </div>


    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">For Everyone</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $feature_prod_query="select * from products";
            $feature_prod=mysqli_query($con,$feature_prod_query);
            while($fetch_feat_prod=mysqli_fetch_array($feature_prod)){
                $id=$fetch_feat_prod['id'];
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
                    <button type="submit" name="productId" value="<?php echo $fetch_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <center style="font-family:Montserrat, sans-serif;"><?php echo $fetch_feat_prod['title']?></center>
                <center style="font-family:Montserrat, sans-serif;"><b><i class="fa fa-inr"></i><?php echo $fetch_feat_prod['price']?></b></center>
            </a>
            </div>    
               <?php
               }
               ?>
                
     
           </div>
           <center><br><hr width="250px" color="blue"></center><br>
         

        
        </div>
    </div>



     </main>

    <?php 
    include("../include/footer.php");
    ?>
    
</div>


</body>
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