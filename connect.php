<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Send email (example using PHP's mail function)
    $to = "your_email@example.com";  // Replace with your email
    $headers = "From: $email";

    if(mail($to, $subject, $message, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Message failed to send.";
    }
}
?>
