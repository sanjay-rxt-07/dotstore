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
    if (isset($_GET['faqId'])) {
        $id = $_GET['faqId'];
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                // Function to sanitize input data
                function sanitizeInput($data) {
                    return htmlspecialchars(strip_tags(trim($data)));
                }
                
                // Collect form data
                $question = sanitizeInput($_POST['question']);
                $answer = sanitizeInput($_POST['answer']);
    
               
                // Build the update query
                try {
    
                        // If a new image is uploaded, update both name and image
                    $query = "UPDATE faq SET answer='$answer', question='$question' WHERE id='$id'";
                    
                    $add_query = $con->query($query);
                    
                    if ($add_query == true) {
                        echo "Form submitted successfully";
                        ?>
                        <script>window.location.href = 'faq-manage.php';</script>
                        <?php
                    }
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
        }
    
        // Fetch current category data
        $query = "SELECT * FROM faq WHERE id='$id'";
        $data = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($data)) {

            
    ?>
           <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Edit FAQ</h6>
                            <form  method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="movie-title" class="col-sm-2 col-form-label">Question</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="question" value="<?php echo $row['question'];?>" required>
                                    </div>
                                </div>
                               
                                 <div class="row mb-3">
                                    <label for="poster" class="col-sm-2 col-form-label">Answer</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="answer" value="<?php echo $row['answer'];?>" required>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
</body>

</html>
<?php
}
else{
  header('location:login.php');
}
?>  