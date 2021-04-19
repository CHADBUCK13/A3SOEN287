-<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require "php/DBConnect.php";
    $messages = array();
    if(!$database){
        $messages[] = "NO conncetion";
    }else $messages[] = "we live baby";
    include "php/retrieveSignUp.php";
    include "php/accountFunctions.php";
    include "php/signupLogic.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        
        <!--Bootstrap Stuff-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/site.css" />
    </head>
    <body style="background-color: rgb(189, 189, 189);">
        <!--Include common header-->
        <?php include('Shared/Header.php');?> 
        
        <main>
            <div class="container-fluid signup">
                <h1 style="padding-left: 0;">Sign Up</h1>
                <form name="signup" method="POST" action="">
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="firstName">First Name:</label>
                            <input type="text" name="firstName" id="FirstName" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="lastName">Last Name:</label>
                            <input type="text" name="lastName" id="LastName" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="country">Country:</label>
                            <input type="text" name="country" id="Country" class="form-control" placeholder="Country" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="City" class="form-control" placeholder="City" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="Address" class="form-control" placeholder="Address" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="postal-code">Postal Code:</label>
                            <input type="text" name="postal-code" id="postal-code" class="form-control" placeholder="Enter postal code" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="email">Email:</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" onblur="validateEmail()" required>
                            <!-- onblur validates email -->
                        </div>
                        <div class="col-xs-6">
                            <label for="email">Confirm Email:</label>
                            <input type="email" name="confirmEmail" id="confirmEmail" class="form-control" placeholder="Confirm email" onblur="compareEmails()" required>
                            <!-- onblur checks if both emails match -->
                        </div>
                        <p id="emailMsg" style="padding-left: 15px;color: red;"></p>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="password">Confirm Password:</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm password" onblur="comparePasswords()" required>
                        </div>
                        <p id="passwordMsg" style="color: red; padding-left: 15px;"></p>
                    </div>
                    
                    <input type="submit" name="signup" value="Sign Up" class="btn btn-primary" style="width: 80px; margin: 10px auto;"/>
                    <input type="reset" value="Reset" class="btn btn-outline-secondary"/> 
                    

                    <script type="text/javascript" src="js/Login.js"></script>
                </form>
                <div>
                    <?php
                        if(isset($_SESSION['signupFeedback'])){
                            echo $_SESSION['signupFeedback'];
                            unset($_SESSION['signupFeedback']);
                        }
                    ?>
                </div>

            </div>
        </main>
        <!--Include common footer-->
        <?php include('Shared/Footer.php');?>
    </body>
</html>
