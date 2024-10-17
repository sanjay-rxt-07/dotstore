<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dot-Store-FAQ</title>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let titles = ["Dot Store-FAQ", "Dot Store-Get your answers here"]; // Array of titles
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
       .terms-container {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 20px;
}

.terms-section {
    margin-bottom: 20px;
}

.section-heading {
    background-color: #f4f4f4;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.section-heading:hover {
    background-color: #e2e2e2;
}

.section-content {
    display: none;
    padding: 10px;
    background-color: #fafafa;
    border-left: 4px solid #333;
}

.arrow {
    font-size: 1.2rem;
}
@media screen and (max-width: 768px) {
    .terms-container {
        padding: 0 10px;
    }

    .section-heading {
        font-size: 1.1rem;
    }
}
     </style>
</head>

<body>
   
<div id="page" class="main">

<?php 
  include("../connection/db.php");
include("../include/header.php");
?>
   
   
<section class="terms-container">
        <h2>Frequently Asked Questions</h2>

        <?php 
        
      $query="SELECT * FROM faq";
      $i=0;
      $data=mysqli_query($con,$query);
      while($row=mysqli_fetch_assoc($data)){
        $i++;
        ?>
        <div class="terms-section">
            <h3 class="section-heading" onclick="toggleSection('section<?php echo $row['id'];?>')"><?php echo $i .". ".$row['question'];?><span class="arrow">&#x25BC;</span></h3>
            <div class="section-content" id="section<?php echo $row['id'];?>">
                <p><?php echo $row['answer'];?></p>
            </div>
        </div>

<?php 
 }
?>
 </section>
   
 <?php 
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
</body>

</html>