// main boolean for register form to prevent submit
var submit_register = false;

// main boolean for login form to prevent submit
var submit_login = false;

// get the form from the document
const registerForm = document.getElementById('register');
const loginForm = document.getElementById('login');

// on submit of the register form, if boolean is false prevent submit and run the validation function
registerForm.addEventListener("submit", function(error) {
    if (!submit_register) {
        error.preventDefault();
        valRegister();
    }
});

// on submit of the login form, if boolean is false prevent submit and run the validation function
loginForm.addEventListener("submit", function(error) {
    if (!submit_login) {
        error.preventDefault();
        valLogin();
    }
});

// register form validation
function valRegister() {
    // get the value of what the user entered in the input fields
    const username = document.getElementById('username').value;
    const first_name = document.getElementById('first_name').value;
    const last_name = document.getElementById('last_name').value;
    const phone_number = document.getElementById('phone_number').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('cpassword').value;

    // get the error tags
    const username_error = document.getElementById('username_error');
    const first_name_error = document.getElementById('first_name_error');
    const last_name_error = document.getElementById('last_name_error');
    const phone_number_error = document.getElementById('phone_number_error');
    const email_error = document.getElementById('email_error');
    const password_error = document.getElementById('password_error');
    const confirm_error = document.getElementById('cpassword_error');

    // regex pattern to allow only letters to be entered into the input field
    var letters_only = /^[A-Za-z]+$/;
    // regex pattern to prompt user for password that contains an uppercase letter, lowercase letter, special character and a number with length between 6-12
    var password_validation = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,12}$/; 

    // username validation
    var username_valid = false;
    // if empty, display error message
    if (username == "") {
        username_error.style.display = "inline";
        username_error.innerHTML = "Field empty. Fill in.";
    }
    // if the length of username is less than 6, display error message
    else if (username.length < 6) {
        username_error.style.display = "inline";
        username_error.innerHTML = "Must be at least 6 characters.";
    }
    // if the length of username is greater than 12, display error message
    else if (username.length > 12) {
        username_error.style.display = "inline";
        username_error.innerHTML = "Maximum 12 characters.";
    }
    // if username is valid, set username boolean to true and hide error message
    else {
        username_error.style.display = "none";
        username_valid = true;
    }

    // first name validation
    var first_name_valid = false;
    // if empty, display error message
    if (first_name == "") {
        first_name_error.style.display = "inline";
        first_name_error.innerHTML = "Field empty. Fill in.";
    }
    // if there are numbers on the name, display error message
    else if (!first_name.match(letters_only)) {
        first_name_error.style.display = "inline";
        first_name_error.innerHTML = "You cannot have numbers on your name.";
    }
    // if first name is valid, set first name boolean to true and hide error message
    else {
        first_name_error.style.display = "none";
        first_name_valid = true;
    }

    // last name validation
    var last_name_valid = false;
    // if empty, display error message
    if (last_name == "") {
        last_name_error.style.display = "inline";
        last_name_error.innerHTML = "Field empty. Fill in.";
    }
    // if there are numbers on the name, display error message
    else if (!last_name.match(letters_only)) {
        last_name_error.style.display = "inline";
        last_name_error.innerHTML = "You cannot have numbers on your name.";
    }
    // if last name is valid, set last name boolean to true and hide error message
    else {
        last_name_error.style.display = "none";
        last_name_valid = true;
    }

    // phone number validation
    var phone_number_valid = false;
    // if empty, display error message
    if (phone_number == "") {
        phone_number_error.style.display = "inline";
        phone_number_error.innerHTML = "Field empty. Fill in.";
    }
    // if phone number is not equal to 11 digits, display error message
    else if (phone_number.length != 11) {
        phone_number_error.style.display = "inline";
        phone_number_error.innerHTML = "Phone number must have 11 digits.";
    }
    // if phone number input is valid, set phone number boolean to true and hide error message
    else {
        phone_number_error.style.display = "none";
        phone_number_valid = true;
    }

    // email validation
    var email_valid = false;
    // if empty, display error message
    if (email == "") {
        email_error.style.display = "inline";
        email_error.innerHTML = "Field empty. Fill in.";
    }
    // if email does not include @ and .com, display error message
    else if (!email.includes('@') || !email.includes('.com')) {
        email_error.style.display = "inline";
        email_error.innerHTML = "Invalid email.";
    }
    // if email is valid, set email boolean to true and hide error message
    else {
        email_error.style.display = "none";
        email_valid = true;
    }

    // password validation
    var password_valid = false;
    // if empty, display error message
    if (password == "") {
        password_error.style.display = "inline";
        password_error.innerHTML = "Field empty. Fill in.";
    }
    // if password does not match the regex pattern above, display error message
    else if (!password.match(password_validation)) {
        password_error.style.display = "inline";
        password_error.innerHTML = "At least one uppercase, lowercase, number and special character. 6-12 characters.";
    }
    // if password is valid, set password boolean to true and hide error message
    else {
        password_error.style.display = "none";
        password_valid = true;
    }

    // confirm password validation
    var confirm_valid = false;
    // if empty, display error message
    if (confirm == "") {
        confirm_error.style.display = "inline";
        confirm_error.innerHTML = "Field empty. Fill in.";
    }
    // if confirm password is not equal to the password, display error message
    else if (confirm != password) {
        confirm_error.style.display = "inline";
        confirm_error.innerHTML = "Password does not match.";
    }
    // if confirm password is valid, set confirm password boolean to true and hide error message
    else {
        confirm_error.style.display = "none";
        confirm_valid = true;
    }

    // if all input fields are valid, set main boolean to true and allow form submission
    if (username_valid && first_name_valid && last_name_valid && phone_number_valid && email_valid && password_valid && confirm_valid) {
        submit_register = true;
    }
}

// login validation
function valLogin() {
    // get the value of the input fields in the login form
    const username_login = document.getElementById('username_login').value;
    const password_login = document.getElementById('password_login').value;

    // get the error tags from the document
    const username_login_error = document.getElementById('username_login_error');
    const password_login_error = document.getElementById('password_login_error');

    // username login validation
    var username_login_valid = false;
    // if empty, display error message
    if (username_login == "") {
        username_login_error.style.display = "inline";
        username_login_error.innerHTML = "Field empty. Fill in.";
    }
    // if username login is valid, set username login boolean to true and hide error message
    else {
        username_login_error.style.display = "none";
        username_login_valid = true;
    }

    // password login validation
    var password_login_valid = false;
    // if password login is empty, display error message
    if (password_login == "") {
        password_login_error.style.display = "inline";
        password_login_error.innerHTML = "Field empty. Fill in.";
    }
    // if password login is valid, set password login boolean to true and hide error message
    else {
        password_login_error.style.display = "none";
        password_login_valid = true;
    }

    // if both booleans of username login and password login are true, set main boolean to true and allow login form submission
    if (username_login_valid && password_login_valid) {
        submit_login = true;
    }
}