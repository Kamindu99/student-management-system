let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
 // let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" active", "");
  // }
  slides[slideIndex - 1].style.display = "block";
 // dots[slideIndex - 1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

function checkPassword() { 
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("cnfrmpwd").value;

  // Validate password length
  if (password.toString().length != 8) {
    alert("Password must be  8 characters long.");
    return false;
  }

  var passwordStrength = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
  if (!password.match(passwordStrength)) {
    alert(
      "Password must contain at least one lowercase letter, one uppercase letter, and one digit."
    );
    return false;
  }

  // Validate password confirmation
  if (password !== confirmPassword) {
    alert("Passwords do not match.");
    return false;
  }

  return redirectToURL();
}

function enableButton() {
  var checkBox = document.getElementById("checkBox");
  var submitBtn = document.getElementById("submitBtn");
  submitBtn.disabled = !checkBox.checked;
}

var termsLink = document.getElementById("termsLink");
var linkClicked = false;

termsLink.addEventListener("click", function () {
  linkClicked = true;
});

function enableButton2() {
  var checkBox = document.getElementById("checkBox");
  var submitBtn = document.getElementById("submitBtn");

  submitBtn.disabled = !(checkBox.checked);
}

var termsLink = document.getElementById("termsLink");
termsLink.addEventListener("click", function () {
  termsLink.clicked = true;
});


function redirectToURL() {

    window.location.href = "https://www.google.com";

}
