<!DOCTYPE html>
<html lang = "en">
    <head>
            <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js\userProfile.js"></script>
    <title>User Profile</title>
    
<link rel = "stylesheet" href="css/site.css">

    </head>

<?php
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    include("./php/DBConnect.php");

    echo "<h1><a href ='Backstore(P9).php'> Go back to list of Users </a><h1>";
    $userID = $_POST['user_id'];
    $getUsers = mysqli_query($database, "SELECT * FROM users WHERE userID = '$userID'");
    $row = mysqli_fetch_array($getUsers);

    $userID = $row['userID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];
    $country = $row['country'];
    $city = $row['city'];
    $address = $row['address'];
    $isAdmin = $row['isAdmin'];

    $fnameChange = $_POST['new_fname'];
    $lnameChange = $_POST['new_lname'];
    $emailChange = $_POST['new_email'];
    $countryChange = $_POST['new_country'];
    $cityChange = $_POST['new_city'];
    $addressChange = $_POST['new_address'];
    $password1 = $_POST['new_password1'];
    $password2 = $_POST['new_password2'];

    if (isset($_POST['role'])) {
        $roleName = $_POST['role'];
    }
    else {
        $roleName = 'User';
    }

    $newfname = $firstName;
    $newlname = $lastName;
    $newemail = $email;
    $newcountry = $country;
    $newcity = $city;
    $newaddress = $address;
    $newRole = $isAdmin;

    if ($fnameChange != null) {
        $newfname = $fnameChange;
    }
    if ($lnameChange != null) {
        $newlname = $lnameChange;
    }
    if ($emailChange != null) {
        $newemail = $emailChange;
    }
    if ($countryChange != null) {
        $newcountry = $countryChange;
    }
    if ($cityChange != null) {
        $newcity = $cityChange;
    }
    if ($addressChange != null) {
        $newaddress = $addressChange;
    }
    if ($roleName != null) {
        $newRole = $roleName;
    }

    if ($newRole == 'Admin'){
        $role = 1;
    }
    else {
        $role = 0;
    }

    if ($password1 === $password2 && $password1 != null) {
        mysqli_query($database, "UPDATE users SET lastName = '$newlname', firstName = '$newfname', email = '$newemail', country = '$newcountry', city = '$newcity', address = '$newaddress', isAdmin = '$role' WHERE userID = $userID");
        echo "<h1><span style='color: orange;'> $userID's has been changed. Here's the new info: </br> </span></h1>";
        echo"<div id = 'page-container'><table id='user-table'><tr>
                <td style='text-align:center'><h4><i>Name</i></h4></td>
                <td style='text-align:center'><h4><i>User ID</i></h4></td>
                <td style='text-align:center'><h4><i>email</i></h4></td>
                <td style='text-align:center'><h4><i>Country</i></h4></td>
                <td style='text-align:center'><h4><i>City</i></h4></td>
                <td style='text-align:center'><h4><i>Address</i></h4></td>
                <td style='text-align:center'><h4><i>Role</i></h4></td>
                <td style='text-align:center'><h4><i>Password</i></h4></td>
                <td style='text-align:center'></td>
            </tr>";
        echo "<tr class='userRow'>
        <td style='text-align:center' class='user-name'><h5>$newlname $newfname</h5></td>     
        <td style='text-align:center' class='user-id'><h5>$userID</h5></td>
        <td style='text-align:center' class='user-email'><h6>$newemail</h6></td>
        <td style='text-align:center' class='user-country'><h5>$newcountry</h5></td>
        <td style='text-align:center' class='user-city'><h5>$newcity</h5></td>
        <td style='text-align:center' class='user-address'><h5>$newaddress</h5></td>
        <td style='text-align:center' class='user-address'><h5>$newRole</h5></td>
        <td style='text-align:center' class='user-address'><h5>$password2</h5></td>
        <td id = 'rightmargin'>
        <a href='Backstore(P10).php?userID=$userID&firstName=$firstName&lastName=$lastName&email=$email
        &country=$country&city=$city&address=$address'> 
        </td>
    </tr></table></div>";
    }
    else {
        echo "<h1><span style='color: orange;'> Wrong passwords! </span></h1>";
    }
?>