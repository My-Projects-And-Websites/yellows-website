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
    <link rel="stylesheet" href="css/styles_home.css">
    <!-- Title written on page tab -->
    <title>Yellows | Home</title>
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

    <!-- landing section when page loads -->
    <section class="hero-section">
        <!-- main heading and text -->
        <div class="main-text" id="mainText">
            <h1>Emoticons, tell us what you need and we'll work on it.</h1>
            <p>Any product with an emoji. Let us know.</p>
        </div>
        <!-- image of yellow balloons -->
        <div class="main-img">
            <!-- show text only when image fails to load -->
            <img src="images/balloons_bg_black_main_img.jpg" alt="yellow balloons with a black background">
        </div>
    </section>

    <!-- introduce the company representative -->
    <section class="company-rep">
        <!-- container that provides margin at left and right -->
        <div class="rep-container">
            <div class="rep-text">
                <!-- H2 heading -->
                <h2>Hi, I'm Noel.</h2>
                <!-- description of company and representative -->
                <p>
                    My name is Noel Quadri. I am from Canada and I have graduated
                    from Harvard University a year ago with majors in Architecture.
                    I have founded Yellows simply because I love to use emoticons
                    and stickers when communicating online and I think that having
                    emojis only in digital format is way too limited so why not bring
                    these designs to the real world, right? I am proud of this company
                    and I will continue to improve and someday bring these products
                    to the whole world!
                </p>
            </div>
            <!-- image of rep -->
            <div class="rep-img">
                <img src="images/me.PNG" alt="Company representative">
            </div>
        </div>
    </section>

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

    <!-- js enables sidebar to open on click -->
    <script src="javascript/sidebar_open.js"></script>
</body>
</html>