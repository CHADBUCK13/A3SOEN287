<?php
    include("./php/checkAdmin.php");
?>

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
    // mysqli_query($database, "DELETE FROM users WHERE userID = $userID");
    echo "<h1>New User Profile</h1>

    <form name='addingUser' method='post' action='addUser.php'>
    <h3><u>First name:</u></h3>

    <b>First name:</b>
    <input  type = 'text' name = 'new_fname' placeholder='First name' class='change-user-name'>
    <span id='new-userName' class='changing-span'>
    </span>

    <h3><u>Last name:</u></h3>
    <b>Last name:</b>
    <input  type = 'text' name = 'new_lname' placeholder='Last name' class='change-user-name'>
    <br/>
    <span id='new-userName' class='changing-span'>
        
    </span>
    
    <h3><u>Email Address:</u></h3>
    <b>Email Address:</b>
    <input  type = 'text' name = 'new_email' placeholder='Email Address' class='change-user-email'>
    <br/>
    <span id='new-email' class='changing-span'>
        
    </span>

    <h3><u>Country:</u></h3>

    <b>Country:</b>
    <input  type = 'text'  name = 'new_country' placeholder='Country' class='change-user-country'>
    <br/>
    <span id='new-country' class='changing-span'>
        
    </span>

    <h3><u>City:</u></h3>

    <b>City:</b>
    <input  type = 'text'  name = 'new_city' placeholder='City' class='change-user-city'>
    <br/>
    <span id='new-city' class='changing-span'>
        
    </span>

    <h3><u>Address:</u></h3>

    <b>New Address:</b>
    <input  type = 'text'  name = 'new_address' placeholder='Address' class='change-user-address'>
    <br/>
    <span id='new-address' class='changing-span'>
        
    </span>

    <h3><u>Password</u>:</h3>
    <b>Password:</b>
    <input type = 'password' name = 'new_password1' placeholder = 'Enter Password' class='change-user-password'>
    <br/>
    <br/>
    
    <b>Confirm Password:</b>
    <input type = 'password' name = 'new_password2' placeholder = 'Confirm Password' class='change-user-password'>
    <br/>
    <span id='new-Password' class='changing-span'>
    </span>
    </br>
    <fieldset>
    <label> <input type='radio' name ='role' value='User'/>User</label><br/>
    <label> <input type='radio' name ='role'value='Admin'/>Admin</label><br/>
    </fieldset>
    <br/>
    <br/>
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