<?php
    if(!isset($_SESSION))
        {
            session_start();
        }
    include("DBConnect.php");

    $inputUserName = $_POST['email'];
    $inputPassword = $_POST['password'];

    $getUser = mysqli_query($database, "SELECT UserPassword, userID FROM users WHERE UserName='$inputUserName'");

    if(mysqli_num_rows($getUser) == 1)
    {
        $user = mysqli_fetch_array($getUser);
        $userPassword = $user['UserPassword'];
        $userID = $user['userID'];

        if(strcmp($inputPassword, $userPassword) == 0)
        {
            $_SESSION['loggedIn'] = true;
            $_SESSION['userID'] = $userID;

            echo"You're logged in";
        }

        else{
            echo"Incorrect password";
        }
    }

    else
    {
        echo"Username does not exist";
    }
    
?>