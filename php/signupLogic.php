<?php
    if(isset($_POST['signup'])){
        //check if user submitted form
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //validate email
                if ($email == $confirmEmail){
                    if($password == $confirmPassword){
                        $query = signup($database, $firstName, $lastName, $country, $city, $address, $email, $password);
    
                        //successful query
                        if ($query === true){
                            $_SESSION['signupFeedback'] = "User $email signed up successfully!";
                            $_SESSION['loggedIn'] = true;
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            $_SESSION['isAdmin']= false;
                            header("Location: index.php");
                        }
                        else{
                            $_SESSION['signupFeedback'] = "User $email could not be added to the database, please try again.";
                        }
                    }else{
                        $_SESSION['signupFeedback'] = "Passwords do not match!";
                    }
                }else{
                    $_SESSION['signupFeedback'] = "Emails do not match!";
                }
            }else{
                $_SESSION['signupFeedback'] = "Invalid email " . $email;
            }
            
        }else $_SESSION['signupFeedback'] = "no posty:(";
    }
?>