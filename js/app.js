function sendResetEmail() {
  // You would implement the logic to send a reset email here
  // This would typically involve AJAX to send the email via your server
  // and handle the response (success or error) accordingly
  alert('Reset email sent. Please check your inbox.');
}


function registerUser() {
  const fullName = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const password = document.getElementById('password').value;

  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'your_backend_endpoint_here');
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onload = function () {
    if (xhr.status === 200) {
      window.location.href = "login.html";
    } else {
      console.error('Error:', xhr.statusText);
    }
  };
  const data = JSON.stringify({ fullName, email, password });
  xhr.send(data);
}

const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});


// Add this JavaScript to your page or in a separate script file
const stars = document.querySelectorAll(".star");
const message = document.getElementById("rating-message");

stars.forEach(star => {
  star.addEventListener("click", () => {
    const value = star.getAttribute("data-value");
    message.textContent = `You rated this recipe ${value} stars.`;

    // You can also send this rating to your server for storage
  });
});
