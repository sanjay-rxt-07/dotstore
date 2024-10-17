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
    include ("include/dbconn.php");
    ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Movies</h6>

                            <?php
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
if(isset($_POST['add-movie'])){
    // Function to sanitize input data
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }
    
    // Collect form data
    $movieTitle = sanitizeInput($_POST['movie-title']);
    // echo $movieTitle;
   
   
    $releaseDate = sanitizeInput($_POST['release-date']);
    $genre = sanitizeInput($_POST['genre']);
    $director = sanitizeInput($_POST['director']);
    $cast = sanitizeInput($_POST['cast']);
    $summary = sanitizeInput($_POST['summary']);

    // File upload paths
    $posterPath = 'uploads/posters/';
    $videoPath = 'uploads/videos/';

    // Handle poster file upload
    $posterFileName = $_FILES['poster']['name'];
    $posterFilePath = $posterPath . $posterFileName;
    move_uploaded_file($_FILES['poster']['tmp_name'], $posterFilePath);

    // Handle video file upload
    $videoFileName = $_FILES['video']['name'];
    $videoFilePath = $videoPath . $videoFileName;
    move_uploaded_file($_FILES['video']['tmp_name'], $videoFilePath);

    // Insert data into the database
    try {
        $query="insert into movies (title,release_date, genre, director, summary,logo, video,cast) value ('$movieTitle','$releaseDate','$genre','$director','$summary','$posterFilePath','$videoFilePath','$cast')";
        
$add_query = $conn->query($query);
$last_insert_id = $conn->insert_id;


    if($query==true){
     echo "form submit";
        ?>
        <script>window.location.href ='add-movie.php'; </script>
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
                                    <label for="movie-title" class="col-sm-2 col-form-label">Movie Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="movie-title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="release-date" class="col-sm-2 col-form-label">Release Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" name="release-date" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                                <div class="col-sm-10">
                                <select class="form-select mb-3" aria-label="Default select example" name="genre" required>
                                <option value="action">Action</option>
                                <option value="drama">Drama</option>
                                <option value="thriller">Thriller</option>
                                <option value="adventure">Adventure</option>
                                <option value="animation">Animation</option>
                                <option value="comedy">Comedy</option>
                                <option value="fantasy">Fantasy</option>
                                <option value="horror">Horror</option>
                                <option value="mystery">Mystery</option>
                                <option value="romance">Romance</option>
                                <option value="science-fiction">Science Fiction</option>
                            </select>
                                </div>
                                </div>
                                

                                <div class="row mb-3">
                                    <label for="director" class="col-sm-2 col-form-label">Director</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="director" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="cast" class="col-sm-2 col-form-label">Cast</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="cast" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="summary" class="col-sm-2 col-form-label">Summary</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="summary" required id="brief"></textarea>
                                    </div>
                                </div>

                               
        
        
                          <script type="text/javascript">
			CKEDITOR.replace( 'brief');			
			 </script>
       
      

                                 <div class="row mb-3">
                                    <label for="poster" class="col-sm-2 col-form-label">Poster</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="poster" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="video" class="col-sm-2 col-form-label">Movie Video file</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="video" required>
                                    </div>
                                </div>


                                <button type="submit" name="add-movie" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
            </div>
          


            <!-- Footer Start -->
           
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