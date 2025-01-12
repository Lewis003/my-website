<?php
// Establish a database connection using PDO
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usersreg';
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipeTitle = $_POST['recipeTitle'];
    $recipeDescription = $_POST['recipeDescription'];
    $recipeIngredients = $_POST['recipeIngredients'];
    $recipeInstructions = $_POST['recipeInstructions'];

    // Handle image uploads and update file paths in the database
    $imagePaths = [];
    for ($i = 1; $i <= 2; $i++) {
        $imagePath = uploadImage($i);
        if ($imagePath) {
            $imagePaths[] = $imagePath;
        }
    }

    // Check if at least one image was uploaded successfully
    if (count($imagePaths) > 0) {
        // Insert the data into the database
        $query = "INSERT INTO recipe_data (title, description, ingredients, instructions, image1_path, image2_path) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$recipeTitle, $recipeDescription, $recipeIngredients, $recipeInstructions, $imagePaths[0], $imagePaths[1]]);

        // Redirect to the admin panel or a success page
        header('Location: recipes.php');
        exit();
    } else {
        echo "Error uploading images.";
    }
}

function uploadImage($imageNumber) {
    $targetDir = 'C:\xampp\htdocs\projo\uploads\\'; // Adjust the path to your directory
    $targetFile = $targetDir . basename($_FILES["recipeImage{$imageNumber}"]["name"]);
    if (move_uploaded_file($_FILES["recipeImage{$imageNumber}"]["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        return null; // Failed to upload image
    }
}
?>
