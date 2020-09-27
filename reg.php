<?php
    // assign values to variables for databsae connection
    $hostname = "fareham.city.ac.uk";
    $username = "adbc515";
    $password = "190053033";

    // connect to the database using the variables declared
    $conn = new mysqli($hostname, $username, $password, $username);
    if ($conn->connect_errno) {
        // // if connection has error, output error
        printf("Connection failed: %s\n", $conn->connect_error);
        exit();
    } 
    else {
        // assign input data from user to variables
        $reg_username = $_POST['username'];
        $reg_firstname = $_POST['first_name'];
        $reg_lastname = $_POST['last_name'];
        $reg_phonenumber = $_POST['phone_number'];
        $reg_email = $_POST['email'];
        // encrypt the password entered by the user when registering
        $reg_password = md5($_POST['password']);

        // retrieve data from database, select the username that matches the username entered by the user
        $user_query = "SELECT username FROM users WHERE username = '$reg_username'";
        // store result of query in this variable
        $username_result = mysqli_query($conn, $user_query);

        // retrieve data from database, select the email that matches the email entered by the user
        $email_query = "SELECT email FROM users WHERE email = '$reg_email'";
        // store result of query in this variable
        $email_result = mysqli_query($conn, $email_query);

        // if the variable that stores the result for the username query and email query already exists then output text and redirect link
        if (mysqli_num_rows($username_result) != 0 || mysqli_num_rows($email_result) != 0) {
            echo "Username or email already taken. Please go back and choose other register details. <br>
                  <a href='https://smcse.city.ac.uk/student/adbc515/WebDevelopment-project/contact.php'>Go Back</a>";
        }
        // if both username and email does not exist yet then...
        else {
            // insert registration data into database
            mysqli_query($conn, "INSERT INTO users (username, firstName, lastName, phone_no, email, password)
            VALUES ('$reg_username', '$reg_firstname', '$reg_lastname', '$reg_phonenumber', '$reg_email', '$reg_password')")
            or die(mysqli_error($conn));

            // redirect
            header("Location: contact.php");
        }
    }
?>