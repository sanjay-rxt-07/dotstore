<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-DotStore-Orders</title>
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
    $orders_query = "SELECT * FROM orders ORDER BY order_date DESC";
    $orders_result = mysqli_query($con, $orders_query); 
    ?>
          
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">All Orders</h6>
                    </div>
                    <div class="table-responsive">
                    <?php if (mysqli_num_rows($orders_result) > 0): ?>
        <?php while ($order = mysqli_fetch_assoc($orders_result)): ?>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Order #<?php echo $order['id']; ?> - <?php echo date('F j, Y H:i:s', strtotime($order['order_date'])); ?></h5>
                    <p><strong>User:</strong> <?php echo $order['first_name'] . ' ' . $order['last_name']; ?> (ID: <?php echo $order['user_id']; ?>)</p>
                    <p><strong>Total:</strong> ₹<?php echo $order['total_amount']; ?></p>
                </div>
                <div class="card-body">
                    <h6>Order Details</h6>
                    <p>
                        <strong>Name:</strong> <?php echo $order['first_name'] . ' ' . $order['last_name']; ?><br>
                        <strong>Address:</strong> <?php echo $order['address'] . ', ' . $order['city'] . ', ' . $order['state'] . ' - ' . $order['postcode'].'('.$order['country'].')'; ?><br>
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
                                <td><a href="../shop/product-detail.php?item=<?php echo $item['product_id']; ?>"><?php echo $item['title']; ?></a></td>
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
        <p>No orders found.</p>
    <?php endif; ?>

                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


            <!-- Widgets Start -->
           
            <!-- Widgets End -->


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