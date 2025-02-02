<?php
if (isset($_POST["submit"])) {
    // Validate inputs
    $username = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Check if any field is empty
    if (empty($username) || empty($email) || empty($phone) || empty($message)) {
        echo "<script>alert('All fields are required.');</script>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Please enter a valid email address.');</script>";
    } else {
        // Prepare the email content
        $to = "muindilewis@zetech.ac.ke";
        $subject = "Contact Form Submission from {$username}";
        
        // Email message with HTML formatting
        $email_message = "
        <html>
        <head>
            <title>Contact Form Submission</title>
        </head>
        <body>
            <h2>You have a new contact form submission</h2>
            <p><strong>Name:</strong> {$username}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        </body>
        </html>";

        // Headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: ' . $email . "\r\n";

        // Send email
        $mail = mail($to, $subject, $email_message, $headers);

        if ($mail) {
            echo "<script>alert('Mail sent successfully!');</script>";
        } else {
            echo "<script>alert('Mail not sent. Please try again later.');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <<link rel="stylesheet" href="contact.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-center">
            <div class="nav-header">
                <a href="index.php" class="logo">RECIPEHUB</a>
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
    </nav> <br><br><br>
    
    <!-- Contact Form Section -->
    <section id="contact" class="contact text-center">

<div class="container">

  <div class="section-title"> 
    <h2>Contact</h2>
    <p>Contact Me</p>
  </div>

  <div class="row mt-2">

    <div class="col-md-6">
      <div class="info-box">
        <i class="bx bx-map"></i>
        <h3>My Address</h3>
        <p>Nairobi, Kenya</p>
      </div>
    </div>

    <div class="col-md-3">
      <div class="info-box">
        <i class="bx bx-envelope"></i>
        <h3>Email Me</h3>
        <p>lewissilamd@gmail.com</p>
      </div>
    </div>

    <div class="col-md-3">
      <div class="info-box">
        <i class="bx bx-phone-call"></i>
        <h3>Call Me</h3>
        <p>+254 113 361 407</p>
      </div>
    </div>

  </div>

  <div class="row mt-5 justify-content-center">

    <div class="col-lg-8">

      <form action="forms/contact.php" method="post" role="form" class="php-email-form">
        <div class="row">

          <div class="col-md-6 form-group">
            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
          </div>

          <div class="col-md-6 form-group mt-3 mt-md-0">
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
          </div>

        </div>

        <div class="form-group mt-3">
          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>

        <div class="form-group mt-3">
          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
      </form>

    </div>

  </div>

</div>
</section>


    <script src="app.js"></script>
</body>
</html>

