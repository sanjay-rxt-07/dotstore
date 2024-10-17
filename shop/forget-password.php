<?php
include("../connection/db.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dot-Store Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        .message {
            margin-top: 20px;
            font-size: 16px;
            color: green;
            display: none;
        }
        #message2,#message3{
            color:red;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Forgot Password</h2>
        <form method="POST" id="confirmation-form">
        <p>Confirm your email address and password to reset your password.</p>
        <div class="form-group">
            <input type="email" id="email" name="mail" placeholder="Enter your email" required>
        </div>

        <div class="form-group">
            <input type="password" id="" name="password" placeholder="Enter your current password" required>
        </div>
        <button type="submit" name="varify" >Verify</button>
        </form>

        <div class="message" id="message1"><b>Verified.</b>
            <form method="POST">
           <div class="form-group">
               <input type="password" id="" name="newpass1" placeholder="Enter your new password" required>
               <br>
               <br>
               <input type="password" id="" name="newpass2" placeholder="Re-enter your new password" required>
           </div>
        <button type="submit" name="change-password" >Change password</button>
        </form>
        </div>

        <div class="message" id="message2">Your email or password does not match.</div>
        <div class="message" id="message3">Passwords do not match! Please enter the same passwords.</div>
    </div>

    <?php 

function encrypt($pass){
    $key='dO$it$if$%YoU#CaN$i+am+Sanjay@#$kumar$#@thewebdeveloper;';
    $chiper="AES-128-CTR";
    $options=0;
    $iv=2106526448276549;
    $pass=openssl_encrypt($pass,$chiper,$key,$options,$iv);
    return $pass;
  }

    if(isset($_POST['varify'])){
      $mail=$_POST['mail'];
      $password=$_POST['password'];
$epass=encrypt($password);

$user_que="select*from users where mail='$mail' and password='$epass'";
$chk_user=mysqli_query($con,$user_que);
if($user_data=mysqli_fetch_array($chk_user)){
    $_SESSION['userid'] = $user_data['id'];
   ?>
   <script>
            document.getElementById("message1").style.display = "block";
            document.getElementById("confirmation-form").style.display = "none";
    </script>
   <?php
}else{
    ?>
    <script>
             document.getElementById("message2").style.display = "block";
     </script>
    <?php
}
    }

   if(isset($_POST['change-password'])) {
            $newpass1 = $_POST['newpass1'];
            $newpass2 = $_POST['newpass2'];
            $userid=$_SESSION['userid'];
            // Check if both passwords match
            if ($newpass1 !== $newpass2) {
                ?>
                <script>
                         document.getElementById("message3").style.display = "block";
                 </script>
                <?php

            } else {
               $newpass=encrypt($newpass2);
               $query="UPDATE users SET password='$newpass' WHERE id ='$userid'";
               $update=mysqli_query($con,$query);
               ?>
                 <script>
                     alert("Your Password changed.");
                 </script>
               <?php
            }
   }
    ?>

    
<script>
  //TO NOT SEE RESUBMIT FORM NOTIFICATION
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>
</html>
