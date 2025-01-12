<?php
// Database connection information
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'usersreg';
$port = 3306;

// Attempt to connect to the database
$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch recipes
$query = "SELECT * FROM recipe_data"; 
$result = $conn->query($query);

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<section class="recipe" id="recipe' . $row['id'] . '">';
            echo '<div class="recipe-container">';
            echo '<div class="recipe-details">';
            echo '<h1 class="recipe-title">' . $row['title'] . '</h1>';
            echo '<p class="recipe-description">' . $row['description'] . '</p>';
            echo '<h2 class="recipe-subtitle">Ingredients:</h2>';
            echo '<ul class="recipe-ingredients">';
            
            // Split ingredients by comma and display as list items
            $ingredients = explode(',', $row['ingredients']);
            foreach ($ingredients as $ingredient) {
                echo '<li>' . trim($ingredient) . '</li>';
            }
            
            echo '</ul>';
            echo '<h2 class="recipe-subtitle">Instructions:</h2>';
            echo '<ol class="recipe-instructions">';
            
            // Split instructions by line breaks and display as list items
            $instructions = explode("\n", $row['instructions']);
            foreach ($instructions as $instruction) {
                echo '<li>' . trim($instruction) . '</li>';
            }
            
            echo '</ol>';
            
            if ($row['image1_path']) {
              echo '<div class="recipe-image">';
              echo '<img src="' . $row['image1_path'] . '" alt="Recipe Image" class="Recipe Image">';
              echo '</div>';
          }
          if ($row['image2_path']) {
              echo '<div class="recipe-image">';
              echo '<img src="' . $row['image2_path'] . '" alt="Recipe Image" class="Recipe Image">';
              echo '</div>';
          }
          
            echo '</section>';
        }
    } else {
        echo "No recipes found.";
    }
} else {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recipes || Final</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
    <!-- main css -->
    <link rel="stylesheet" href="recipes.css">
    <link rel="icon" type="image/x-icon" href="assets/logo.png">
  </head>
  <body>
      <!-- nav -->
      <nav class="navbar">
        <div class="nav-center">
            <!-- header -->
            <div class="nav-header">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Search for recipes...">
                <button id="search-button">Search</button>
            </div>
                 <!-- Search Bar -->

                <!-- links --> 
                <div class="nav-links">
                    <a href="index.php" class="nav-link">Home</a>
                    <a href="about.php" class="nav-link">About</a>
                    <a href="recipes.php" class="nav-link">Recipes</a>
                    <a href="upload.php" class="nav-link">Upload</a>
                    <div class="nav-link contact-link">
                        <a href="contact.php" class="btn">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </nav> 
    <!-- end of nav -->
        <!-- recipes list -->
      <section class="recipe" id="recipe1">
        <div class="recipe-container">
          <div class="recipe-details">
            <h1 class="recipe-title"> Matoke </h1>
            <p class="recipe-description">
              This delicious one-pot recipe combines matoke plantains with beef, bone marrow, potatoes, carrots, and spring onions for a hearty and flavorful meal.
            </p>
            <h2 class="recipe-subtitle">Ingredients:</h2>
            <ul class="recipe-ingredients">
              <li>2 lbs beef, cut into chunks</li>
              <li>4-6 beef bone marrow pieces</li>
              <li>4-6 medium-sized potatoes, peeled and halved</li>
              <li>4-6 matoke plantains, peeled and halved</li>
              <li>4-6 carrots, peeled and cut into chunks</li>
              <li>4-6 spring onions, chopped</li>
              <li>1 large onion, chopped</li>
              <li>4-6 tomatoes, chopped</li>
              <li>4 cloves of garlic, minced</li>
              <li>1 tablespoon ginger, grated</li>
              <li>2 tablespoons cooking oil</li>
              <li>Salt to taste</li>
              <li>Water for cooking</li>
            </ul>
            <h2 class="recipe-subtitle">Instructions:</h2>
            <ol class="recipe-instructions">
              <li>Heat oil in a large pot and sauté the onions until golden brown.</li>
              <li>Add the beef chunks and bone marrow. Cook until browned on all sides.</li>
      <div class="rating">
      <p>Rate</p>
          <span class="star" data-value="1">&#9733;</span>
          <span class="star" data-value="2">&#9733;</span>
          <span class="star" data-value="3">&#9733;</span>
          <span class="star" data-value="4">&#9733;</span>
          <span class="star" data-value="5">&#9733;</span>
      </div>
        <div class="social-sharing">
        <p>Share</p>
          <a href="https://wa.me/?text=Check out this delicious recipe: [Recipe Title]" target="_blank">
            <img src="assets\Recipes\whatsapp.jpeg" alt="WhatsApp Share">
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=[YourRecipeURL]" target="_blank">
            <img src="assets\Recipes\facebook.png" alt="Facebook Share">
          </a>
          <a href="https://www.instagram.com/[YourInstagramPage]" target="_blank">
            <img src="assets\Recipes\insta.jpeg" alt="Instagram Share">
          </a>
        </div>
            </ol>
          </div>
          <div class="recipe-image">
            <img src="assets/Recipes/matoke.jpg" alt="Recipe Image">
          </div>
          <div class="recipe-image">
            <img src="assets/Recipes/matoke2.jpg" alt="Recipe Image">
          </div>
      </div>
 </section>

 
      <section class="recipe" id="recipe2">
    <div class="recipe-container">
        <div class="recipe-details">
            <h1 class="recipe-title">Pilau</h1>
            <p class="recipe-description">
                Pilau is a specialty along the Swahili Coast in which Rice is flavored with spices and cooked in a well-seasoned broth of Meat, Poultry, or Fish. It is also a festive Dish which never misses at every special occasion…
            </p>
            <h2 class="recipe-subtitle">Ingredients:</h2>
            <ul class="recipe-ingredients">
                <li>1/2 kg Basmati rice, washed (for better results I highly recommend Basmati rice)</li>
                <li>1/2 kg potatoes – peeled, washed and coarsely chopped</li>
                <li>1/2 kg beef, chicken or fish filet – cubed</li>
                <li>1 small cup sunflower oil (or any other liquid oil)</li>
                <li>4 cups of hot water or broth</li>
                <li>1 onion, chopped</li>
                <li>5 cloves of Garlic, crushed</li>
                <li>1 fresh Ginger, crushed</li>
                <li>2 fresh Tomatoes, sliced</li>
                <li>2-3 teaspoons Pilau spices</li>
                <li>Salt and pepper to taste</li>
            </ul>
            <h2 class="recipe-subtitle">Instructions:</h2>
            <ol class="recipe-instructions">
                <li>Boil beef or chicken with ginger for 10 minutes. Add potatoes and let them boil for 5 minutes then set aside (separate the cooked ingredients from the broth so you can use it later).</li>
                <li>Heat oil and fry onions till light brown, add garlic and Pilau spices and on a low heat, fry for 1 minute.</li>
                <li>Add tomatoes meat/chicken with potatoes and cook till tender.</li>
                <li>Add rice and ensure to mix everything very well before adding your broth or hot water then stir the mixture very well.</li>
                <li>Add salt and pepper to taste then cover the pot and cook on medium heat.</li>
                <li>When the Food is nearly dry, lower down the heat to very low, cover your Pilau with aluminum paper (please avoid newspapers or polythene papers) and place the lid on top. Leave to cook for 10 minutes.</li>
                <li><strong>Here you are, your Pilau is ready!</strong>
                <mark>Serve your Pilau hot with Kachumbari and Pilipili ya Maembe A banana can also be used for garnishing...
                  Some like to serve it with a tasty tomato sauce or beef/chicken stew on the side which is also very nice….</mark></li>

                  <div class="rating">
                  <p>Rate</p>
          <span class="star" data-value="1">&#9733;</span>
          <span class="star" data-value="2">&#9733;</span>
          <span class="star" data-value="3">&#9733;</span>
          <span class="star" data-value="4">&#9733;</span>
          <span class="star" data-value="5">&#9733;</span>
      </div>
        <div class="social-sharing">
        <p>Share</p>
          <a href="https://wa.me/?text=Check out this delicious recipe: [Recipe Title]" target="_blank">
            <img src="assets\Recipes\whatsapp.jpeg" alt="WhatsApp Share">
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=[YourRecipeURL]" target="_blank">
            <img src="assets\Recipes\facebook.png" alt="Facebook Share">
          </a>
          <a href="https://www.instagram.com/[YourInstagramPage]" target="_blank">
            <img src="assets\Recipes\insta.jpeg" alt="Instagram Share">
          </a>
        </div>
            </ol>
        </div>
        <div class="recipe-image">
            <img src="assets/Recipes/pilauspices.jpg" alt="Recipe Image">
          </div>
          <div class="recipe-image">
            <img src="assets/Recipes/beefpilau.jpg" alt="Recipe Image">
          </div>
      </div>
    </div>
</section>

<section class="recipe" id="recipe3">
    <div class="recipe-container">
        <div class="recipe-details">
            <h1 class="recipe-title">Kenyan Sponge Cake</h1>
            <p class="recipe-description">
                Enjoy a delightful sponge cake with a touch of spice and sweetness. Perfect for dessert or tea time.
            </p>
            <h2 class="recipe-subtitle">Ingredients:</h2>
            <ul class="recipe-ingredients">
                <li>1 cup flour</li>
                <li>3/4 cup sugar</li>
                <li>4 eggs, at room temperature</li>
                <li>1 teaspoon ground cardamom powder</li>
                <li>4 – 6 cardamom pods, opened (only use the seeds)</li>
                <li>A pinch of cinnamon powder</li>
            </ul>
            <h2 class="recipe-subtitle">Instructions:</h2>
            <ol class="recipe-instructions">
                <li>Preheat the oven to 180 degrees.</li>
                <li>Add eggs and sugar into a mixing bowl and mix using an electric whisk or a hand mixture until thick and voluminous.</li>
                <li>In a separate bowl, mix the rest of the dry ingredients and sift them gently into the egg and sugar mixture. Use a spatula to fold in the flour until there are no more lumps of flour.</li>
                <li>Prepare a baking tin by lightly greasing it with butter and dusting it with flour, then pour the cake mixture into it.</li>
                <li>Place it in the oven and bake until golden brown, approximately 30-35 minutes or until a toothpick inserted comes out clean.</li>
                <li>Cool completely before serving.</li>

                <div class="rating">
                <p>Rate</p>
          <span class="star" data-value="1">&#9733;</span>
          <span class="star" data-value="2">&#9733;</span>
          <span class="star" data-value="3">&#9733;</span>
          <span class="star" data-value="4">&#9733;</span>
          <span class="star" data-value="5">&#9733;</span>
      </div>
        <div class="social-sharing">
        <p>Share</p>  
          <a href="https://wa.me/?text=Check out this delicious recipe: [Recipe Title]" target="_blank">
            <img src="assets\Recipes\whatsapp.jpeg" alt="WhatsApp Share">
          </a>
          <a href="https://www.facebook.com/sharer" target="_blank">
            <img src="assets\Recipes\facebook.png" alt="Facebook Share">
          </a>
          <a href="https://www.instagram.com" target="_blank">
            <img src="assets\Recipes\insta.jpeg" alt="Instagram Share">
          </a>
        </div>
            </ol>
        </div>
        <div class="recipe-image">
            <img src="assets/Recipes/simple-kenyan-spongcake.jpg" alt="Recipe Image">
          </div>
          <div class="recipe-image">
            <img src="assets/Recipes/sponge-cake-batter-in-a-baking-tin.jpg" alt="Recipe Image">
          </div>
      </div>
</section>  
  


    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">RECIPEHUB</span> Built by
        <a href="www.muindilewis@zetech.ac.ke/">Lewis Muindi</a>
      </p>
    </footer>
    <!-- Add this script at the end of your HTML body -->
<script>
  let prevScrollPos = window.pageYOffset; // Initialize the previous scroll position

  // Function to hide/show the navigation bar
  function toggleNavBar() {
    let currentScrollPos = window.pageYOffset; // Get the current scroll position
    const navBar = document.querySelector('.nav-header'); // Replace with your actual navigation bar class or ID

    if (prevScrollPos > currentScrollPos) {
      // User is scrolling up, show the navigation bar
      navBar.style.top = '-15';
    } else {
      // User is scrolling down, hide the navigation bar
      navBar.style.top = '-4rem'; // Adjust the value to hide the entire navigation bar
    }

    prevScrollPos = currentScrollPos; // Update the previous scroll position
  }

  
  window.onscroll = toggleNavBar;
</script>

<script src="js/search.js"></script>
  </body>
  
</html>
