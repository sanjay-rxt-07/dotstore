<?php
include("../connection/db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dot-Store-About Us</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let titles = [" Dot-Store About Us", "The Journey That Shaped Us"]; 
            let index = 0; 
            setInterval(function() {
                document.title = titles[index]; 
                index = (index + 1) % titles.length; 
            }, 1000); 
        });
    </script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/style.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

</head>

<body>
   
<div id="page" class="main">

<?php 
include("../include/header.php");
?>
    <!-- Page Header Start -->
    <div class="container-fluid bg-dark bg-img p-5 mb-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4 text-uppercase text-white">About Us</h1>
                <!-- <a href="">Home</a>
                <i class="far fa-square text-primary px-2"></i>
                <a href="">About</a> -->
            </div>
        </div>
    </div>
    <!-- Page Header End -->

  <?php 

      $query="SELECT * FROM pages WHERE name='about'";
      $data=mysqli_query($con,$query);
      if($row=mysqli_fetch_assoc($data)){
        
  ?>

    <!-- About Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h1 class="text-primary font-secondary"><?php echo $row['mainheading']; ?></h1>
                <h2 class="text-uppercase"><?php echo $row['subheading']; ?></h2>
            </div>
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="../admin/uploads/pages/<?php echo $row['image']; ?>" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 pb-5">
                    <h4 class="mb-4"><?php echo $row['text1']; ?></h4>
                    <p class="mb-5"><?php echo $row['text2']; ?></p>
                    <p class="mb-5"><?php echo $row['text3']; ?></p>
                    <div class="row g-5">
                        <!-- <div class="col-sm-6">
                            <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-heartbeat fa-2x text-white"></i>
                            </div>
                            <h4 class="text-uppercase">100% Healthy</h4>
                            <p class="mb-0">Labore justo vero ipsum sit clita erat lorem magna clita nonumy dolor magna dolor vero</p>
                        </div> -->
                        <div class="col-sm-6">
                            <!-- <div class="d-flex align-items-center justify-content-center bg-primary border-inner mb-4" style="width: 90px; height: 90px;">
                                <i class="fa fa-award fa-2x text-white"></i>
                            </div> -->
                            <h4 class="text-uppercase">An Award Winning Company</h4>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
<?php 
 }
?>

<br>
</div>
<?php 

include("../include/footer.php");
?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>