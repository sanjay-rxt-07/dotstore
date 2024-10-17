<?php
include("../connection/db.php");
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Dot-Store-Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

     <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="../css/style.css">
    <style>

        .contact,.breadcrumb-option{
            background: white;
        }

        .product-details,.breadcrumb-option{
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<div id="preloder">
        <div class="loader"></div>
    </div>

<?php 
    include("../include/header.php");
    ?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.php"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__content">
                        <div class="contact__address">
                            <h5>Contact info</h5>
                            <ul>
                                <li>
                                    <h6><i class="fa fa-map-marker"></i> Address</h6>
                                    <p>Delhi NCR, India</p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-phone"></i> Phone</h6>
                                    <p><span>XXX-XXX-XXXX</span><span>XXX-XXX-XXXX</span></p>
                                </li>
                                <li>
                                    <h6><i class="fa fa-headphones"></i> Support</h6>
                                    <p>sk80107775@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="contact__form">
                            <h5>SEND MESSAGE</h5>
                            <form method="POST">
                                <input type="text" placeholder="Name" name="name" required>
                                <input type="email" placeholder="Email" name="email" required>
                                <input type="text" placeholder="Address" name="address" required>
                                <textarea placeholder="Message" name="message" required></textarea>
                                <button type="submit" class="site-btn" name="send-msg">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Sanitize and validate the form input
                    $name = mysqli_real_escape_string($con, $_POST['name']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $address = mysqli_real_escape_string($con, $_POST['address']);
                    $message = mysqli_real_escape_string($con, $_POST['message']);
                    
                    // Validate required fields
                    if (!empty($name) && !empty($email) && !empty($message)) {
                        // Insert the contact form data into the database
                        $sql = "INSERT INTO contacts (name, email, address, message) VALUES ('$name', '$email', '$address', '$message')";
                        if (mysqli_query($con, $sql)) {
                            $success_message = "Message sent successfully!";
                        } else {
                            $error_message = "Error: Could not save your message. Please try again.";
                        }
                    } else {
                        $error_message = "Please fill in all the required fields.";
                    }
                }
                ?>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__map">
                        <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224498.3035449296!2d77.22557256378676!3d28.45586693799158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cdc15f5a424b1%3A0xe4f50576c850e0f2!2sFaridabad%2C%20Haryana%2C%20India!5e0!3m2!1sen!2sbd!4v1728024102798!5m2!1sen!2sbd"
                        height="780" style="border:0" allowfullscreen="">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<?php 
    include("../include/footer.php");
    ?>


</body>

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
    <script src="index.js"></script>
    <script>
  //TO NOT SEE RESUBMIT FORM NOTIFICATION
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>