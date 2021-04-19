<?php
    if(isset($_POST['login'])){
        $results = login($database, $email);

        // $results is a mysqli_result obj
        foreach($results as $r){
            // check if password matches whats in the database
            if($password === $r['password']){
                $_SESSION['loggedIn'] = true;
                $_SESSION['email'] = $r['email'];
                $_SESSION['password'] = $r['password'];
                $_SESSION['isAdmin'] = $r['isAdmin'];
                $_SESSION['userID'] = $r['userID'];

                header("Location: index.php");
            }
        }
        if(!$_SESSION['loggedIn']){
            $_SESSION['loginFeedback'] = "Invalid email or password.";
        }
    }
?>