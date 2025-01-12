<?php
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'usersreg';
    $port = 3306;
    
    $conn = new mysqli($host, $username, $password, $database, $port);
    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve and sanitize form data
    $username = htmlspecialchars($_POST['user']);
    $password = htmlspecialchars($_POST['pass']);
    
    // Prepare the query to fetch the stored hash
    $sql = "SELECT * FROM signup WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    if ($stmt->execute()) {
        // Check if a matching user is found
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Compare the hashed password with the stored hash
            if (password_verify($password, $row['password'])) {
                // Authentication successful
                session_start();
                $_SESSION['user'] = $username; // Set a session variable to indicate that the user is logged in.
                header("Location: recipes.php"); // Redirect to a welcome page or any other destination.
                exit();
            } else {
                $errorMessage = 'Invalid username or password.';
            }
        } else {
            $errorMessage = 'Invalid username or password.';
        }
    } else {
        $errorMessage = 'Error: ' . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simply Recipes || Login</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
    <style>
        .error-message {
            color: #ff4d4d;
            background-color: #fdd;
            border: 1px solid #fbb;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
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
    </nav>
    
    <div id="form">
        <h1>Login Form</h1>
        <form name="form" action="userlogin.php" onsubmit="return isvalid()" method="POST">
            <label>Username: </label>
            <input type="text" id="user" name="user"></br></br>
            <label>Password: </label>
            <input type="password" id="pass" name="pass"></br></br>
            <input type="submit" id="btn" value="Login" name="submit"/>
        </form>
        <p>Don't have an account? <a href="registration.php">Register</a></p>
        
        <!-- Display the error message if there is one -->
        <?php if($errorMessage): ?>
            <div class="error-message"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
    </div>

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
