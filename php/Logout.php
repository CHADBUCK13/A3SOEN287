<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    //unset session variables
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    $_SESSION['isAdmin'] = false;
    $_SESSION['loggedIn'] = false;

    // go back to homepage
    header("Location: ../index.php")
?>