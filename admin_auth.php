<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered username and password
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    
$adminUsername = 'Admin';
$adminPasswordHash = '$2y$10$.3vcNm/YOSvKtpWYX.2j2e4Y9L.7wWAz6IpkqgTu.QK1GpTvQF0cm';

    // Check if the entered username and password match the admin's credentials
    if ($enteredUsername === $adminUsername && password_verify($enteredPassword, $adminPasswordHash)) {
        // Authentication successful
        $_SESSION['admin'] = true;
        header('Location: admin_panel.php'); // Redirect to the admin panel
        exit();
    } else {
        // Authentication failed
        $_SESSION['login_error'] = 'Invalid credentials';
        header('Location: admin_login.php'); // Redirect back to the login page
        exit();
    }
} else {
    // If the form wasn't submitted, redirect to the login page
    header('Location: admin_login.php');
    exit();
}
 