<?php 
    include("connection.php");
    include("signup.php")
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RLogin</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- normalize -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font-awesome -->
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <!-- main css -->
    <link rel="stylesheet" href="reg.css">
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
  </nav> <br> <br> <br> <br> <br> <br> <br> <br>
  <!-- end of nav -->
  <body>
  <div id="form">
            <h1 id="heading">SignUp Form</h1><br>
            <form name="form" action="signup.php" method="POST">
                <i class="fa fa-user fa-lg"></i>
                <input type="text" id="user" name="user" placeholder="Enter Username" required></br></br>
                <i class="fa-solid fa-envelope fa-lg"></i>
                <input type="email" id="email" name="email" placeholder="Enter Email" required></br></br>
                <i class="fa-solid fa-lock fa-lg"></i>
                <input type="password" id="pass" name="pass" placeholder="Create Password" required></br></br>
                <i class="fa-solid fa-lock fa-lg"></i>
                <input type="password" id="cpass" name="cpass" placeholder="Retype Password" required></br></br>
                <input type="submit" id="btn" value="SignUp" name = "submit"/>
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
    <script src="js/app.js"></script>
  </body>
</html>

