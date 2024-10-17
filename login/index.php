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

    $user_que="select*from users where mail='$username' and password='$epassword'";
    // $admin_que="select*from admin where mail='$username' and password='$password'";
    $chk_user=mysqli_query($con,$user_que);
    // $chk_admin=mysqli_query($con,$admin_que);
    session_start();
    if($user_data=mysqli_fetch_array($chk_user)){
       $_SESSION['user_id'] = $user_data['id'];
       $_SESSION['user_name'] = $user_data['name'];
       $_SESSION['user_mail'] = $user_data['mail'];
       
         header('location:../shop');

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-Dot Store</title>
	<link rel="stylesheet" type="text/css" href="../css/log.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="main">
        <form action="" method="POST">
          <div class="card">
          <div class="logo"><a href="" target="_self"><span class="circle"></span>.Store</a></div>
             <h2>Login</h2>
             <label for="username" class="placeholder">E-Mail Or Mobile</label><br>
             <input id="inp" type="text" name="username" required/>
             <br>
             <label for="password" class="placeholder">Password</label><br>
             <input id="inp" type="password" name="password" required/>
             <br>
             <a href="../shop/forget-password.php" target="__blank">Forget password?</a><br>

             
             <input id="btn" type="submit" value="Login" name="sub" />
               <div class="signup">
                      <p><a href="../signup">or sign up</a></p>
                      <a href="#"  id="facebook"class='bx bxl-facebook-circle'></a>
                      <a href="#" id="twitter" class='bx bxl-twitter'></a>
                      <a href="#" id="google" class='bx bxl-google'></a>
                      <a href="#" id="google" class='bx bxl-telegram'></a>
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