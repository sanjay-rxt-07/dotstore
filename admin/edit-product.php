<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-DotStore-Product Manager</title>
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
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        
     
    <?php 
    include ("include/header.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['update-text'])) {
                // Function to sanitize input data
                function sanitizeInput($data) {
                    return htmlspecialchars(strip_tags(trim($data)));
                }
                
                // Collect form data
                $title = sanitizeInput($_POST['title']);
                $name = sanitizeInput($_POST['name']);
                $model = sanitizeInput($_POST['model']);
                $mrp = sanitizeInput($_POST['mrp']);
                $price = sanitizeInput($_POST['price']);
                $description = $_POST['description'];
                $detail = $_POST['detail'];
                $meta_title = sanitizeInput($_POST['meta_title']);
                $meta_description = sanitizeInput($_POST['meta_description']);

                
                // Build the update query
                try {
                        $query = "UPDATE products SET title='$title' , name='$name', model='$model', mrp='$mrp',price='$price', description='$description', detail='$detail', meta_title='$meta_title',meta_description='$meta_description' WHERE id='$id'";
                    
                    $add_query = $con->query($query);
                    
                    if ($add_query == true) {
                        echo "Form submitted successfully";
                        ?>
                        <script>window.location.href = 'edit-product.php?id=<?php echo $id;?>';</script>
                        <?php
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        }
    
        // Fetch current category data
        $query = "SELECT * FROM products WHERE id='$id'";
        $data = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($data)) {

            
    ?>
           <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Edit Product</h6>
                            <form  method="POST" enctype="multipart/form-data">

                                <div class="row mb-3">
                                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" value="<?php echo $row['title'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="model" class="col-sm-2 col-form-label">Model</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="model" value="<?php echo $row['model'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mrp" class="col-sm-2 col-form-label">MRP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mrp" value="<?php echo $row['mrp'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="meta_title" value="<?php echo $row['meta_title'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="meta_description" value="<?php echo $row['meta_description'];?>" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" required id="brief"><?php echo $row['description'];?></textarea>
                                    </div>
                                </div>

                            <script type="text/javascript">
			                CKEDITOR.replace( 'brief');			
			                </script>

                                <div class="row mb-3">
                                    <label for="detail" class="col-sm-2 col-form-label">Product Details</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="detail" required id="brief2"><?php echo $row['detail'];?></textarea>
                                    </div>
                                </div>

                            <script type="text/javascript">
			                CKEDITOR.replace( 'brief2');			
			                </script>
    
                                <button type="submit" name="update-text" class="btn btn-primary">Submit</button>
                            </form>


<!-- image form Start -->
<br><br><br><br>
<h6 class="mb-4">Edit Product Images</h6>
            
                <?php 

// to update image
if(isset($_POST['update-image'])){
    $id=$_POST['id'];
    $product=$_POST['product'];


     // File upload paths
     $posterPath = 'uploads/product/';

     // Handle poster file upload
     $posterFileName = $_FILES['poster']['name'];
     $posterFilePath = $posterPath . $posterFileName;
     move_uploaded_file($_FILES['poster']['tmp_name'], $posterFilePath);
 
     // Insert data into the database
     try {
         $query="UPDATE product_image SET name='$posterFilePath' WHERE id='$id'";
 $add_query = $con->query($query); 
        if($add_query==true){
            ?>
            <script>window.location.href ='edit-product.php?id=<?php echo $product;?>'; </script>
            <?php
        }
     } 
     catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } 
}

                 $query = "SELECT * FROM product_image WHERE product='$id'";
                 $data = mysqli_query($con, $query);
                 while ($row = mysqli_fetch_assoc($data)) {
                 $image=$row['id'];
                 $product=$row['product'];
                ?>
                <form  method="POST" enctype="multipart/form-data" >
                             <div class="row mb-3">
                                <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id" value="<?php echo $image;?>" hidden>
                                    <input type="text" name="product" value="<?php echo $product;?>" hidden>
                                    <input type="file" class="form-control" name="poster" required>

                                    <img src="<?php echo $row['name'];?>" alt="" height="100px" width="100px">
                                    <a href="delete-product.php?image=<?php echo $image;?>&product=<?php echo $product;?>">Delete</a>
                                    <button type="submit" name="update-image" class="btn btn-primary">Change</button>
                                </div>
                            </div>
                           
                           </form>
<?php
 }
?>



<?php 
if(isset($_POST['add-image'])){
    $targetDir = "uploads/product/";  // Define your upload directory
    foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
        $fileName = basename($_FILES['images']['name'][$key]);
        $targetFilePath = $targetDir . $fileName;
        move_uploaded_file($tmpName, $targetFilePath);
        
        $imgquery="insert into product_image (name,product) value ('$targetFilePath','$id')";
        $add_query = $con->query($imgquery);
    }?>
    <script>window.location.href ='edit-product.php?id=<?php echo $id;?>'; </script>
    <?php

}

?>
<br><br>
<h6 class="mb-4">Add More Images For Product</h6>
<form  method="POST" enctype="multipart/form-data" >
                                <div class="row mb-3">
                                    <label for="images" class="col-sm-2 col-form-label">Product Images</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple required>
                                    </div>
                                </div>
                                <button type="submit" name="add-image" class="btn btn-primary">Add Images</button>

                                </form>




           
            <br><br>
<h6 class="mb-4">Product Colors</h6>

<?php
$color_query="select * from product_color where product='$id'";
$colordata = mysqli_query($con, $color_query);
while ($row = mysqli_fetch_assoc($colordata)) {

            ?><div>
             <button class="btn btn-light"><?php echo $row['name'];?></button>
             <a href="delete-product.php?color=<?php echo $row['id'];?>&product=<?php echo $id;?>">Delete</a>
             </div>
             <?php
}


if(isset($_POST['add-color'])){
    $name=$_POST['name'];
    $colorquery="insert into product_color (name,product) value ('$name','$id')";
    $add_query = $con->query($colorquery);
    ?>
    <script>window.location.href ='edit-product.php?id=<?php echo $id;?>'; </script>
    <?php

}
            ?>

<br><br>
<h6 class="mb-4">Add More Colors For Products</h6>
<form  method="POST" enctype="multipart/form-data" >

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Color Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <button type="submit" name="add-color" class="btn btn-primary">Add Color</button>

</form>

<br><br>
<h6 class="mb-4">Product Sizes</h6>

<?php
$size_query="select * from product_size where product='$id'";
$sizedata = mysqli_query($con, $size_query);
while ($row = mysqli_fetch_assoc($sizedata)) {

            ?><div>
             <button class="btn btn-light"><?php echo $row['name'];?></button>
             <a href="delete-product.php?size=<?php echo $row['id'];?>&product=<?php echo $id;?>">Delete</a>
             </div>

             <?php
            }
            if(isset($_POST['add-size'])){
                $name=$_POST['name'];
                $sizequery="insert into product_size (name,product) value ('$name','$id')";
                $add_query = $con->query($sizequery);
                ?>
                <script>window.location.href ='edit-product.php?id=<?php echo $id;?>'; </script>
                <?php
            
            }
                        
            ?>

<br><br>
<h6 class="mb-4">Add More Sizes For Products</h6>
<form  method="POST" enctype="multipart/form-data" >

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Size</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <button type="submit" name="add-size" class="btn btn-primary">Add size</button>

</form>




</div>
                    </div>
            </div>
          
<?php }

}

?>


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
    <script>
      $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
</body>

</html>
<?php
}
else{
  header('location:login.php');
}
?>  