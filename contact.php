<!-- php session that displays link to the appointment page when user is logged in -->
<?php
    session_start(); // start the session

    // if user-entry session exists declare a session variable
    if (isset($_SESSION['user-entry'])) {
        // custom session
        $_SESSION['app-link'] = "
            <a href='appointments.php' id='make-an-app'>Appointments</a>
        "; // assign an HTML tag to the session
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- meta and link tags -->
    <meta charset="UTF-8">
    <!-- responsive according to device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font awesome library to import icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- favicon - shown on the page tab -->
    <link rel="icon" href="images/icon.png">
    <!-- stylesheet - this applies the styles to the elements from a css file -->
    <link rel="stylesheet" href="css/styles_contact.css">
    <!-- Title written on page tab -->
    <title>Yellows | Contact</title>
</head>
<body>
    <!-- header - contains logo and navigation links -->
    <header id="hdr">
        <!-- set a container within the header -->
        <div class="container">
            <!-- contains the logo image -->
            <div class="logo">
                <!-- file directory for the image -->
                <!-- alternate text will show if image is unavailable -->
                <img src="images/Logo.png" alt="Yellows Logo">
            </div>
            <!-- semantic navigation tag -->
            <nav>
                <!-- unordered list -->
                <ul class="pages">
                    <!-- list items contains links to the other pages within the directory -->
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
            <!-- this will only appear if the custom session exists -->
            <?php
                if (isset($_SESSION['app-link'])) {
                    // output to the HTML page - this was declared at the top of the page
                    echo $_SESSION['app-link']; 
                }
            ?>
            <!-- hamburger button - only shown when device width is less than 480px -->
            <div class="open-side">
                <!-- HTML entity for hamburger icon -->
                <span>&#9776;</span>
            </div>
        </div>
    </header>

    <!-- sidebar opens when hamburger icon is clicked - displayed outside of the view, margin left -->
    <!-- display sidebar on mobile view only -->
    <div class="sidebar" style="margin-left: -270px;">
        <!-- container to have margin at left and right -->
        <div class="container">
            <!-- navigation links inside the sidebar -->
            <nav>
                <ul class="pages">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </nav>
            <?php
                if (isset($_SESSION['app-link'])) {
                    echo $_SESSION['app-link'];
                }
            ?>
        </div>
    </div>

    <!-- main content -->
    <main>
        <!-- left and right equal margin -->
        <div class="container">
            <!-- form section -->
            <section class="form">
                <!-- text for the form to provide minimal instructions -->
                <div class="form-text">
                    <h2 id="sub-head">Make an Account</h2>
                    <p id="sub-text">Create an account to book an appointment!</p>
                </div>
                <!-- form that saves register data entered by the user in its input fields into a database -->
                <!-- action value means data will be passed in that file -->
                <!-- POST means save it to the database -->
                <form action="reg.php" method="POST" id="register">
                    <!-- input field section -->
                    <div class="input-fields">
                        <!-- input class provides padding and width to its child elements that are input -->
                        <div class="inputs">
                            <!-- free text input, user can enter anything -->
                            <!-- placeholder are the instructions to what user will enter in the fields -->
                            <input type="text" name="username" id="username" placeholder="Enter Username">  
                            <!-- error message, set to no display and will only appear when there is an error with the user input -->                          
                            <small id="username_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="text" name="first_name" id="first_name" placeholder="Enter First Name">
                            <small id="first_name_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="text" name="last_name" id="last_name" placeholder="Enter Last Name">
                            <small id="last_name_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="text" name="phone_number" id="phone_number" placeholder="Enter Mobile">
                            <small id="phone_number_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="text" name="email" id="email" placeholder="Enter Email">
                            <small id="email_error"></small>
                        </div>
                        <div class="inputs">
                            <!-- password is replaced by dots to hide content from sight -->
                            <input type="password" name="password" id="password" placeholder="Enter Password">
                            <small id="password_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
                            <small id="cpassword_error"></small>
                        </div>
                    </div>
                    <!-- button section -->
                    <div class="toggle-btn">
                        <!-- switch to the login form and hide register form when clicked -->
                        <button type="button" id="toggle_to_log">Got an account? Login!</button>
                        <!-- submit data to the database on click -->
                        <input type="submit" value="Register" name="register_button">
                    </div>
                </form>

                <!-- form that reads from data in database and finds a match, if successful match, user will be able to login -->
                <!-- set to display none -->
                <form action="login.php" method="POST" id="login" style="display: none;">
                    <div class="input-fields">
                        <div class="inputs">
                            <input type="text" name="username_login" id="username_login" placeholder="Username">
                            <!-- error message -->
                            <small id="username_login_error"></small>
                        </div>
                        <div class="inputs">
                            <input type="password" name="password_login" id="password_login" placeholder="Password">
                            <small id="password_login_error"></small>
                        </div>
                    </div>
                    <div class="toggle-btn">
                        <!-- switch to register form when button is clicked -->
                        <button type="button" id="toggle_to_reg">No account? Register!</button>
                        <!-- submit data to file at the action value -->
                        <input type="submit" value="Login" name="register_button">
                    </div>
                </form>
            </section>

            <!-- information on how to contact the company -->
            <section class="contact">
                <div class="contact-text">
                    <!-- ice breaker text -->
                    <h2>Get in Touch</h2>
                    <p>No need to be shy so reach out!</p>
                </div>
                <!-- how to get in touch, follow these instructions -->
                <div class="contact-info">
                    <ul>
                        <li>yellows@mail.com</li>
                        <li>
                            10-123 YELLOW STREET <br>
                            MONTREAL QC H56 8QW
                        </li>
                        <li>020 1238 4567</li>
                        <li>We are open 24/7!</li>
                    </ul>
                </div>
                <!-- when clicked, user will be redirected to the email app in their 
                local machine and automatically address it to the email inside the href attribute -->
                <div class="mail">
                    <a href="mailto:yellows@mail.com">Send Us A Mail</a>
                </div>
            </section>
        </div>
        <!-- end of main content -->
    </main>

    <!-- footer contains backlinks, copyright statement and disclaimer -->
    <footer>
        <!-- HTML entity for copyright symbol -->
        <p>Copyright &copy; Yellows 2020 All Rights Reserved.</p>
        <div class="social-media">
            <!-- fotn awesome icons of social media -->
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-instagram"></a>
            <a href="#" class="fa fa-twitter"></a>
        </div>
        <!-- disclaimer to declare this website is a university project -->
        <p class="disclaimer">
            Yellows is a fictitious brand created solely for the purpose of the
            assessment of IN1010 module at City, University of London, UK. All products and
            people associated with Yellows are also fictitious. Any resemblance to real
            brands, products, or people is purely coincidental. Information provided about the
            product is also fictitious and should not be construed to be representative of actual
            products on the market in a similar product category.
        </p>
    </footer>

    <!-- form toggle between register and login form -->
    <script src="javascript/toggle_form.js"></script>
    <!-- form validation, prevent submit if there are errors on the input -->
    <script src="javascript/validation.js"></script>
    <!-- open sidebar when hamburger button is clicked, available only for mobile view -->
    <script src="javascript/sidebar_open.js"></script>
</body>
</html>