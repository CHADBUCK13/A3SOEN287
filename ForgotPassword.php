<?php 
    if(!isset($_SESSION))
    {
        session_start();
    }
    include "php/DBConnect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $message = "";
    include "php/accountFunctions.php";

    if(isset($_POST['submit'])){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($confirmPassword === $password){
                $results = login($database, $email);
                foreach($results as $r){
                    if($email === $r['email']){
                        changePassword($database, $email, $password);
                        $_SESSION['pwChangeSuccess'] = true;
                        $_SESSION['loginFeedback'] = "Password changed successfully! You can now log in with your new password.";
                        header("Location: login.php");
                    }
                }
                if(!$_SESSION['pwChangeSuccess'])
                    $message = "Error changing password. Please try again.";
            }
            else{
                $message = "Passwords do not match!";
            }
        }
        else{
            $message = "Invalid email";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forgot password</title>
    
    <!--Bootstrap stuff-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="css/site.css" />
</head>
<body style="background-color: rgb(189, 189, 189);">
<!-- <body> -->
    <!--Include common header-->
    <?php include('Shared/Header.php');?> 

    <main>
    <div class="container-fluid signup">
        <h2>Forgot password</h2>
        <form name="forgotPassword" id="forgotPasswordModal" method="post" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="passwordEmail" placeholder="Enter email" required>
            </div>
            <div class="form-group row">
                <div class="col-xs-6">
                    <label for="password">New Password:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password" required>
                </div>
                <div class="col-xs-6">
                    <label for="password">Confirm New Password:</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm new password" required>
                </div>
            </div>    
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            <input type="reset" value="Reset" class="btn btn-outline-secondary"/>                                    
        </form>
        <div>
            <?php
                echo $message;
            ?>
        </div>
    </div>

    
    </main>

    <!--Include common footer-->
    <?php include('Shared/Footer.php');?>  

</body>
</html>