<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    //Connect to database
    include("DBConnect.php");

    //Get cart table
    $cartID = "cart_" . $_SESSION['userID'];

    //If cart does not exist, create it and in either case get cart
    $getCart = mysqli_query($database, "SELECT * FROM $cartID ORDER BY ProductName");
    if(!$getCart){
        createCart();
        $getCart = mysqli_query($database, "SELECT * FROM $cartID ORDER BY ProductName");
    }

    //Create file and write each prodcut information in JSON format
    $cartFile = fopen('../files/'.$cartID.'.txt', 'w');
    fwrite($cartFile,"{\n");    
    while($products = mysqli_fetch_array($getCart)){
        $jsonFormat="
    {\n
        {\n
            'Product Name' = ". $products['ProductName'].",\n
            'Product ID' = ".$products['ProductID'].",\n
            'Price' = ".$products['Price'].",\n
            'Quantity' = ".$products['Quantity'].",\n
            'Subtotal' = ".$products['Subtotal'].",\n
        }\n
    },\n
";           

        fwrite($cartFile, $jsonFormat);
    }
    fwrite($cartFile, '}');

    //Close file and empty buffer
    fclose($cartFile);

    echo "Thanks for shopping with us! <br>";
    echo "This is your order: <br>";

    //Open previously created file and display its contents
    $cartFile = fopen('../files/'.$cartID.'.txt', 'r');
    while(!feof($cartFile)) {
        echo fgets($cartFile)."<br>";
    }

    //Close file and empty buffer
    fclose($cartFile);
    
    //Convert cart table in database to an order table
    $orderID = "order_" . $_SESSION['userID'];
    $userID = $_SESSION['userID'];
    mysqli_query($database, "CREATE TABLE $orderID AS SELECT * FROM $cartID");
    mysqli_query($database, "INSERT INTO orders(userID) VALUES ($userID)");
    mysqli_query($database, "DROP TABLE $cartID");
?>  