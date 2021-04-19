<?php
    include("DBConnect.php");
    $id = $_GET['id'];

    $order = "order_".$id;
    mysqli_query($database,"DELETE FROM orders WHERE userID = $id");
    mysqli_query($database,"DROP TABLE $order");

    
    $orderFile = "../files/cart_$id.txt";
    unlink($orderFile);

    echo "<h1> $order has been deleted </h1>";
?>
<a href='../Backstore(P11).php'> <h3> Return to order list </h3> </a>