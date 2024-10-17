<?php
include("../connection/db.php");
session_start();

if (isset($_SESSION['user_name']) && isset($_SESSION['user_mail'])) {
    $userid = $_SESSION['user_id'];

    // Query to fetch user details from the database
    $user_query = "SELECT * FROM users WHERE id = '$userid'";
    $user_result = mysqli_query($con, $user_query);

    if ($user = mysqli_fetch_assoc($user_result)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dot-Store-Account Information</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .account-class {
            max-width: 1000px;
            margin: 50px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
        }

        .image-section {
            flex: 1 1 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .image-section img {
            max-width: 100%;
            border-radius: 50%;
        }

        .details-section {
            flex: 2 1 600px;
            padding: 20px;
        }

        .details-section h2 {
            margin-bottom: 20px;
        }

        .details-section p {
            margin: 10px 0;
            font-size: 18px;
        }

        .details-section button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .details-section button:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .image-section {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<?php 
    include("../include/header.php");
?>

<div class="account-page">
<div class="account-class">
        <div class="image-section">
            <img src="https://via.placeholder.com/150" alt="User Image">
        </div>
        <div class="details-section">
            <h2>Account Information</h2>
            <p><strong>Name:</strong><?php echo $user['name'];?></p>
            <p><strong>Email:</strong><?php echo $user['mail'];?></p>
            <p><strong>Phone Number:</strong> <?php echo $user['mobile'];?></p>
            <a href="forget-password.php"><button>Change Password</button></a>
        </div>
    </div>
</div>

<?php 
    include("../include/footer.php");
?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

<?php
    } else {
        echo "<p>Account details not found!</p>";
    }
} else {
    header('location:../login.php');
}
?>
