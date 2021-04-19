<?php
     if(isset($_POST['signup'])){
        $firstName= $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $confirmEmail = $_POST['confirmEmail'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $_SESSION['signupFeedback'] = "";
    }
?>