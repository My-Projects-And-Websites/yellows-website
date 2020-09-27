<?php
    if(!isset($_SESSION)) {
        session_start(); // start the session
    }

    // declare variables containing the values from the input field
    $user = $_SESSION['user-entry'];
    $date = $_POST['appointment'];
    $reason = $_POST['reason'];

    // variables to use for database connection
    $hostname = "fareham.city.ac.uk";
    $username = "adbc515";
    $password = "190053033";

    // connecting to the database
    $conn = new mysqli($hostname, $username, $password, $username);
    if ($conn->connect_errno) {
        // if connection has error, output error
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    }
    else {        
        // if db connection is successful, insert data from input fields to database
        mysqli_query($conn, "INSERT INTO appointments (`username`, `app_date`, `reason`)
        VALUES ('$user', '$date', '$reason')")
        or die(mysqli_error($conn)); // terminate if there is an error

        header("Location: appointments.php"); // redirect user to this page after data has been saved to the database
    }
?>