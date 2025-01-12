// Get the search input element and search button
const searchInput = document.getElementById('search');
const searchButton = document.getElementById('search-button');

// Add an event listener to the search button
searchButton.addEventListener('click', () => {
  const searchTerm = searchInput.value.toLowerCase(); // Convert search term to lowercase for case-insensitive search

  // Get all the recipe sections on the page
  const recipeSections = document.querySelectorAll('.recipe');

  // Loop through the recipe sections
  for (const section of recipeSections) {
    const title = section.querySelector('.recipe-title').textContent.toLowerCase();
    
    // Check if the title contains the search term
    if (title.includes(searchTerm)) {
      // Scroll to the section
      section.scrollIntoView({ behavior: 'smooth' });
      return; // Stop searching once a match is found
    }
  }

  // If no matching recipe is found, you can display a message or take other actions here
  alert(`Recipe for "${searchTerm}" not found. Please upload your recipe.`);
});
