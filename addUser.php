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


<body style="margin-top: -20px;">
    <!--Top header for logo and user tools-->
<?php
    include("./Shared/backstoreHeader.php");
?>
<?php
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    include("./php/DBConnect.php");
    echo "<h1><a href ='Backstore(P9).php'> Go back to list of Users </a><h1>";
    $userID = rand(100, 99999);
    $fnameChange = $_POST['new_fname'];
    $lnameChange = $_POST['new_lname'];
    $emailChange = $_POST['new_email'];
    $countryChange = $_POST['new_country'];
    $cityChange = $_POST['new_city'];
    $addressChange = $_POST['new_address'];
    $password1 = $_POST['new_password1'];
    $password2 = $_POST['new_password2'];
    $roleName = $_POST['role'];
    if ($roleName == 'User'){
        $role = 0;
    }
    else {
        $role = 1;
    }

    if ($password1 === $password2 && $password1 != null) {
        mysqli_query($database, "INSERT INTO users(userID, lastName, firstName, email, password, country, city, address, isAdmin) VALUES ('$userID', '$lnameChange', '$fnameChange', '$emailChange', '$password1', '$countryChange', '$cityChange', '$addressChange', '$role')");
        // mysqli_query($database, "UPDATE users SET lastName = '$lnameChange', firstName = '$fnameChange', email = '$emailChange', country = '$countryChange', city = $cityChange, address = '$addressChange' WHERE userID = $userID");
        echo "<h1><span style='color: orange;'> $userID's account has been created. Here's his info: </br> </span></h1>";
        echo"<div id = 'page-container'><table id='user-table'><tr>
                <td style='text-align:center'><h4><i>Name</i></h4></td>
                <td style='text-align:center'><h4><i>User ID</i></h4></td>
                <td style='text-align:center'><h4><i>email</i></h4></td>
                <td style='text-align:center'><h4><i>Country</i></h4></td>
                <td style='text-align:center'><h4><i>City</i></h4></td>
                <td style='text-align:center'><h4><i>Address</i></h4></td>
                <td style='text-align:center'><h4><i>Role</i></h4></td>
                <td style='text-align:center'></td>
            </tr>";
        echo "<tr class='userRow'>
        <td style='text-align:center' class='user-name'><h5>$lnameChange $fnameChange</h5></td>     
        <td style='text-align:center' class='user-id'><h5>$userID</h5></td>
        <td style='text-align:center' class='user-email'><h6>$emailChange</h6></td>
        <td style='text-align:center' class='user-country'><h5>$countryChange</h5></td>
        <td style='text-align:center' class='user-city'><h5>$cityChange</h5></td>
        <td style='text-align:center' class='user-address'><h5>$addressChange</h5></td>
        <td style='text-align:center' class='user-address'><h5>$roleName</h5></td>
        <td id = 'rightmargin'>
    </tr></table></div>";
    }
    else {
        echo "<h1><span style='color: orange;'> Different or null passwords! </span></h1>";
    }

?> 
</body>
<!-- I also tried to <form method='post' action='.php/changeUser.php'> the whole thing -->
<?php
    include("./Shared/footer.php");
?>