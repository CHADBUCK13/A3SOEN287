<?php
    if(!isset($_SESSION))
        {
            session_start();
        }
    
    //Connect to database
    include("DBConnect.php");

    //Get cart table
    $cartID = "cart_" . $_SESSION['userID'];
    
    //Get productID for product that should be deleted from the cart
    $productID = $_POST['productID'];

    //Delete row from cart table that has the above productID
    mysqli_query($database, "DELETE FROM $cartID WHERE ProductID = $productID");
?>