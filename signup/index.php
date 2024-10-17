<?php
  include("../connection/db.php");

  function encrypt($pass){
    $key='dO$it$if$%YoU#CaN$i+am+Sanjay@#$kumar$#@thewebdeveloper;';
    $chiper="AES-128-CTR";
    $options=0;
    $iv=2106526448276549;
    $pass=openssl_encrypt($pass,$chiper,$key,$options,$iv);
    return $pass;
  }


  if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['password'];

    $epass=encrypt($pass);

    $check_query = "SELECT * FROM users WHERE mail = '$mail' OR mobile='$mobile'";
    $check_result = mysqli_query($con, $check_query);
    
    if(mysqli_num_rows($check_result) > 0){
      echo "<script>alert('This E-mail already taken. Please use a different E-mail.')</script>";
    }
   else{
       $que = "insert into users(name,mail,mobile,password) values ('$name','$mail','$mobile','$epass')";
    $query = mysqli_query($con,$que);

    if ($query) {
      header('location:../login');
    }
    else {
      echo "<script>alert('Something Went Wrong')</script>";      
    }
    
  }
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup-DotStore</title>
	<link rel="stylesheet" type="text/css" href="../css/log.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="main"  id="signup-card">
        <form action="" method="POST">
          <div class="card">
          <div class="logo"><a href="" target="_self"><span class="circle"></span>.Store</a></div>
             <h2>Sign up</h2>
             <label for="username" class="placeholder">Name</label><br>
             <input id="inp" type="text" name="name" required/>
             <br>
             <label for="mail" class="placeholder">Email</label><br>
             <input id="inp" type="email" name="mail" required/>
             <br>
             <label for="mobile" class="placeholder">Mobile Number</label><br>
             <input id="inp" type="text" name="mobile" required/>
             <br>
             <label for="password" class="placeholder">Password</label><br>
             <input id="inp" type="password" name="password" required/>
             <br>
             <a href="../login">Already have a account then login.</a><br>

             <input type="submit" id="btn" value="sign up" name="submit">
               <div class="signup">
                      <p>or signup using</p>
                      <a href="#"  id="facebook"class='bx bxl-facebook-circle'></a>
                      <a href="#" id="twitter" class='bx bxl-twitter'></a>
                      <a href="#" id="google" class='bx bxl-google'></a>
                </div>
          </div>
        </form>
    </div>
    
</body>
<script>
  //TO NOT SEE RESUBMIT FORM NOTIFICATION
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>