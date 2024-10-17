<?php
include("../connection/db.php");
session_start();
if(isset($_SESSION['admin_name']) && isset($_SESSION['admin_mail'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin Panel-Manage-Products</title>
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


    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
        <SCRIPT type="text/javascript">
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
 
            var colCount = table.rows[0].cells.length;
 
            for(var i=0; i<colCount; i++) {
 
                var newcell = row.insertCell(i);
 
                newcell.innerHTML = table.rows[0].cells[i].innerHTML;
                //alert(newcell.childNodes);
                switch(newcell.childNodes[0].type) {
                    case "text":
                            newcell.childNodes[0].value = "";
                            break;
                    case "checkbox":
                            newcell.childNodes[0].checked = false;
                            break;
                    case "select-one":
                            newcell.childNodes[0].selectedIndex = 0;
                            break;
                }
            }
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    if(rowCount <= 1) {
                        alert("Cannot delete all the rows.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 

        function addRow2(tableID) {
 
 var table = document.getElementById(tableID);

 var rowCount = table.rows.length;
 var row = table.insertRow(rowCount);

 var colCount = table.rows[0].cells.length;

 for(var i=0; i<colCount; i++) {

     var newcell = row.insertCell(i);

     newcell.innerHTML = table.rows[0].cells[i].innerHTML;
     //alert(newcell.childNodes);
     switch(newcell.childNodes[0].type) {
         case "text":
                 newcell.childNodes[0].value = "";
                 break;
         case "checkbox":
                 newcell.childNodes[0].checked = false;
                 break;
         case "select-one":
                 newcell.childNodes[0].selectedIndex = 0;
                 break;
     }
 }
}

function deleteRow2(tableID) {
 try {
 var table = document.getElementById(tableID);
 var rowCount = table.rows.length;

 for(var i=0; i<rowCount; i++) {
     var row = table.rows[i];
     var chkbox = row.cells[0].childNodes[0];
     if(null != chkbox && true == chkbox.checked) {
         if(rowCount <= 1) {
             alert("Cannot delete all the rows.");
             break;
         }
         table.deleteRow(i);
         rowCount--;
         i--;
     }


 }
 }catch(e) {
     alert(e);
 }
}

    </SCRIPT>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        
     
    <?php 
    include ("include/header.php");
    // include ("include/dbconn.php");
    ?>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-12 ">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Add Products</h6>

                            <?php
   
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
if(isset($_POST['submit'])){
    // Function to sanitize input data
    function sanitizeInput($data) {
        return htmlspecialchars(strip_tags(trim($data)));
    }
    
    // Collect form data
    $title = sanitizeInput($_POST['title']);
    // echo $movieTitle;
    $name = sanitizeInput($_POST['name']);
    $model = sanitizeInput($_POST['model']);
    $mrp = sanitizeInput($_POST['mrp']);
    $price = sanitizeInput($_POST['price']);
    $description = $_POST['description'];
    $details = $_POST['details'];
    $category = sanitizeInput($_POST['category']);
    $subcategory = sanitizeInput($_POST['subcategory']);
    $sub2category = sanitizeInput($_POST['2subcategory']);
    $meta_title = sanitizeInput($_POST['meta_title']);
    $meta_description = sanitizeInput($_POST['meta_description']);

  
    // Insert data into the database
    try {
        $query="insert into products (title,name,category,subcategory,2subcategory,model,mrp,price,description,detail,meta_title,meta_description) value ('$title','$name','$category','$subcategory','$sub2category','$model','$mrp','$price','$description','$details','$meta_title','$meta_description')";
        
$add_query = $con->query($query);
$last_insert_id = $con->insert_id;


    if($query==true){
     echo "form submit";

     if (isset($_FILES['images'])) {
        $targetDir = "uploads/product/";  // Define your upload directory
        foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
            $fileName = basename($_FILES['images']['name'][$key]);
            $targetFilePath = $targetDir . $fileName;
            move_uploaded_file($tmpName, $targetFilePath);
            
            $imgquery="insert into product_image (name,product) value ('$targetFilePath','$last_insert_id')";
            $add_query = $con->query($imgquery);
        }
    }

    if (isset($_POST['size'])) {
        foreach ($_POST['size'] as $key) {
            $sizequery="insert into product_size (name,product) value ('$key','$last_insert_id')";
            $add_query = $con->query($sizequery);
        }
    }

    if (isset($_POST['color'])) {
        foreach ($_POST['color'] as $key) {
            $sizequery="insert into product_color (name,product) value ('$key','$last_insert_id')";
            $add_query = $con->query($sizequery);
        }
    }

        ?>
        <script>window.location.href ='add-product.php'; </script>
        <?php
    }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
  }
}
?>


                            <form  method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="movie-title" class="col-sm-2 col-form-label">Product Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">Select Main Category</label>
    <div class="col-sm-10">
        <select class="form-select mb-3" aria-label="Default select example" name="category" id="main_category" required>
            <?php
            $maincate_query = "SELECT * FROM category";
            $maincate = mysqli_query($con, $maincate_query);
            while ($row = mysqli_fetch_assoc($maincate)) {
            ?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
            <?php } ?>
        </select>
    </div>
</div>

<div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">Sub Category</label>
    <div class="col-sm-10">
        <select class="form-select mb-3" aria-label="Default select example" name="subcategory" id="sub_category" required>
            <option value="Not Selected">Select Subcategory</option>
        </select>
    </div>
</div>
<!-- jQuery (for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#main_category').change(function () {
            var mainCategoryId = $(this).val();
            
            // AJAX request
            $.ajax({
                url: 'get_subcategories.php',
                type: 'POST',
                data: { mainCategoryId: mainCategoryId },
                success: function (response) {
                    // Clear and populate the subcategory select field
                    $('#sub_category').html(response);
                }
            });
        });
    });
</script>

<div class="row mb-3">
    <label for="genre" class="col-sm-2 col-form-label">2 Sub Category</label>
    <div class="col-sm-10">
        <select class="form-select mb-3" aria-label="Default select example" name="2subcategory" id="2sub_category" required>
            <option value="Not Selected">Select 2 Subcategory</option>
        </select>
    </div>
</div>
<!-- jQuery (for AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#sub_category').change(function () {
            var mainCategoryId = $(this).val();
            
            // AJAX request
            $.ajax({
                url: 'get_2subcategories.php',
                type: 'POST',
                data: { mainCategoryId: mainCategoryId },
                success: function (response) {
                    // Clear and populate the subcategory select field
                    $('#2sub_category').html(response);
                }
            });
        });
    });
