<?php
    include("DBConnect.php");
    
    $productID = $_GET['productID'];
    $order = $_GET['order'];
    mysqli_query($database, "DELETE FROM $order WHERE productID=$productID");
    
    $email=$_GET['email'];
    $msg = "Hello $fname $lname, your order information has been successfully updated!";
    mail($email,"Order Confirmation", $msg);
?>

<h1> Your order has been updated </h1>
    <a href='../Backstore(P11).php'> <h3> Return to order list </h3> </a>