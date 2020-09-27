<?php
    // start the session if it still hasn't started
    if(!isset($_SESSION)) {
        session_start();
    }

    // declare variables for database connection
    $hostname = "fareham.city.ac.uk";
    $username = "adbc515";
    $password = "190053033";

    // connect to the database
    $conn = new mysqli($hostname, $username, $password, $username);
    if ($conn->connect_errno) {
        // if connection has error, output error
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    }
    else {
        // assign input data to variables
        $login_username = $_POST['username_login'];
        // encrypt input password to match password in the database
        $login_password = md5($_POST['password_login']);

        // output the username and password that matches the input from the user
        $find_match = "SELECT username, password FROM users WHERE username = '$login_username' AND password = '$login_password'";
        // execute the query
        $result = $conn->query($find_match);
        // assign results to $row variable
        $row = mysqli_fetch_row($result);

        // if the query returned null, output text and a link to go back to login form
        if(!isset($row[0])) {
            echo "Wrong credentials entered. <br>
                  <a href='https://smcse.city.ac.uk/student/adbc515/WebDevelopment-project/contact.php'>Go Back</a>";
        }
        // if the user input matches the returned data by the query, create custom session to allow entry to users in the appointments page
        else if ($row[0] == $login_username && $row[1] == $login_password) {
            $_SESSION['user-entry'] = $login_username;
            
            // redirect
            header("Location: appointments.php");
        }
    }
?>