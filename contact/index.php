<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DotStore-Contact</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let titles = ["DotStore-Contact", "DotStore-let's Connect"]; // Array of titles
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
    <!-- <script src="../js/index.js"></script> -->
</head>

<body>
   
<div id="page" class="main">

<?php 
include("../include/header.php");
?>
   

  <?php 
      include("../connection/db.php");

      $query="SELECT * FROM pages WHERE name='about'";
      $data=mysqli_query($con,$query);
      if($row=mysqli_fetch_assoc($data)){
        
  ?>

   
<?php 
 }
?>

   
</div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>