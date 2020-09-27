<?php
    // start the session
    session_start();

    // end all the sessions
    session_destroy();

    // redirect to this page
    header('Location: index.php');
?>