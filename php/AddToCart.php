<?php
        if(!isset($_SESSION))
        {
            session_start();
        }
        
        //Connect to database
        include("DBConnect.php");

        //Get table name for the cart
        $cartID = "cart_" . $_SESSION['userID'];

        //Get posted productID for item to be added
        $productID = $_POST['productID'];
        
        //Get info for that product
        $getProduct = mysqli_query($database, "SELECT * FROM product_table WHERE ProductID='$productID'");
        $product = mysqli_fetch_array($getProduct);

        $productName = $product['ProductName'];
        $productID = $product['ProductID'];
        $price = $product['Price'];
        $productImage = $product['ProductImage'];
        $onSale = $product['OnSale'];
        $SalePrice = $product['SalePrice'];       

        //Check if onSale is true
        if($onSale == 1){
            $price = $SalePrice;
        }

        //Check if a quantity was posted, if it was, get it, else quantity is 1
        if(isset($_POST['quantity']))
        {
            $quantity = $_POST['quantity'];
        }
        else
        {
            $quantity = 1;
        }

        //Set subtotal value
        $subtotal = $quantity * $price;

        //Check if cart exists, if it doesnt create the users cart
        $getCart = mysqli_query($database, "SELECT * FROM $cartID ORDER BY ProductName");
        if(!$getCart){
            createCart();
        }
        
        //Add the product to the cart
        mysqli_query($database, "INSERT INTO $cartID(ProductName, ProductID, Price, Quantity, ProductImage, Subtotal) VALUES ('{$productName}', '{$productID}', '{$price}', '{$quantity}', '{$productImage}', '{$subtotal}')");        
?>    