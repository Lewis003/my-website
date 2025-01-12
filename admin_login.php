<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>
<body>
     <!-- nav -->
     <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
                <a href="index.php" class="logo">RECIPEHUB</a>             
        </div>
    </nav> <br> <br> <br>
    <!-- end of nav -->

    <div class="centered-form">
        <h2>Admin Login</h2>
        <form method="post" action="admin_auth.php">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

            <button type="submit">Login</button>
        </form>
        <p>Go back home? <a href="index.php">Home</a></p>
    </div>
    
</body>
</html>
