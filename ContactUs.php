<?php
    session_start();

    include "php/DBConnect.php";
    include "php/accountFunctions.php";
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Contact Us</title>
        
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
                <h1 style="padding-left: 0;">Contact Us</h1>
                <form name="login" id="loginForm" method="POST" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        <p id="emailMsg" style="color: red;"></p>
                    </div>
                    <div class="form-group">
                        <label for="itemName">Item Name</label>
                        <input type="text" class="form-control" name="itemName" id="itemName" placeholder="Item Name">
                    </div>
                    <div class="form-group">
                        <label for="orderNumber">Order Number</label>
                        <input type="text" class="form-control" name="orderNumber" id="orderNumber" placeholder="Order Number">
                    </div>
                        
                    <label for="questions">Questions</label></br>
                    <textarea name="questions" form="contactUsForm" placeholder="Optional"></textarea>
                    </br>
                    <input style="float:right" type="submit" name="submit" class="btn btn-primary" value="Submit">
                </form>
                <div>
                    <?php
                        if(isset($_POST['submit'])){
                            include "php/retrieveContactForm.php";
                            //check for valid inputs
                            //email address
                            if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
                                //order number validation
                                $pattern = "/[#]\d{5}[a-z]{2}/i";
                                if(preg_match($pattern, $orderNumber) === 1){
                                    $sql = "SELECT * FROM users WHERE email = '$email'";
                                    $query = mysqli_query($database, $sql);
                                
                                    if(mysqli_num_rows($query) > 0){
                                        $userInfo = mysqli_fetch_array($query);
                                        $userID = $userInfo['userID'];
                                        
                                        //get products
                                        $orderResults = getOrder($database, $userID);
                                        // $order = mysqli_fetch_array($orderResults);
                                    }else{
                                        $_SESSION['contactFeedback'] = "User not found would you like to <a href='signup.php'>sign up</a>?";
                                    }
                                }else{
                                    $_SESSION['contactFeedback'] = "Invalid order number provided.";
                                }
                            }else{
                                $_SESSION['contactFeedback'] = "Invalid email address provided.";
                            }
                        }
                    ?>
                    
                </div>
                <div>
                    <?php
                        if(isset($_POST['submit'])){
                        if(isset($_SESSION['contactFeedback'])){
                            echo $_SESSION['contactFeedback'];
                            unset($_SESSION['contactFeedback']);
                        }
                        echo "</br></br>";
                        if(mysqli_num_rows($query) > 0){
                            echo "<h3>Your order:</h3>" ;
                        }
                    }
                    ?>
                    <table>
                        
                        <?php 
                        if(isset($_POST['submit'])){
                            showOrder($orderResults); 
                        }?>
                    </table>
                </div>
                
            </div>
        </main>

        <!--Include common footer-->
        <?php include('Shared/Footer.php');?>  
    </body>
</html>
