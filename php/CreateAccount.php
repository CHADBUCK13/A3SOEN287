<?php
    if(!isset($_SESSION))
        {
            session_start();
        }
    include("DBConnect.php");

    $userID = $_SESSION['userID'];
    $lastName = $_POST['LastName'];
    $firstName = $_POST['FirstName'];
    $country = $_POST['Country'];
    $city = $_POST['City'];
    $address = $_POST['Address'];
    $userName = $_POST['email'];
    $userPassword = $_POST['password'];
    $confirmPassword = $_POST['ConfirmPassword']; 

    if(strcmp($userPassword, $confirmPassword) != 0)
    {
        // alert("passwords don't match");
    }

    else
    {
        $added = mysqli_query($database, "INSERT INTO users(userID, LastName, FirstName, UserName, UserPassword, Country, City, Address) 
            VALUES ('{$userID}', '{$lastName}', '{$firstName}', '{$userName}', '{$userPassword}', '{$country}', '{$city}', '{$address}')");

        if($added)
        {
            echo"Your account was added";
        }

        else
        {
            echo"Try again";
        }
    }
?>

