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
    <link rel="stylesheet" href="css/styles_about.css">
    <!-- Title written on page tab -->
    <title>Yellows | About</title>
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
        <!-- timeline, consists of the company's story -->
        <section class="about-us">
            <!-- subheading for the story introduction -->
            <div class="intro">
                <h2>Get To Know Us</h2>
                <p>This is an insight about our story, and how we do things in this company.</p>
            </div>
            <!-- timeline content -->
            <div class="timeline">
                <!-- unordered list and child elements are parts of the story  -->
                <ul>
                    <li>
                        <!-- sample date -->
                        <div class="time">
                            <h2>September 3 2019</h2>
                        </div>
                        <!-- story description -->
                        <div class="content">
                            <h3>Here we Started</h3>
                            <p>
                                At this very day, I founded this company. Yellows was founded
                                and of course, I was the only worker in the team. I managed its finances,
                                the manufacturing, the marketing, etc. Of course it was too hectic for me
                                to handle alone so I used hiring platforms to find more people in helping
                                me move forward with this company. 
                            </p>
                        </div>
                    </li>
                    <li>
                        <!-- sample date -->
                        <div class="time">
                            <h2>December 29 2019</h2>
                        </div>
                        <!-- story description -->
                        <div class="content">
                            <h3>Starting to Upgrade</h3>
                            <p>
                                At this time, I have hired people to come and join me in this cause. Also,
                                I have hired PhD's that have many years of experience in this field. From this
                                day forward, I could finally see a big change of pace in all departments of the
                                company. Of course, that's not where we stopped. We kept on moving forward.
                            </p>
                        </div>
                    </li>
                    <li>
                        <!-- sample date -->
                        <div class="time">
                            <h2>May 17 2020</h2>
                        </div>
                        <!-- story description -->
                        <div class="content">
                            <h3>From Local to National</h3>
                            <p>
                                When we started, the business was only meant to sell its products in the local area.
                                But we knew that if we wanted to continue upgrading, we had to step out of our comfort zone and
                                expand our range. So we did. We were only local sellers with no high street presence at all but
                                now we are sellers that provide our products in the whole country. I am proud of the work and effort
                                given by all my employees, I am thankful for these people for helping me achieve my goals and
                                we believe that the only way to move for this company was forward.
                            </p>
                        </div>
                    </li>
                    <li>
                        <!-- sample date -->
                        <div class="time">
                            <h2>Present Day</h2>
                        </div>
                        <!-- story description -->
                        <div class="content">
                            <h3>From National to International</h3>
                            <p>
                                I am guessing you are wondering about the big leap there! We have started working on
                                selling internationally but not all countries are reachable yet. However, in all of
                                the American land, our products are available for you! Alongside my team of geniuses,
                                we are truly moving forward. Right now I feel that this is a real blessing. After three
                                months of only expanding our store to the country, our products have reached many foreign
                                lands. More workers came to work for the company and we have also moved to a building which
                                we can call our own. We finally have a presence on the high street where local people can
                                reach us. Thank you to this team because without them, the pace would have been slow and
                                I wouldn't be where I am now.
                            </p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <!-- text description about what the company does -->
        <section class="products">
            <div class="product-text">
                <h2>So... what do we really sell?</h2>
                <p>
                    The answer to that question is "anything". Please don't take it literally! We sell "anything" that 
                    involves designs of emoticons. How we process orders is that customers will book an appointment with us
                    and they will describe what the product is and which emoticons they want to be imprinted in the products.
                    Hence why we do not have a "Store" page on our website, it's because our products are verbally made by the
                    customers. Customers describe, we make.
                </p>
                <br>
                <p>
                    Here's some samples of our work!
                </p>
            </div>
        </section>

        <!-- carousel slider -->
        <div class="carousel-container" id="carousel">
            <!-- buttons to move to the next and previous images -->
            <button id="prevBtn">&#10094;</button>
            <button id="nextBtn">&#10095;</button>

            <!-- contains the images -->
            <div class="carousel-slide">
                <!-- first and last images are cloned for the javascript slider -->
                <img src="images/carousel/yellow_happy_balloons.jpg" alt="Happy balloons" id="lastClone">
                <img src="images/carousel/chair_emojis.jpg" alt="Chair with happy faces">
                <img src="images/carousel/emoji_in_a_box.jpg" alt="Emoji cushions in a box">
                <img src="images/carousel/wood_emoji_blocks.jpg" alt="Wood blocks with emoji">
                <img src="images/carousel/yellow_block.jpg" alt="Yellow emoji block">
                <img src="images/carousel/yellow_happy_balloons.jpg" alt="Happy balloons">
                <img src="images/carousel/chair_emojis.jpg" alt="Chair with happy faces" id="firstClone">
            </div>
        </div>
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

    <!-- js carousel slider -->
    <script src="javascript/carousel.js"></script>
    <!-- opens the sidebar on click of the hamburger icon for the mobile view -->
    <script src="javascript/sidebar_open.js"></script>
</body>
</html>