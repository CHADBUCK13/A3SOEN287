<?php
    if(!isset($_SESSION))
        {
            session_start();
        }
    
    //Connect to database
    include("DBConnect.php");

    //Get cart table
    $cartID = "cart_" . $_SESSION['userID'];

    //Get productID for product that should decrease quantity
    $productID = $_POST['productID'];
    
    //Increase quantity and update subtotal
    mysqli_query($database, "UPDATE $cartID SET quantity = quantity + 1 WHERE ProductID = $productID");
    mysqli_query($database, "UPDATE $cartID SET Subtotal = quantity * Price WHERE ProductID = $productID");
    
?>