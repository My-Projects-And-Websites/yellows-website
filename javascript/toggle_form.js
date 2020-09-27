// Register/Login Forms
const register = document.getElementById('register');
const login = document.getElementById('login');

// Text Identifiers
const heading = document.getElementById('sub-head');
const text = document.getElementById('sub-text');

// Button Identifiers
const login_appear = document.getElementById('toggle_to_log');
const register_appear = document.getElementById('toggle_to_reg');

// Button Listener Events
login_appear.addEventListener('click', function() {
    // on click of the login form, change the text
    heading.innerHTML = "Login";
    text.innerHTML = "To book an appointment with our admin, login!";

    // display the login form if its currently set to none on click
    if (login.style.display === "none") {
        login.style.display = "block";
        // hide the register form
        register.style.display = "none";
    }
});

register_appear.addEventListener('click', function() {
    // on click of the register form, change the text
    heading.innerHTML = "Make an Account";
    text.innerHTML = "Create an account to book an appointment!";

    // display the register form if its currently set to none on click
    if (register.style.display === "none") {
        login.style.display = "none";
        // hide the login form
        register.style.display = "block";
    }
});