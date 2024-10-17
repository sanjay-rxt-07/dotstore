  
<header id="header">
        <!-- <div class="top-header">
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
                        <li><a href="#"><i class="bx bxs-user-circle"></i>username</a></li>
                        <li><a href="track_order.php">Track oreder</a></li>
                        <li><a href="feedback.php" target="_blank">FAQ</a></li>
                        <li><a href="logout.php" id="logout-btn">Logout</a></li>
                    </ul>
                 </div>
              </div>
        
              </div>  

        </div> -->

        <div class="mid-header">
            <div class="container">
                <div class="flexitem">
                    <a href="#" class="trigger desktop-hide" id="menu-btn"><span class="ri-menu-2-line"></span></a>
                  <div class="left flexitem">
                    <div class="logo"><a href="../shop"><span class="circle"></span>.Store</a></div>
                    <nav class="nav-bar" >
                        <ul class="flexitem">
                         
                            <li class="all"><a href="#">All<i class="ri-arrow-down-s-line"></i></a>
                                <div class="all-item">

                                    <ul id="main-ul">
                                        <?php 
                                        $cate="SELECT * FROM category";
                                        $cate_data=mysqli_query($con,$cate);
                                        while($row=mysqli_fetch_assoc($cate_data)){
                                           $mainid=$row['id'];
                                       
                                        ?>
                                    <li id="mens"><a href="search.php?searchCate=<?php echo $row['id'];?>"><?php echo $row['name'];?></a><i class="ri-arrow-right-s-line"></i>
                                     <ul id="mens-item">
                                    <?php
                                     $subcate="SELECT * FROM subcategory WHERE category = '$mainid'";
                                     $subcate_data=mysqli_query($con,$subcate);
                                        while($row=mysqli_fetch_assoc($subcate_data)){
                                           $subid=$row['id'];
                                         ?>
                                        <li id="shoes"><a href="search.php?searchCate2=<?php echo $subid;?>"><?php echo $row['name'];?></a><i class="ri-arrow-right-s-line"></i>
                                         <ul id="shoes-item">
                                         <?php
                                     $sub2cate="SELECT * FROM 2subcategory WHERE subcategory = '$subid'";
                                     $sub2cate_data=mysqli_query($con,$sub2cate);
                                        while($row=mysqli_fetch_assoc($sub2cate_data)){
                                           $sub2id=$row['id'];
                                         ?>
                                            <li><a href="search.php?searchCate3=<?php echo $sub2id;?>"><?php echo $row['name'];?></a></li>

                                            <?php }
                                            ?>
                                         </ul>
                                       </li>
                                        <?php 
                                        }
                                        ?>
                                     </ul>
                                   </li>
<?php 
}

?>

                                   
                                    </ul>

                                </div>
                            </li>


                            <?php
                            $head="SELECT * FROM category WHERE head='1'";
                            $headata=mysqli_query($con,$head);
                            while($row=mysqli_fetch_assoc($headata)){
                            ?>
                            <li><a href="search.php?searchCate=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>
                            <?php 
                            }
                            ?>


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
                        <li><a href="account.php" class="iscart">
                            <div class="icon-small flexitem">
                                <i class="fa fa-user"></i>
                                <div class="icon-text">
                            </div>
                        </div>

                        </a></li>

                        <li><a href="shop-cart.php" class="iscart">
                            <div class="icon-small flexitem">
                                <i class="fa fa-shopping-cart"></i>
                                <div class="icon-text">
                            </div>
                        </div>

                        </a></li>

                        <li><a href="contact.php" class="iscart">
                            <div class="icon-small flexitem" style="position:relative;">
                                Contact<i class="fa fa-phone" id="contact-phone"></i>
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
      
     <script>
        // menu bar togle button
let menu=document.querySelector('#menu-btn');
let navbar=document.querySelector('.nav-bar');
menu.onclick = () => {
	navbar.classList.toggle('active');
	menu.classList.toggle("ri-close-line");
};
     </script>
