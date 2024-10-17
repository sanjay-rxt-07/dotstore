<?php
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin panel</title>
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
    include("../connection/db.php");

     $query="SELECT * FROM pages WHERE name='about'";
     $data=mysqli_query($con,$query);
     if($row=mysqli_fetch_assoc($data)){
        
     

    ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Update About Us Page</h6>

                            <?php
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['update'])) {
        // Function to sanitize input data
        function sanitizeInput($data) {
            return htmlspecialchars(strip_tags(trim($data)));
        }

        // Collect form data
        $mainheading = sanitizeInput($_POST['mainheading']);
        $subheading = sanitizeInput($_POST['subheading']);
        $text1 = sanitizeInput($_POST['text1']);
        $text2 = sanitizeInput($_POST['text2']);
        $text3 = sanitizeInput($_POST['text3']);

        // File upload paths
        $posterPath = 'uploads/pages/';
        $posterFileName = $_FILES['poster']['name'];
        $posterFilePath = '';

        // Check if a new poster image is uploaded
        if (!empty($posterFileName)) {
            $posterFilePath = $posterPath . $posterFileName;
            move_uploaded_file($_FILES['poster']['tmp_name'], $posterFilePath);
        } else {
            // Keep the previous image if no new image is uploaded
            $posterFileName = $row['image'];
        }

        // Build the update query
        try {
            $query = "UPDATE pages SET 
                        mainheading='$mainheading', 
                        subheading='$subheading', 
                        text1='$text1', 
                        text2='$text2', 
                        text3='$text3', 
                        image='$posterFileName' 
                      WHERE name='about'";

            $update_query = $con->query($query);

            if ($update_query === true) {
                echo "Form submitted successfully.";
                ?>
                <script>window.location.href ='about.php'; </script>
                <?php
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>


                            <form  method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="movie-title" class="col-sm-2 col-form-label">Main Heading</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $row['mainheading'];?>" name="mainheading" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="release-date" class="col-sm-2 col-form-label">Sub Heading</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $row['subheading'];?>" name="subheading">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="text1" class="col-sm-2 col-form-label">First Text</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="text1"  id="brief"><?php echo $row['text1'];?></textarea>
                                    </div>
                                </div>
                           <script type="text/javascript">
			                 CKEDITOR.replace( 'brief');			
			               </script>
       
                                 <div class="row mb-3">
                                    <label for="text2" class="col-sm-2 col-form-label">Second Text</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="text2" id="brief2"><?php echo $row['text2'];?></textarea>
                                    </div>
                                </div>
                           <script type="text/javascript">
			                 CKEDITOR.replace( 'brief2');			
			               </script>

                                <div class="row mb-3">
                                    <label for="text3" class="col-sm-2 col-form-label">Third Text</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="text3" id="brief3"><?php echo $row['text3'];?></textarea>
                                    </div>
                                </div>
                           <script type="text/javascript">
			                 CKEDITOR.replace( 'brief3');			
			               </script>
       
      

                                 <div class="row mb-3">
                                    <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="poster">
                                        <img src="uploads/pages/<?php echo $row['image'];?>" alt="" height="100px" width="100px">
                                    </div>
                                </div>


                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
            </div>
          
            <?php 
        
        }?>


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