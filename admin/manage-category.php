<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-DotStore-Category Manager</title>
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
                        <h6 class="mb-0">Main Category</h6>
                        <a href="add-category.php" class="btn btn-sm btn-primary">Add Category</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col">S No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Heading</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maincate_query="SELECT * FROM category";
                                $maincate=mysqli_query($con,$maincate_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($maincate)){
                                    $i++;
                                    $id=$row['id'];
                                ?>
                                <tr>
                                  
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td><?php echo $row['head'];?></td>
                                    <td><a href="edit-category.php?categoryId=<?php echo $id; ?>"><button class="btn-info">Edit</button></a></td>
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

<!-- sub category start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Sub Category</h6>
                        <a href="add-subcategory.php" class="btn btn-sm btn-primary">Add Sub Category</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col">S No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maincate_query="SELECT category.name AS c_name, subcategory.name AS s_name,
                                subcategory.id AS categoryid
                                 FROM subcategory
                                 JOIN category ON subcategory.category=category.id";
                                $maincate=mysqli_query($con,$maincate_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($maincate)){
                                    $i++;
                                    $id=$row['categoryid'];
                                ?>
                                <tr>
                                  
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['s_name'];?></td>
                                    <td><?php echo $row['c_name'];?></td>
                                    <td><a href="edit-category.php?subcategoryId=<?php echo $id; ?>"><button class="btn-info">Edit</button></a></td>
                                </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

<!-- sub category end -->

<!-- 2sub category start -->

<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Second Sub Category</h6>
                        <a href="add-2subcategory.php" class="btn btn-sm btn-primary">Add Second Sub Category</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col">S No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Sub Category</th>
                                    <th scope="col">Main Category</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $maincate_query="SELECT 2subcategory.name AS 2s_name, subcategory.name AS s_name
                                ,category.name AS c_name,2subcategory.id AS categoryid
                                 FROM 2subcategory
                                 JOIN subcategory ON 2subcategory.subcategory=subcategory.id
                                 JOIN category ON 2subcategory.category=category.id";
                                $maincate=mysqli_query($con,$maincate_query);
                                $i=0;
                                while($row=mysqli_fetch_assoc($maincate)){
                                    $id=$row['categoryid'];
                                    $i++;
                                ?>
                                <tr>
                                  
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $row['2s_name'];?></td>
                                    <td><?php echo $row['s_name'];?></td>
                                    <td><?php echo $row['c_name'];?></td>
                                    <td><a href="edit-category.php?sub-subcategoryId=<?php echo $id; ?>"><button class="btn-info">Edit</button></a></td>
                                </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


<!-- end 2subcategory -->
            <!-- Widgets Start -->
           
            <!-- Widgets End -->


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