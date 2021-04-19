<?php
    include("DBConnect.php");

    $id = $_GET['id'];

        $order = "order_".$id;

        $getUser = mysqli_query($database,"SELECT * FROM users WHERE userID=$id");
        $user = mysqli_fetch_array($getUser);
        $fname = $user['firstName'];
        $lname = $user['lastName'];
        $email = $user['email'];
        $subject = "Order Confirmation";
        $message = "Hello $fname $lname, your order is updated!";
        mail($email,$subject,$message);


    $order = $_GET['order'];
    $productsInOrder = mysqli_query($database, "SELECT * FROM $order ORDER BY ProductName");  
            while($products = mysqli_fetch_array($productsInOrder)){
                $productID = $products['ProductID'];
                
                $quantityName = "amount_".$productID;
                $newQuantity = $_POST[$quantityName];
                
                mysqli_query($database,"UPDATE $order SET Quantity=$newQuantity WHERE ProductID=$productID");                
            }
?>

<h1 style='color: Black;'> Your order has been updated </h1>
<h1><a href='../Backstore(P11).php'> Return to order list </a></h1>
