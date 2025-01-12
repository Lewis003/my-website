<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    // Check if passwords match
    if ($password !== $cpassword) {
        echo '<script>
                alert("Passwords do not match");
                window.location.href = "recipe.php";
              </script>';
        exit();
    }

    // Check if username already exists
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $count_user = $result->num_rows;
    $stmt->close();

    // Check if email already exists
    $stmt = $conn->prepare("SELECT * FROM signup WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $count_email = $result->num_rows;
    $stmt->close();

    if ($count_user === 0 && $count_email === 0) {
        // Hash the password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO signup (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hash);
        if ($stmt->execute()) {
            header("Location: recipes.php");
            exit();
        } else {
            echo '<script>
                    alert("Error in registration. Please try again.");
                    window.location.href = "registration.php";
                  </script>';
            exit();
        }
    } else {
        if ($count_user > 0) {
            echo '<script>
                    alert("Username already exists!");
                    window.location.href = "registration.php";
                  </script>';
            exit();
        }
        if ($count_email > 0) {
            echo '<script>
                    alert("Email already exists!");
                    window.location.href = "registration.php";
                  </script>';
            exit();
        }
    }
}
?>
