<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process text input fields
    $recipeTitle = $_POST['recipe-title'];
    $servings = $_POST['num-servings'];
    $ingredients = $_POST['recipe-ingredients'];
    $directions = $_POST['recipe-directions'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];

    // Handle file upload
    if (isset($_FILES['recipe-image'])) {
        $uploadDirectory = "uploads/"; // Specify your upload directory
        $targetFile = $uploadDirectory . basename($_FILES['recipe-image']['name']);

        if (move_uploaded_file($_FILES['recipe-image']['tmp_name'], $targetFile)) {
            // File upload successful, continue processing
            
            // Database connection
            $host = 'localhost';
            $dbname = 'recipehub';
            $username = 'root';  // Replace with your MySQL username
            $password = '';  // Replace with your MySQL password
            
            try {
                // Establish connection to the database
                $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Prepare SQL query to insert data into the recipes table
                $sql = "INSERT INTO recipes (recipe_title, num_servings, ingredients, directions, recipe_image, first_name, last_name, email, materials_release) 
                        VALUES (:recipe_title, :num_servings, :ingredients, :directions, :recipe_image, :first_name, :last_name, :email, :materials_release)";
                
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':recipe_title' => $recipeTitle,
                    ':num_servings' => $servings,
                    ':ingredients' => $ingredients,
                    ':directions' => $directions,
                    ':recipe_image' => $targetFile,
                    ':first_name' => $firstName,
                    ':last_name' => $lastName,
                    ':email' => $email,
                    ':materials_release' => isset($_POST['materials-release']) ? 1 : 0
                ]);
                
                // Redirect to the celebration page
                header("Location: celebration.html");
                exit();
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "Error uploading the file.";
        }
    }
}
?>
