<?php
    // if session hasn't started yet, start it
    if(!isset($_SESSION)) {
        session_start();
    }

    // block direct entry from address bar, page entry not allowed if custom session does not exist yet
    if(!isset($_SESSION['user-entry'])) {
        // redirect to this page
        header("Location: contact.php");
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
    <link rel="stylesheet" href="css/styles_appointment.css">
    <!-- Title written on page tab -->
    <title>Yellows | Appointments</title>
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

    <!-- this section contains the whole main body -->
    <section class="welcome-user">
        <!-- this is the column at the left side with clickable options -->
        <div class="select">
            <ul>
                <!-- when dashboard list item is clicked, remove other list items from view and display dashboard -->
                <li id="dash" onclick="dash_appear()">Dashboard</li>
                <!-- when appointments list item is clicked, remove other list items from view and display form to make appointments -->
                <li id="apps" onclick="app_appear()">Appointments</li>
                <!-- log out, end the session -->
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
        <!-- main content of display -->
        <div class="select-content">
            <!-- dashboard, this contains the welcome text and the currently booked appointments -->
            <div id="dashboard">
                <div>
                    <!-- welcome text, display username -->
                    <?php
                        echo "<h2>Welcome ".$_SESSION['user-entry'].".</h2>";
                    ?>
                    <!-- show on desktop view -->
                    <p>Book an appointment by selecting the "Appointments" section at the left side.</p>
                    <div class="bookings">
                        <!-- this returns the date and reason field from the database -->
                        <h2>Appointments</h2>
                        <div class="fetch">
                            <?php
                                // make a connection to the database
                                $hostname = "fareham.city.ac.uk";
                                $username = "adbc515";
                                $password = "190053033";
    
                                $conn = new mysqli($hostname, $username, $password, $username);
    
                                // assign the username value to a variable
                                $userlogin = $_SESSION['user-entry'];
    
                                // this query will select the 'app_date' and 'reason' field that matches the log in username of the user
                                $retrieve = "SELECT app_date, reason FROM appointments WHERE username = '$userlogin'";
                                // run the query
                                $run_query = $conn->query($retrieve);
                                // if there are matches from the query, display them
                                if (isset($run_query)) { 
                                    // display the results
                                    while ($row = mysqli_fetch_array($run_query)) {
                                        // HTML elements used to display the data
                                        echo "<div class='results'>";
                                        echo "<ul>";
                                        echo "<li>";
                                        echo "<p>" . $row['app_date'] . "</p>";
                                        echo "<p>" . $row['reason'] . "</p>";
                                        echo "</li>";
                                        echo "</ul>";
                                        echo "</div>";
                                    }
                                }
                                // if there are no matches, display this text
                                else {
                                    echo "<p>No appointments requested.</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- do not display this section by default -->
            <div id="none">
                <div class="appointments">
                    <div class="make-appointments">
                        <div class="app-text">
                            <h2>Make Appointments</h2>
                            <!-- action value means data will be passed in that file -->
                            <!-- POST means save it to the database -->
                            <form action="make_app.php" method="POST" id="book-an-appointment">
                                <div class="inputs">
                                    <!-- Input fields -->
                                    <div class="app">
                                        <input type="date" name="appointment" id="date-for-app">
                                        <!-- error message -->
                                        <small id="date-error"></small>
                                    </div>
                                    <div class="app">
                                        <input type="text" placeholder="Reason of Appointment" name="reason" id="app-reason">
                                        <!-- error message -->
                                        <small id="reason-error"></small>
                                    </div>
                                </div>
                                <!-- Submit button -->
                                <input type="submit" value="Request Appointment">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="log-out">
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </section>

    <!-- js toggle from appointment and dashboard -->
    <script src="javascript/app_make.js"></script>
    <!-- form validation to make the appointment -->
    <script src="javascript/appointment_form.js"></script>
    <!-- open the sidebar on click of the hamburger icon -->
    <script src="javascript/sidebar_open.js"></script>
</body>
</html>