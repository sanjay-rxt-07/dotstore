<?php
include("../connection/db.php");


if (isset($_POST['mainCategoryId'])) {
    $mainCategoryId = $_POST['mainCategoryId'];
    
    // Fetch subcategories based on the main category ID
    $subcate_query = "SELECT * FROM subcategory WHERE category = $mainCategoryId";
    $subcate_result = mysqli_query($con, $subcate_query);
    
    // Generate subcategory options
    echo '<option value="Not Selected">Select Subcategory</option>';
    while ($row = mysqli_fetch_assoc($subcate_result)) {
        echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
    }
}
?>
