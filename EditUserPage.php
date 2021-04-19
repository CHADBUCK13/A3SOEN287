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

    $userID= $_GET['userID'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $email = $_GET['email'];
    $country = $_GET['country'];
    $city = $_GET['city'];
    $address = $_GET['address'];
    $password = $_GET['password'];
    
    // mysqli_query($database, "DELETE FROM users WHERE userID = $userID");
    echo "<h1><a href ='../Backstore(P9).php'> Go back to list of Users </a><h1>";

    echo "<h1>User $userID's Profile</h1>
    <br/>

    <form name='addingUser' method='post' action='changeUser.php'>
    <h3><u>First name:</u></h3>
    <b>Change first name:<span style='font-size: 20px'> $firstName  </span></b>
    <br/>
    <br/>

    <b>New first name:</b>
    <input  type = 'text' name = 'new_fname' placeholder='New First Name' class='change-user-name'>
    <br/>
    <span id='new-userName' class='changing-span'>
        
    </span>

    <h3><u>Last name:</u></h3>
    <b>Change last name: <span style='font-size: 20px'> $lastName </span></b>
    <br/>
    <br/>

    <b>New last name:</b>
    <input  type = 'text' name = 'new_lname' placeholder='New Last Name' class='change-user-name'>
    <br/>
    <span id='new-userName' class='changing-span'>
        
    </span>
    
    <h3><u>Email Address:</u></h3>
    <b>Change Email Address:<span style='font-size: 20px'> $email </span></b>
    <br/>
    <br/>
    <b>New Email Address:</b>
    <input  type = 'text' name = 'new_email' placeholder='New Email Address' class='change-user-email'>
    <br/>
    <span id='new-email' class='changing-span'>
        
    </span>

    <h3><u>Country:</u></h3>
    <b>Change Country:<span style='font-size: 20px'> $country </span></b>
    <br/>
    <br/>

    <b>New Country:</b>
    <input  type = 'text'  name = 'new_country' placeholder='New Country' class='change-user-country'>
    <br/>
    <span id='new-country' class='changing-span'>
        
    </span>

    <h3><u>City:</u></h3>
    <b>Change City:<span style='font-size: 20px'> $city </span></b>
    <br/>
    <br/>

    <b>New City:</b>
    <input  type = 'text'  name = 'new_city' placeholder='New City' class='change-user-city'>
    <br/>
    <span id='new-city' class='changing-span'>
        
    </span>

    <h3><u>Address:</u></h3>
    <b>Change Address:<span style='font-size: 20px'> $address </span></b>
    <br/>
    <br/>

    <b>New Address:</b>
    <input  type = 'text'  name = 'new_address' placeholder='New Address' class='change-user-address'>
    <br/>
    <span id='new-address' class='changing-span'>
        
    </span>

    <h3><u>Password</u>:</h3>
    <b>Change Password:</b>
    <input type = 'password' name = 'new_password1' placeholder = 'Old password is $password' class='change-user-password'>
    <br/>
    <br/>
    
    <b>Confirm Password:</b>
    <input type = 'password' name = 'new_password2' placeholder = 'Confirm Password' class='change-user-password'>
    <br/>
    <span id='new-Password' class='changing-span'>
        
    </span>
    <b><input type='hidden' name='user_id' value='$userID'></b>
    </br>
    <fieldset>
    <label> <input type='radio' name ='role' value='User'/>User</label><br/>
    <label> <input type='radio' name ='role'value='Admin'/>Admin</label><br/>
    </fieldset>
    </br>
    ";
    echo "
    <input type = 'submit' value = 'Save' id='profile-save-btn'/>
    <br/>
    <br>
    <br/>
    <br>
    <br/>
    <br>
    <br/>
    <br>
    <br/>
    <br/>
    <br/>
    </form>";
?> 
</body>
<!-- I also tried to <form method='post' action='.php/changeUser.php'> the whole thing -->
<?php
    include("./Shared/footer.php");
?>