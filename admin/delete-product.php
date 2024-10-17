<?php 
include("../connection/db.php");

if(isset($_GET['image'])){
    $id=$_GET['image'];
    $product=$_GET['product'];

    try {
        $query = "DELETE FROM product_image WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'edit-product.php?id=<?php echo $product;?>';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}

if(isset($_GET['color'])){
    $id=$_GET['color'];
    $product=$_GET['product'];

    try {
        $query = "DELETE FROM product_color WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'edit-product.php?id=<?php echo $product;?>';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}

if(isset($_GET['size'])){
    $id=$_GET['size'];
    $product=$_GET['product'];

    try {
        $query = "DELETE FROM product_size WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'edit-product.php?id=<?php echo $product;?>';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}

if(isset($_GET['product'])){
    $id=$_GET['product'];
    try {
        $query = "DELETE FROM products WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'manage-product.php';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}


if(isset($_GET['slider'])){
    $id=$_GET['slider'];
    try {
        $query = "DELETE FROM slider WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'manage-slider.php';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}


if(isset($_GET['slider2'])){
    $id=$_GET['slider2'];
    try {
        $query = "DELETE FROM slider2 WHERE id = '$id'";
    
    $add_query = $con->query($query);
    
    if ($add_query == true) {
        echo "Form submitted successfully";
        ?>
        <script>window.location.href = 'manage-slider.php';</script>
        <?php
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
}




if(isset($_GET['faq'])){
    $id=$_GET['faq'];
    try {
        $query = "DELETE FROM faq WHERE id = '$id'";
    
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

?>