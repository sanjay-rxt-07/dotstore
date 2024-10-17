<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-DotStore-Slider Manager</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        
     
    <?php 
    include ("include/header.php");
    ?>
          
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Top Sliders</h6>
                        <a href="add-slider.php" class="btn btn-sm btn-primary">Add Slider</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">S No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maincate_query="SELECT * FROM slider;"
                                 ;
                                $maincate=mysqli_query($con,$maincate_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($maincate)){
                                    $i++;
                                    $id=$row['id'];
                                ?>
                                <tr>
                            
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><img src="<?php echo $row['image'];?>" alt="" height="70px" width="70px"></td>
                                    <td><?php echo $row['url'];?></td>
                                    <td>
                                        <a href="edit-slider.php?sliderId=<?php echo $id; ?>"><button class="btn-info">Edit</button></a>
                                        <a href="" onclick="confirmRedirect()"><button class="btn-danger">delete</button></a>

<script>
    function confirmRedirect() {
        var result = confirm("Are you sure you want to delete the Slide.");
        
        if (result) {
            window.location.href = "delete-product.php?slider=<?php echo $id;?>"; 
        }
        // If the user clicks "No", nothing will happen and the link will not follow
    }
</script>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Mid Sliders</h6>
                        <a href="add-slider2.php" class="btn btn-sm btn-primary">Add Slider</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">S No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">URL</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maincate_query="SELECT * FROM slider2;"
                                 ;
                                $maincate=mysqli_query($con,$maincate_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($maincate)){
                                    $i++;
                                    $id=$row['id'];
                                ?>
                                <tr>
                            
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><img src="<?php echo $row['image'];?>" alt="" height="70px" width="70px"></td>
                                    <td><?php echo $row['url'];?></td>
                                    <td>
                                        <a href="edit-slider2.php?sliderId=<?php echo $id; ?>"><button class="btn-info">Edit</button></a>
                                        <a href="" onclick="confirmRedirect()"><button class="btn-danger">delete</button></a>

<script>
    function confirmRedirect() {
        var result = confirm("Are you sure you want to delete the Slide.");
        
        if (result) {
            window.location.href = "delete-product.php?slider2=<?php echo $id;?>"; 
        }
        // If the user clicks "No", nothing will happen and the link will not follow
    }
</script>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->



           

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Dot Store</a>, All Right Reserved. 
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <script src="js/main.js"></script>
</body>

</html>
<?php
}
else{
  header('location:login.php');
}
?>  