</script>

                                <div class="row mb-3">
                                    <label for="model" class="col-sm-2 col-form-label">Product Model</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="model" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="mrp" class="col-sm-2 col-form-label">Product MRP</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="mrp" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="price" class="col-sm-2 col-form-label">Product Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="price" required>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Product Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" required id="brief"></textarea>
                                    </div>
                                </div>

                            <script type="text/javascript">
			                CKEDITOR.replace( 'brief');			
			                </script>
       
      
                                <div class="row mb-3">
                                    <label for="details" class="col-sm-2 col-form-label">Product Details</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="details" required id="brief2"></textarea>
                                    </div>
                                </div>

                            <script type="text/javascript">
			                CKEDITOR.replace( 'brief2');			
			                </script>
       
      

                                 <div class="row mb-3">
                                    <label for="images" class="col-sm-2 col-form-label">Product Images</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple required>
                                    </div>
                                </div>


                                <div class="form-group">
      <label class="control-label col-sm-6" >Size</label>
      
    </div>
    <div class="col-sm-12">
			   <INPUT type="button" value="Add More" class="btn btn-primary" onClick="addRow('dataTable')" />
               <INPUT type="button" value="Remove" class="btn btn-primary" onClick="deleteRow('dataTable')" /><br><br>
			     <table id="dataTable" width="100%" cellpadding="0" cellpadding="0">
			    <TR>
            <TD><INPUT type="checkbox" name="chk[]"/></TD>
            <td><input  type="text" name="size[]" placeholder="Write your Product Size" class="form-control"/></td>            
        </TR>
    </TABLE>
		<br><br>	   
      </div>
            

      <div class="form-group">
      <label class="control-label col-sm-6" >Color</label>
      
    </div>
    <div class="col-sm-12">
        
			   
			   <INPUT type="button" value="Add More" class="btn btn-primary" onClick="addRow2('dataTable2')" />
               <INPUT type="button" value="Remove" class="btn btn-primary" onClick="deleteRow2('dataTable2')" /><br><br>
			     <table id="dataTable2" width="100%" cellpadding="0" cellpadding="0">
			    <TR>
            <TD><INPUT type="checkbox" name="chk[]"/></TD>
            <td><input  type="text" name="color[]" placeholder="Write your Product Color" class="form-control"/></td>            
        </TR>
    </TABLE>
		<br><br>	   
      </div>


                               <div class="row mb-3">
                                    <label for="meta_title" class="col-sm-2 col-form-label">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="meta_title" required>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="meta_description" class="col-sm-2 col-form-label">Meta Description</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="meta_description" required>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
            </div>
          


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Dot Store</a>, All Right Reserved. 
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
    <script>
      $(function() {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
        CKEDITOR.replace('editor3');
        CKEDITOR.replace('editor4');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
</body>

</html>
<?php
}
else{
  header('location:login.php');
}
?>  