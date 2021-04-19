<?php
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    include("DBConnect.php");

    $productID = $_GET['ProductID'];
    mysqli_query($database, "DELETE FROM product_table WHERE ProductID = $productID");

    echo "<h1 style='color: Black;'> To admin: Product $productID has succesfully been deleted <h1>";
    echo "<h1><a href ='../Backstore(P7).php'> Go back to list of Products</a><h1>";
?>