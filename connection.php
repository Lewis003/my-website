<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usersreg';
$port = 3306;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

echo '';
?>
