<!-- rename later -->
<?php
    // returns an sqli results obj
    function login($database, $email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $query = mysqli_query($database, $sql);
        return $query;
    }
    //returns boolean
    //ONLY WRITES TO email and password. **********
    function signup($database, $firstName, $lastName, $country, $city, $address, $email, $password){
        $id = $_SESSION['userID'];
        
        $sql = "INSERT INTO users"
            . " VALUES ('$id', '$lastName', '$firstName', '$email', '$password', '$country', '$city', '$address', 'false')";
        $query = mysqli_query($database, $sql);
        return $query;
    }

    function changePassword($database, $email, $password){
        $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
        $query = mysqli_query($database, $sql);
        return $query;
    }
    function getOrder($database, $userID){
        $sql = "SELECT * FROM order_" . $userID;
        $query = mysqli_query($database, $sql);
        return $query;
    }
    function showOrder($orderResults){
        while($row = mysqli_fetch_array($orderResults)){   //Creates a loop to loop through results
            echo "<tr><td>" . $row['ProductName'] 
            . "</td><td>" . $row['ProductID'] 
            . "</td><td>" . $row['Price'] 
            . "</td><td>" . $row['Quantity'] 
            . "</td><td>" . "<img src='images/{$row['ProductImage']}' alt='{$row['ProductName']}' height='69px'>"
            . "</td><td>" . $row['Subtotal']
            ."</td></tr>";  //$row['index'] the index here is a field name
            }
    }
?>