<?php 
    include("userlogin.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Recipes || Starter</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
    <!-- main css -->
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- nav -->
    <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
                <a href="index.php" class="logo">RECIPEHUB</a>
                <!-- links --> 
                <div class="nav-links">
                  <a href="index.php" class="nav-link">Home</a>
                  <a href="about.php" class="nav-link">About</a>
                  <a href="registration.php" class="nav-link">Join</a>
                  <a href="login.php" class="nav-link">Login</a>
                  <a href="upload.php" class="nav-link">Upload</a>
                  <div class="nav-link contact-link">
                      <a href="contact.php" class="btn">Contact</a>
                  </div>
                </div>
            </div>
        </div>
    </nav> <br> <br> <br> <br><br><br><br>
    <!-- end of nav -->
<body>
<div id="form">
            <h1>Login Form</h1>
            <form name="form" action="userlogin.php" onsubmit="return isvalid()" method="POST">
                <label>Username: </label>
                <input type="text" id="user" name="user"></br></br>
                <label>Password: </label>
                <input type="password" id="pass" name="pass"></br></br>
                <input type="submit" id="btn" value="Login" name = "submit"/>
            </form>
            <p>Dont have an account? <a href="registration.php">Register</a></p>
        </div>
        <div id="error-message" class="alert-message"></div>

        <script>
            function isvalid(){
                var user = document.form.user.value;
                var pass = document.form.pass.value;
                if(user.length=="" && pass.length==""){
                    alert(" Username and password field is empty!!!");
                    return false;
                }
                else if(user.length==""){
                    alert(" Username field is empty!!!");
                    return false;
                }
                else if(pass.length==""){
                    alert(" Password field is empty!!!");
                    return false;
                }
                
            }
        </script>
    </body>
</html>