<?php

    //Connect to database
    include("DBConnect.php");


    //Get and display all products in product_table
    function getAllProducts(){

        global $database;

        //Get product_table
        $getProducts = mysqli_query($database, "SELECT * FROM product_table ORDER BY ProductName");  
        
        //Display appropriate banner
        echo"
            <div class='container' style='position:relative; padding-left: 10px; margin:0'>
                <img src='images/AllBanner.jpg' class='img-responsive' alt=''>
                <div class='center'><b>All Products</b></div>
            </div>
        ";

        //Loop through product_table and display necessary information
        while($products = mysqli_fetch_array($getProducts)){
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $productDetails = $products['ProductDescription'];
            $weight = $products['Weight'];
            $onSale = $products['OnSale'];
            $SalePrice = $products['SalePrice'];

            //Create unique IDs
            $formID = "form".$productID;
            $popUpID = "addedToCart".$productID;            
            $saleID = "noSale";

            //If on sale make price the saleprice
            if($onSale == 1){
                $price = $SalePrice;
                $saleID="sale";
            }

            echo "
                <div class='col-md-3 col-sm-4'>
                    <a href='MoreDetails.php?productID=$productID'><img src='images/$productImage' alt='$productName' style='width:270px;height:180px; object-fit: cover;'></a>
                
                    <div>
                        <h4 class='productName'>$productName</h4>
                        <h4 class='price' id='$saleID'>$price $</h4>
                    </div>
                    <hr>
                    <p>$weight g</p>
                    <a href='MoreDetails.php?productID=$productID' class='btn btn-default'>More Details</a>
                    <script>
                        $(document).ready(function(){
                            var form = $('#$formID');

                            form.submit(function(e){
                                
                                $.ajax({
                                    url: 'php/AddToCart.php',
                                    type: 'post',
                                    data: {
                                        productID: '$productID'
                                    }
                                });
                                

                                e.preventDefault();
                            });
                        });
                    </script>
                    
                    <script src ='js/popUp.js'> </script>
                    <form method = 'post' id = '$formID' style = 'float: right;'>
                        <div class='popup'>
                            <span class='popup-text' id='$popUpID'>Added to Cart!</span>
                        </div>
                        <button class='btn btn-primary' type='submit'  onclick=popUp('$popUpID') name='productID' value='$productID'><span class='glyphicon glyphicon-shopping-cart'> Add To Cart</span></button>
                    </form>
                </div>
            ";
        }
    }

    //Get and display all products in specified aisle from product_table
    function getProductsByAisle($aisle){

        global $database;

        //Get all products from specified aisle
        $getProducts = mysqli_query($database, "SELECT * FROM product_table WHERE Aisle='$aisle' ORDER BY ProductName");    

        //Get correct banner and display
        $banner = $aisle.'banner';
        echo "
            <div class='container' style='position:relative; padding-left: 10px; margin:0'>
                <img src='images/$banner.jpg' class='img-responsive' alt=''>
                <div class='center'><b>$aisle</b></div>
            </div>
        ";

        //Loop through all products from specified aisle and display necessary information
        while($products = mysqli_fetch_array($getProducts)){
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $productDetails = $products['ProductDescription'];
            $onSale = $products['OnSale'];
            $SalePrice = $products['SalePrice'];
            $weight = $products['Weight'];

            //Create unique IDs
            $formID = "form".$productID;
            $popUpID = "addedToCart".$productID;   

            //If product is on sale, replace price by saleprice
            $saleID = "noSale";
            if($onSale == 1){
                $price = $SalePrice;
                $saleID="sale";
            }

            echo "
                <div class='col-md-3 col-sm-4'>
                    <a href='MoreDetails.php?productID=$productID'><img src='images/$productImage' alt='$productName' style='width:270px;height:180px; object-fit: cover;'></a>
                
                    <div>
                        <h4 class='productName'>$productName</h4>
                        <h4 class='price' id='$saleID'>$price $</h4>
                    </div>
                    <hr>
                    <p>$weight g</p>
                    <a href='MoreDetails.php?productID=$productID' class='btn btn-default'>More Details</a>

                    <script>
                        $(document).ready(function(){
                            var form = $('#$formID');

                            form.submit(function(e){
                                
                                $.ajax({
                                    url: 'php/AddToCart.php',
                                    type: 'post',
                                    data: {
                                        productID: '$productID'
                                    },
                                });

                                e.preventDefault();
                            });
                        });
                    </script>
                    <script src ='js/popUp.js'> </script>
                    <form method = 'post' id = '$formID' style = 'float: right;'>
                        <div class='popup'>
                            <span class='popup-text' id='$popUpID'>Added to Cart!</span>
                        </div>
                        <button class='btn btn-primary' type='submit'  onclick=popUp('$popUpID') name='productID' value='$productID'><span class='glyphicon glyphicon-shopping-cart'> Add To Cart</span></button>
                    </form>
                </div>
            ";
        }
    }

    //Display all products that are on sale
    function getOnSaleProducts(){
        global $database;

        //Get all products that are on sale
        $getProducts = mysqli_query($database, "SELECT * FROM product_table WHERE OnSale = '1' ORDER BY ProductName");  
        while($products = mysqli_fetch_array($getProducts)){
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $productDetails = $products['ProductDescription'];
            $onSale = $products['OnSale'];
            $SalePrice = $products['SalePrice'];
            $weight = $products['Weight'];

            //Create unique IDs
            $formID = "formSpecial".$productID;
            $popUpID = "specialAddedToCart".$productID;   

            //If product is on sale, replace price by saleprice
            $saleID = "noSale";
            if($onSale == 1){
                $price = $SalePrice;
                $saleID="sale";
            }


            //Adding to cart is done through ajax script with AddToCart.php
            echo "
                <div class='col-md-3 col-sm-4'>
                    <a href='MoreDetails.php?productID=$productID'><img src='images/$productImage' alt='$productName' style='width:270px;height:180px; object-fit: cover;'></a>
                
                    <div>
                        <h4 class='productName'>$productName</h4>
                        <h4 class='price' id='$saleID'>$price $</h4>
                    </div>
                    <hr>
                    <p>$weight g</p>
                    <a href='MoreDetails.php?productID=$productID' class='btn btn-default'>More Details</a>
                    <script>
                        $(document).ready(function(){
                            var form = $('#$formID');

                            form.submit(function(e){
                                
                                $.ajax({
                                    url: 'php/AddToCart.php',
                                    type: 'post',
                                    data: {
                                        productID: '$productID'
                                    },
                                });

                                e.preventDefault();
                            });
                        });
                    </script>
                    <script src ='js/popUp.js'> </script>
                    <form method = 'post' id = '$formID' style = 'float: right;'>
                        <div class='popup'>
                            <span class='popup-text' id='$popUpID'>Added to Cart!</span>
                        </div>
                        <button class='btn btn-primary' type='submit'  onclick=popUp('$popUpID') name='productID' value='$productID'><span class='glyphicon glyphicon-shopping-cart'> Add To Cart</span></button>
                    </form>
                </div>
            ";
            
        }
    }



?>