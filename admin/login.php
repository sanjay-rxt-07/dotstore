<?php
include("../connection/db.php");

  function dencrypt($pass){
    $key='dO$it$if$%YoU#CaN$i+am+Sanjay@#$kumar$#@thewebdeveloper;';
    $chiper="AES-128-CTR";
    $options=0;
    $iv=2106526448276549;
    $pass=openssl_decrypt($pass,$chiper,$key,$options,$iv);
    return $pass;
  }

  function encrypt($pass){
    $key='dO$it$if$%YoU#CaN$i+am+Sanjay@#$kumar$#@thewebdeveloper;';
    $chiper="AES-128-CTR";
    $options=0;
    $iv=2106526448276549;
    $pass=openssl_encrypt($pass,$chiper,$key,$options,$iv);
    return $pass;
  }

 if(isset($_REQUEST['sub'])){
    $username=$_POST['username'];
    $pass=$_POST['password'];

    $epassword=encrypt($pass);

    $user_que="select*from admin where mail='$username' and password='$epassword'";
    // $admin_que="select*from admin where mail='$username' and password='$password'";
    $chk_user=mysqli_query($con,$user_que);
    // $chk_admin=mysqli_query($con,$admin_que);
    session_start();
    if($user_data=mysqli_fetch_array($chk_user)){
       $_SESSION['admin_id'] = $user_data['id'];
       $_SESSION['admin_name'] = $user_data['name'];
       $_SESSION['admin_mail'] = $user_data['mail'];
       
         header('location:index.php');

    }
    // elseif($admin_data=mysqli_fetch_array($chk_admin)){
    //   $_SESSION['adminname']=$admin_data['Name'];
    //   $_SESSION['adminMail']=$admin_data['Mail'];
    //       header('location:admin.php');
    // }
    else{
      echo "<script>alert('your username or password is wrong.')</script>";      
    }

 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin-Login-DotStore</title>
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

    <style>
        .logo{
    padding: 20px;
    text-align: center;
    font-size: 40px;
}
.logo .circle{
    position: absolute;
    width: 48px;
    height: 48px;
    border-radius: 50% 100% ;
    background-color:#794afa;
    opacity: 0.4;
    z-index: 1;
}

    </style>
</head>

<body>

<form method="POST">
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
         
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            
                                <!-- <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3> -->
                            <div class="logo"><a href="" target="_self"><span class="circle"></span>.Store</a></div>

                            
                            <h4>Log In</h4>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="username" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="">Forgot Password</a>
                        </div>
                        <button type="submit" name="sub" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                    </div>
                </div>
            </div>
        </div>
               <!-- Sign In End -->
    </div>

    </form>
 
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