<?php
session_start();
if(isset($_SESSION['user_name']) && isset($_SESSION['user_mail'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dot-Store</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script rel="text/javascript" src="home.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div id="page" class="main">
     <header id="header">
        <div class="top-header">
           <div class="container">
               <div class="wrapper flexitem">
                   
                 <div class="left">
                <ul class="flexitem">
                    <li><a href="#">blog</a></li>
                    <li><a href="#">feature product</a></li>
                    <li><a href="#">wish list</a></li>
                </ul>
                 </div>

                 <div class="right">
                    <ul class="flexitem">
                    <li><a href="#"><i class="bx bxs-user-circle"></i><?php
                         echo $_SESSION['user_name'];
                         ?></a></li>
                         <!-- <li><a href="#">
                            <?php //  echo $_SESSION['user_mail'];?>
                         </a></li> -->
                        <!-- <li><a href="#">my account</a></li> -->
                        <li><a href="track_order.php">Track oreder</a></li>
                        <li><a href="feedback.php" target="_blank">FAQ</a></li>
                        <li><a href="logout.php" id="logout-btn">Logout</a></li>
                            <!-- <li><a href="">english<span class="icon-small"><i class="ri-arrow-down-s-line"></i></span></a>
                                <ul>
                                    <li class="current"><a href="">hindi</a></li>
                                    <li><a href="">spanish</a></li>
                                    <li><a href="">urdu</a></li>
                                </ul>
                                </li>     -->
                    </ul>
                 </div>
              </div>
        
              </div>  

        </div>
        <div class="mid-header">
            <div class="container">
                <div class="flexitem">
                    <a href="#" class="trigger desktop-hide" id="menu-btn"><span class="ri-menu-2-line"></span></a>
                  <div class="left flexitem">
                    <div class="logo"><a href="index.php"><span class="circle"></span>.Store</a></div>
                    <nav class="nav-bar" >
                        <ul class="flexitem">
                         
                            <li class="all"><a href="#">All<i class="ri-arrow-down-s-line"></i></a>
                                <div class="all-item">
                                    <ul id="main-ul">
                                    <li id="mens"><a href="search.php?search=men">Mens</a><i class="ri-arrow-right-s-line"></i>
                                     <ul id="mens-item">
                                        <li><a href="search.php?search=glass">Glasses</a></li>
                                        <li><a href="search.php?search=shirt">Shirt</a></li>
                                        <li id="shoes"><a href="search.php?search=shoe">Shoes</a><i class="ri-arrow-right-s-line"></i>
                                         <ul id="shoes-item">
                                            <li><a href="search.php?search=shoe">Sport Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Casual Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Sneakers Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Loafer Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Moccasin Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Hiking Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Boot Shoes</a></li>
                                         </ul>
                                       </li>
                                        <li><a href="search.php?search=jeans">Jeans</a></li>
                                        <li><a href="search.php?search=t-shirt">T-shirt</a></li>
                                        <li><a href="search.php?search=facewash">Face wash</a></li>
                                     </ul>
                                   </li>
                                    <li id="womens"><a href="search.php?search=women">Womens</a><i class="ri-arrow-right-s-line"></i>
                                    <ul id="womens-item">
                                        <li><a href="search.php?search=glasses">Glasses</a></li>
                                        <li><a href="search.php?search=suit">suit</a></li>
                                        <li id="shoes"><a href="search.php?search=shoe">Shoes</a><i class="ri-arrow-right-s-line"></i>
                                         <ul id="shoes-item">
                                            <li><a href="search.php?search=shoe">Sport Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Casual Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Sneakers Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Loafer Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Moccasin Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Hiking Shoes</a></li>
                                            <li><a href="search.php?search=shoe">Boot Shoes</a></li>
                                         </ul>
                                       </li>
                                        <li><a href="search.php?search=jeans">Jeans</a></li>
                                        <li><a href="search.php?search=tshirt">T-shirt</a></li>
                                        <li><a href="search.php?search=beauty">Beauty</a></li>
                                    </ul>
                                   </li>
                                    <li id="beauty"><a href="search.php?search=beauty">Beauty</a><i class="ri-arrow-right-s-line"></i>
                                        <ul id="beauty-item">
                                        <li><a href="search.php?search=care">Bath & Oral Care</a></li>
                                        <li><a href="search.php?search=eye">Eye Makeup</a></li>
                                        <li><a href="search.php?search=face">Face Makeup</a></li>
                                        <li><a href="search.php?search=lip">Lip Makeup</a></li>
                                        <li><a href="search.php?search=hair">Hair Care</a></li>
                                        <li><a href="search.php?search=cream">Creams</a></li>
                                        </ul>
                                    
                                    </li>
                                    <li><a href="search.php?search=laptop">Laptops</a></li>
                                    <li id="mobiles"><a href="search.php?search=mobile">Mobiles</a><i class="ri-arrow-right-s-line"></i>
                                    <ul id="mobiles-item">
                                        <li><a href="search.php?search=mobile">Apple</a></li>
                                        <li><a href="search.php?search=mobile">Samsung</a></li>
                                        <li><a href="search.php?search=mobile">Oneplus</a></li>
                                        <li><a href="search.php?search=mobile">Mi</a></li>
                                        <li><a href="search.php?search=mobile">Iqoo</a></li>
                                        <li><a href="search.php?search=mobile">Realme</a></li>
                                    </ul>
                                   </li>
                                    <li id="electronics"><a href="search.php?search=electronics">Electronics</a><i class="ri-arrow-right-s-line"></i>
                                    <ul id="electronics-item">
                                        <li><a href="search.php?search=camera">Cameras</a></li>
                                        <li><a href="search.php?search=gaming">Gaming</a></li>
                                        <li><a href="search.php?search=laptop">Laptop accessories</a></li>
                                        <li><a href="search.php?search=mobile">Mobile accessories</a></li>
                                        <li><a href="search.php?search=powerbank">Power bank</a></li>
                                        <li><a href="search.php?search=printer">Printers</a></li>
                                    </ul>
                                    </li>
                                    <li><a href="search.php?search=grocery">Grocery</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="index.php">Home</a></li>
                            <li><a href="search.php?search=phone">Phones</a></li>
                            <li><a href="search.php?search=men" id="mens">Mens</a></li>
                            <li><a href="search.php?search=women">Womens</a></li>
                            <li id="sports"><a href="search.php?search=sport" class="flexitem">Sports<i class="ri-arrow-down-s-line"></i>
                                <span class="fly-item">new!</span>
                            </a>
                            <ul id="sports-item">
                            <li><a href="search.php?search=sport">Womens-Sports</a></li>
                            <li><a href="search.php?search=sport">Sport Equipments</a></li>
                            <li><a href="search.php?search=sport">T-Shirt</a></li>
                            <li><a href="search.php?search=sport">Shoes</a></li>
                            <li><a href="search.php?search=sport">Sport Suit</a></li>
                            <li><a href="search.php?search=sport">Pants</a></li>
                            <li><a href="search.php?search=sport">Accessories</a></li>
                            </ul>
                            </li>
                        </ul>
                    </nav>
                
                  </div>
                   <div class="search-bar">
                    <form action="search.php" class="search">
                        <span class="search-icon"><i class="ri-search-line"></i></span>
                        <input type="search" name="search" placeholder="Search here">
                        <button type="submit">Search</button>
                    </form>
                   </div>

                  <div class="right">
                    <ul class="flexitem">
                        <!-- <li class="mobile-hide "><a href="#">
                            <div class="flexitem">
                            <div class="icon-small"><i class="ri-heart-line"></i></div>
                            <div class="fly-item"><span class="item-number">0</span></div></div>
                        </a></li> -->
                        <li><a href="add_to_cart.php" class="iscart">
                            <div class="icon-small flexitem">
                                <i class="ri-shopping-cart-line"></i>
                                <div class="icon-text">
                                
                            </div>
                        </div>

                        </a></li>
                       </ul>
                  </div>
                </div>
            </div>
        </div>

     </header>
      
     <main>
        <div class="top-main">
            <div class="flexitem" id="top-img">
               <div class="upcoming">
                  <div class="card">
                    <img id="sale-animate" src="uploads\sale.jpg" alt="img">
                    <h3>Coming On Next Week</h3>
                    <!-- <p>Highest ever antutu score in this segment</p> -->
                  </div>
               </div>

               <div class="slider">
                   <a href="prd_page.php?productId=13"><img class="slide" src="uploads\pexels-mica-asato-1082529.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=5"><img class="slide" src="uploads\pexels-daniel-adesina-833052.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=8"><img class="slide" src="uploads\pexels-r-fera-432059.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=12"><img class="slide" src="uploads\pexels-godisable-jacob-932401.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=16"><img class="slide" src="uploads\pexels-terje-sollie-298863.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=15"><img class="slide" src="uploads\pexels-spencer-selover-428340.jpg" alt="img"></a>
                   <a href="prd_page.php?productId=27"><img class="slide" src="uploads\SAVE_20230405_045906.jpg" alt="img"></a>
                   <button id="next" onclick="nxt()"><i class="ri-arrow-right-s-line" ></i></button>
                   <button id="previous" onclick="prv()"><i class="ri-arrow-left-s-line" ></i></button>
               <!-- code for slider in index.js -->
                </div>
            </div>
        </div>

        <div class="main-tranding">
            <h1>Top's Deals</h1>
            <center><hr width="200px" color="blue"></center>
            <br>
            <div class="all-card">
    <?php
    $con = mysqli_connect('localhost', 'id21266917_dotstore', '#Dotstore1', 'id21266917_e_commerce');
    $fetch_product = "SELECT * FROM upload where ctg = 'top' limit 7";
    $product = mysqli_query($con, $fetch_product);

    while ($fetch_card = mysqli_fetch_array($product)) {
        ?>
        <div class="card">
            <a href="prd_page.php?productId=<?php echo $fetch_card['id']; ?>">
                <img src="uploads/<?php echo $fetch_card['img_name'] ?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $fetch_card['id']; ?>" id="add-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <p><b><?php echo $fetch_card['title'] ?></b></p>
                <p><?php echo $fetch_card['decri'] ?></p>
                <p><?php echo $fetch_card['amount'] ?></p>
            </a>
        </div>
        <?php
    };
    //to add card to the cart
    if (isset($_POST['productId'])) {
        $product_id = $_POST['productId'];
        $mail = $_SESSION['user_mail'];
        $userid = $_SESSION['user_id'];
        $username = $_SESSION['user_name'];
    
        $fetch_product_query = "SELECT * FROM upload WHERE id = $product_id";
        $product_result = mysqli_query($con, $fetch_product_query);
        $product = mysqli_fetch_assoc($product_result);
    
        if ($product) {
            $cart_table_name = ($username.$userid); 
            $check_cart_query = "SHOW TABLES LIKE '$cart_table_name'";
            $check_cart_result = mysqli_query($con, $check_cart_query);
    
            if (mysqli_num_rows($check_cart_result) == 0) {
                // Table doesn't exist, create it
                $create_cart_table_query = "CREATE TABLE $cart_table_name (
                    `id` INT PRIMARY KEY,
                    `title` VARCHAR(255),
                    `decri` TEXT,
                    `amount` VARCHAR(255),
                    `img_name` VARCHAR(255),
                    `img_type` VARCHAR(255)
                )";
                mysqli_query($con, $create_cart_table_query);
            }
    
            $check_existing_product_query = "SELECT * FROM $cart_table_name WHERE id = $product_id";
            $existing_product_result = mysqli_query($con, $check_existing_product_query);
    
            if (mysqli_num_rows($existing_product_result) > 0) {
                // Product already exists in the cart, show a message
                echo "<script>alert('Product already exists in your cart.')</script>";
            } else {
                // Product doesn't exist in the cart, so insert it
                $title = $product['title'];
                $decri = $product['decri'];
                $amount = $product['amount'];
                $img_name = $product['img_name'];
                $img_type = $product['img_type'];
    
                $add_cart_query = "INSERT INTO $cart_table_name (`id`, `title`, `decri`, `amount`, `img_name`, `img_type`) VALUES
                ('$product_id','$title','$decri','$amount','$img_name','$img_type')";
                mysqli_query($con, $add_cart_query);
                echo "<script>alert('Product added to cart.')</script>";
            }
        } else {
            echo "<script>alert('Product not found.')</script>";
        }
    }
    ?>
</div>
            
        </div>
    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">Feature products</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $feature_prod_query="select*from upload where ctg='feature'";
            $feature_prod=mysqli_query($con,$feature_prod_query);
            while($fetch_feat_prod=mysqli_fetch_array($feature_prod)){
            ?>
                <div class="feature-card">
            <a href="prd_page.php?product_feature_Id=<?php echo $fetch_feat_prod['id'];?>">
                <img src="uploads\<?php echo $fetch_feat_prod['img_name']?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $fetch_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <p><b><?php echo $fetch_feat_prod['title']?></b></p>
                <p><?php echo $fetch_feat_prod['decri']?></p>
                <p><?php echo $fetch_feat_prod['amount']?></p>
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
         <h1 font-style="">For Womens</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $men_prod_query="select*from upload where ctg='women'";
            $men_prod=mysqli_query($con,$men_prod_query);
            while($men_feat_prod=mysqli_fetch_array($men_prod)){
            ?>
                <div class="feature-card">
            <a href="prd_page.php?product_feature_Id=<?php echo $men_feat_prod['id'];?>">
                <img src="uploads\<?php echo $men_feat_prod['img_name']?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $men_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <p><b><?php echo $men_feat_prod['title']?></b></p>
                <p><?php echo $men_feat_prod['decri']?></p>
                <p><?php echo $men_feat_prod['amount']?></p>
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
        <div class="fade-img"><img src="uploads\pexels-hasan-albari-1229861.jpg"></div>
		<div class="fade-img"><img src="uploads\wallpaperflare.com_wallpaper (1).jpg"></div>
		<div class="fade-img"><img src="uploads\pexels-tembela-bohle-1884584.jpg"></div>
		<div class="fade-scbar"></div>
		<div class="fade-scbar"></div>
		<div class="fade-scbar"></div>
		<div class="fade-text"><p>Only limited time<br>Special offer</p></div>
		<div class="fade-text">Its very beautyful.</div>
		<div class="fade-text">Hope you enjoy it.<br>Collect it now.</div>
        <button>Shop Now</button>
    </div>
  
    <div class="main-feature">
        <div class="container">
         <br>
         <h1 font-style="">For Mens</h1>
         <center><hr width="250px" color="blue"></center><br>

            <div class="all-feature-card">
            <?php
            $women_prod_query="select*from upload where ctg='court'";
            $women_prod=mysqli_query($con,$women_prod_query);
            while($women_feat_prod=mysqli_fetch_array($women_prod)){
            ?>
                <div class="feature-card">
            <a href="prd_page.php?product_feature_Id=<?php echo $women_feat_prod['id'];?>">
                <img src="uploads\<?php echo $women_feat_prod['img_name']?>" alt="">
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $women_feat_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <p><b><?php echo $women_feat_prod['title']?></b></p>
                <p><?php echo $women_feat_prod['decri']?></p>
                <p><?php echo $women_feat_prod['amount']?></p>
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
            $formens_query="select*from upload where ctg='mens'";
            $formens_prod=mysqli_query($con,$formens_query);
            while($fetch_formens_prod=mysqli_fetch_array($formens_prod)){
            ?>
                <div class="feature-card">
            <a href="prd_page.php?product_mens_Id=<?php echo $fetch_formens_prod['id']; ?>">
                <img src="uploads\<?php echo $fetch_formens_prod['img_name']?>" alt="">
                <p><b><?php echo $fetch_formens_prod['title']?></b></p>
                <form action="" method="POST">
                    <button type="submit" name="productId" value="<?php echo $fetch_formens_prod['id']; ?>" id="add-5-to-cart"><i class='bx bx-cart-add'></i></button>
                </form>
                <p><?php echo $fetch_formens_prod['decri']?></p>
                <p><?php echo $fetch_formens_prod['amount']?></p>
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

     <footer>
        <div class="back-to-top-btn"><button><a id="back-top" href="#page">Back to top</a></button></div>
        <center><br><hr width="95%" color="#794afa"></center><br>
        <div class="social-links">
            <a href="#"><i class='bx bxl-facebook-circle'></i></a>
            <a href="#"><i class='bx bxl-twitter'></i></a>
            <a href="#"><i class='bx bxl-google'></i></a>
            <a href="#"><i class='bx bxl-github'></i></a>
            <a href="#"><i class='bx bxl-instagram-alt'></i></a>  
            <a href="#"><i class='bx bxl-youtube'></i></a>  
            <a href="#"><i class='bx bxl-linkedin'></i></a>  
        </div>

        <div class="footer-main">
           <div class="footer-main1">
            <ul>
                <li class="main1-heading">ABOUT US</li>
                <li><a href="#">Contact us</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Our stores</a></li>
                <li><a href="#">Press</a></li>
                <li><a href="#">Corporate info</a></li>
            </ul>
            <ul>
                <li class="main1-heading">HELP</li>
                <li><a href="#">Payments</a></li>
                <li><a href="#">shipping</a></li>
                <li><a href="#">Cancellation & Return</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Report infringement</a></li>
            </ul>
            <ul>
                <li class="main1-heading">CONSUMER POLICY</li>
                <li><a href="#">Cancellation & Return</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Security</a></li>
                <li><a href="#">Privacy</a></li>
                <li><a href="#">Sitemape</a></li>
                <li><a href="#">Grievance redressal</a></li>
                <li><a href="#">EPR Compliance</a></li>
            </ul>
            <!-- <ul>
                <li class="main1-heading">LET US HELP</li>
                <li><a href="#">Covid-19 & .Store</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Download app</a></li>
                <li><a href="#">Your account</a></li>
                <li><a href="#">Return policy</a></li>
            </ul> -->
            </div>
            <div class="footer-main2">
            <div>
                <p>
                Address:-Store internet private limited,<br>
                Buildings alyssa, Begonia &<br>
                clove embassy tech village,<br>
                Outer ring road, Devarabeesanahalli village,<br>
                Bengaluru, 560103,<br>
                Karnataka, India<br>
                CIN : U511094543K4543M073<br>
                Telephone: 044-45614700
            </p>
             <a href="logout.php" id="logout-btn" style="color:red;">Logout</a>
            </div>   
            </div>
        </div>
        <center><br><hr width="95%" color="#794afa"></center><br>
        <div class="footer-bottom">
            <a href="#"><i class='bx bxs-badge-check'>Become a seller</i></a>
            <a href="#"><i class='bx bxs-star'>Advertise</i></a>
            <a href="#"><i class='bx bxs-gift'>Gift cards</i></a>
            <a href="#"><i class='bx bxs-help-circle'>Help center</i></a>
            <a href="#"><i>&copy;2000-2023.Store.com by Sanjaykumar</i></a>
        </div>
     </footer>
    
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
  header('location:login/');
}
?>  