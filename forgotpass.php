<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset</title>
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <!-- nav -->
    <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
                <a href="index.html" class="logo">RECIPEHUB</a>
                <!-- links --> 
                <div class="nav-links">
                    <a href="index.php" class="nav-link">Home</a>
                   
                    </div>
                </div>
            </div>
        </div>
    </nav> <br> <br> <br> <br><br><br><br>
   
  
  <form id="forgotPasswordForm" onsubmit="sendResetEmail(); return false;">
    <label for="email">Enter your email:</label>
    <input type="email" id="email" required>
    <button type="submit">Submit</button>
  </form>
  <script src="js/app.js"></script>
</body>
</html>
