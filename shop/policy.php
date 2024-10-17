<?php 
include("../connection/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dot-Store-Policy</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let titles = ["DotStore-Policy", "DotStore-Read Our Policy"]; // Array of titles
            let index = 0; // Start index

            // Function to toggle the title
            setInterval(function() {
                document.title = titles[index]; // Change the title
                index = (index + 1) % titles.length; // Toggle between titles
            }, 1000); 
        });
    </script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

   
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <style>
        .container {
    max-width: 1200px;
    margin: 0 auto;
}

/* Header Styles */
.term-heading {
    background-color: #0073e6;
    color: #fff;
    padding: 40px 20px;
    text-align: center;
    margin-bottom: 30px;
}

.term-heading h1 {
    font-size: 3rem;
    margin-bottom: 10px;
}

.term-heading p {
    font-size: 1.2rem;
}

/* Terms Section Styles */
.terms-section {
    padding: 40px 20px;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-bottom: 40px;
}

.terms-section h2 {
    font-size: 2rem;
    margin-bottom: 10px;
    color: #0073e6;
}

.terms-section p {
    font-size: 1.1rem;
    color: #555;
    line-height: 1.8;
    margin-bottom: 20px;
}

.terms-section a {
    color: #0073e6;
    text-decoration: none;
    border-bottom: 1px solid transparent;
    transition: border-bottom 0.3s ease;
}

.terms-section a:hover {
    border-bottom: 1px solid #0073e6;
}

    </style>
</head>

<body>
   
<div id="page" class="main">

<?php 
include("../include/header.php");
?>
   

  <?php 
      $query="SELECT * FROM pages WHERE name='policy'";
      $data=mysqli_query($con,$query);
      if($row=mysqli_fetch_assoc($data)){
        
  ?>

   
      <section class="term-heading">
        <div class="container">
            <h1>Terms & Conditions</h1>
            <p>Welcome to our e-commerce platform. Please read our terms and conditions carefully before using our services.</p>
        </div>
    </section>

    <section class="terms-section">
        <div class="container">
            <h2>1. Introduction</h2>
            <p>By accessing or using this website, you agree to be bound by these terms and conditions and all applicable laws and regulations. If you do not agree with any of these terms, you are prohibited from using or accessing this site.</p>

            <h2>2. User Agreement</h2>
            <p>As a user of this website, you agree to provide accurate information during registration and ensure that your account details are kept confidential. You are responsible for all activities that occur under your account.</p>

            <h2>3. Intellectual Property Rights</h2>
            <p>All materials on this website, including but not limited to text, graphics, code, and software, are the intellectual property of the website owner. You may not use, copy, reproduce, or distribute any content without prior written permission.</p>

            <h2>4. Product Information</h2>
            <p>We strive to provide accurate and up-to-date product descriptions, pricing, and availability. However, errors may occur, and we reserve the right to correct them without prior notice.</p>

            <h2>5. Limitation of Liability</h2>
            <p>In no event shall the website or its owners be liable for any damages arising out of the use or inability to use the materials on this site, even if the website has been notified of the possibility of such damages.</p>

            <h2>6. Changes to Terms</h2>
            <p>We reserve the right to update or modify these terms at any time without prior notice. Please check this page periodically for changes.</p>

            <h2>7. Contact Us</h2>
            <p>If you have any questions about these terms, please feel free to <a href="contact.php">contact us</a>.</p>
        </div>
    </section>

<?php 
 }

include("../include/footer.php");

?>

   
</div>
<script>
    // Function to toggle terms sections
function toggleSection(sectionId) {
    let content = document.getElementById(sectionId);
    let arrow = content.previousElementSibling.querySelector('.arrow');
    
    if (content.style.display === "block") {
        content.style.display = "none";
        arrow.innerHTML = "&#x25BC;";  // Down arrow
    } else {
        content.style.display = "block";
        arrow.innerHTML = "&#x25B2;";  // Up arrow
    }
}
</script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>