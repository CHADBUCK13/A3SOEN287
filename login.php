<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    include "php/DBConnect.php";
    include "php/retrieveLogIn.php";
    include "php/accountFunctions.php";
    include "php/loginLogic.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        
        <!--Bootstrap stuff-->
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
                <h1 style="padding-left: 0;">Log In</h1>
                <form name="login" id="loginForm" method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" onblur="validateEmail()" required> 
                        <p id="emailMsg" style="color: red;"></p>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        <p id="passwordMsg" style="color: red;"></p>
                    </div>
                    <input type="submit" name="login" value="Log In" class="btn btn-primary"/>
                    <input type="reset" value="Reset" class="btn btn-outline-secondary"/>
                    
                    <p style="float:right"><a href="ForgotPassword.php">Forgot password?</a></p>
                    </br></br>
                    <p style="float:right">Not a member? <a href="signup.php">Sign Up</a></p>
                    
                    <script type="text/javascript" src="js/Login.js"></script>
                </form>
                
                <div>
                    <?php
                        if(isset($_SESSION['loginFeedback'])){
                            echo $_SESSION['loginFeedback'];
                            unset($_SESSION['loginFeedback']);
                        }
                    ?>
                </div>
            </div>
        </main>

        <!--Include common footer-->
        <?php include('Shared/Footer.php');?>  
    </body>
</html>
