<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['user_name']) && isset($_SESSION['user_mail'])){
    $userid=$_SESSION['user_id'];
 

// Assuming you have a way to get the current user ID, e.g., from session
// Query to get all orders of the user
$orders_query = "SELECT * FROM orders WHERE user_id = '$userid' ORDER BY order_date DESC";
$orders_result = mysqli_query($con, $orders_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dot-Store Your Orders</title>

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
    .page{
        background-color: white;
    }
</style>
</head>
<body>

<?php 
    include("../include/header.php");
    ?>
    <div class="page">
        <br>
        <br>
        <br>
<div class="container">
    <h2>Your Orders</h2>

    <?php if (mysqli_num_rows($orders_result) > 0): ?>
        <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Order #<?php echo $order['id']; ?> - <?php echo date('F j, Y', strtotime($order['order_date'])); ?></h5>
                    <p>Total: ₹<?php echo $order['total_amount']; ?></p>
                </div>
                <div class="card-body">
                    <h6>Order Details</h6>
                    <p>
                        <strong>Name:</strong> <?php echo $order['first_name'] . ' ' . $order['last_name']; ?><br>
                        <strong>Address:</strong> <?php echo $order['address'] . ', ' . $order['city'] . ', ' . $order['state'] . ' - ' . $order['postcode']; ?><br>
                        <strong>Mobile:</strong> <?php echo $order['mobile']; ?><br>
                        <strong>Email:</strong> <?php echo $order['email']; ?><br>
                    </p>

                    <!-- Fetch order items -->
                    <?php
                    $order_id = $order['id'];
                    $items_query = "SELECT oi.*, p.title FROM order_items oi 
                                    JOIN products p ON oi.product_id = p.id 
                                    WHERE oi.order_id = '$order_id'";
                    $items_result = mysqli_query($con, $items_query);
                    ?>
                    <h6>Items</h6>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($item = mysqli_fetch_assoc($items_result)): ?>
                            <tr>
                                <td><?php echo $item['title']; ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td><?php echo $item['color']; ?></td>
                                <td><?php echo $item['size']; ?></td>
                                <td>₹<?php echo $item['price']; ?></td>
                                <td>₹<?php echo $item['price'] * $item['quantity']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>You have no orders yet.</p>
    <?php endif; ?>
</div>
<br>
<br>
<br>
</div>

<?php 
    include("../include/footer.php");
    ?>

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

</body>
</html>
<?php
}
else{
  header('location:../login');
}
?>  