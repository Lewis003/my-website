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
        } else {
            echo "Error uploading the file.";
           
        }
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload || RecipeHub</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- normalize -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- custom css for upload page -->
    <link rel="stylesheet" href="./css/upload.css" />
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
</head>
<body>
    <!-- nav -->
    <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
                <a href="index.php" class="logo">RECIPEHUB</a>
                <!-- links --> 
                <div class="nav-links">
                    <a href="index.php" class="nav-link">Home</a>
                    <a href="about.php" class="nav-link">About</a>
                    <a href="upload.php" class="nav-link">Upload</a>
                    <div class="nav-link contact-link">
                        <a href="contact.php" class="btn">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav> <br> <br> <br> <br><br><br><br>

<!-- Upload section -->
<section class="upload-section">
    <div class="upload-container">
        <h2>Submit your recipe to Recipehub!</h2>
        <p>RecipeHub is looking for new recipes and wants to feature YOURS on our website! Got a recipe that's been passed down in the family? A new recipe you came up with?</p>
         
        <div class="recipe-details">
            <h3>Recipe Details</h3>
            <form id="upload-form" enctype="multipart/form-data" action="process_upload.php" method="POST">
                <label for="recipe-title">Recipe Title *</label>
                <input type="text" id="recipe-title" name="recipe-title" required>
                
                <label for="num-servings">Number of Servings *</label>
                <input type="number" id="num-servings" name="num-servings" required>
                
                <label for="recipe-ingredients">Ingredients *</label>
                <textarea id="recipe-ingredients" name="recipe-ingredients" placeholder="Please put each ingredient and its measurement on its own line." required></textarea>
                
                <label for="recipe-directions">Directions *</label>
                <textarea id="recipe-directions" name="recipe-directions" placeholder="Please put each step on its own line." required></textarea>
                
                <label for="recipe-image">Upload the photo you took of the dish *</label>
                <input type="file" id="recipe-image" name="recipe-image" accept="image/png, image/jpeg" required>
                
                <p class="photo-guidelines">Photo Guidelines:</p>
                <ul class="do-dont-list">
                    <li class="do">Landscape (horizontal) photos</li>
                    <li class="do">Photos including your dish</li>
                    <li class="dont">No portrait (vertical) photos</li>
                    <li class="dont">No people or pets in your photo</li>
                    <li class="dont">No personal information (name, age, etc.)</li>
                    <li class="dont">No content that violates our User Agreement</li>
                </ul>
                
                <h3>Recipe Credit</h3>
                <label for="first-name">First Name *</label>
                <input type="text" id="first-name" name="first-name" required>
                
                <label for="last-name">Last Name *</label>
                <input type="text" id="last-name" name="last-name" required>
                
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
                
                <label for="materials-release">I am 18 years of age or older and I have read and agree to the Materials Release *</label>
                <input type="checkbox" id="materials-release" name="materials-release" required>
                
                <button type="submit" class="btn">Submit your recipe</button>
            </form>
        </div>
    </div>
</section>

    <script src="js/app.js"></script>
</body>
</html> 
