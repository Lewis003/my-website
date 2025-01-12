<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Recipes || HUB</title>
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
    <script src="https://kit.fontawesome.com/ba69845a03.js" crossorigin="anonymous"></script>
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
                    <a href="recipes.php" class="nav-link">Recipe</a>          
                </div>
            </div>
        </div>
    </nav> <br> <br> <br>
    <!-- end of nav -->
    <form action="process_recipe.php" method="post" enctype="multipart/form-data">
    <label for="recipeTitle">Recipe Title:</label>
    <input type="text" id="recipeTitle" name="recipeTitle" required>

    <label for="recipeDescription">Description:</label>
    <textarea id="recipeDescription" name="recipeDescription" required></textarea>

    <label for="recipeIngredients">Ingredients:</label>
    <textarea id="recipeIngredients" name="recipeIngredients" required></textarea>

    <label for="recipeInstructions">Instructions:</label>
    <textarea id="recipeInstructions" name="recipeInstructions" required></textarea>

    <label for="recipeImage1">Upload Image 1:</label>
    <input type="file" id="recipeImage1" name="recipeImage1" accept="image/*" required>
    <label for="recipeImage2">Upload Image 2:</label>
    <input type="file" id="recipeImage2" name="recipeImage2" accept="image/*" required>

    <button type="submit">Upload Recipe</button>
</form>
