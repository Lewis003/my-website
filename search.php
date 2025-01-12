<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usersreg';
$port = 3306;

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['search'])) {
    $search = $_GET['search'];

    $sql = "SELECT * FROM recipe_data WHERE title LIKE '%$search%' OR ingredients LIKE '%$search%' OR instructions LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Display matching recipes here
            echo "Title: " . $row["title"] . "<br>";
            // Add other fields as needed
        }
    } else {
        echo "Oops, we couldn't find any matching recipes. <a href='upload.php'>Upload a new recipe</a>";
    }
}
?>
