<?php
    //Connect to database
    include("DBConnect.php");

    //Show necessary details for specified product
    function showDetails(){

        global $database;

        //Get passed productID
        $getProductID = $_GET['productID'];

        //Get specified product row from product_table
        $getProduct = mysqli_query($database, "SELECT * FROM product_table WHERE ProductID='$getProductID'");
        $product = mysqli_fetch_array($getProduct);

        $productName = $product['ProductName'];
        $productID = $product['ProductID'];
        $price = $product['Price'];
        $weight = $product['Weight'];
        $productImage = $product['ProductImage'];
        $productDetails = $product['ProductDescription'];
        $onSale = $product['OnSale'];
        $SalePrice = $product['SalePrice'];

        //Create unique ID
        $formID = "form".$productID;

        //If on sale display in this format
        if($onSale == 1){
            echo "
            <div class='container'>
                <div class='row'>
                    <div class='col-md-6' id='productImage'>
                        <img src='images/$productImage' alt='$productName'>
                    </div>

                    <div class='col-md-6' id='addToCart'>
                        <h1>$productName</h1>
                        <h1 id = 'price' style='color:Green; margin-top:3%;'>$SalePrice$</h1>
                        <h3 id='salePrice'>$price</h3>
                        <p>$weight g</p>


                        <script>
                            $(document).ready(function(){
                                var form = $('#$formID');

                                form.submit(function(){
                                    
                                    $.ajax({
                                        url: 'php/AddToCart.php',
                                        type: 'post',
                                        data: {
                                            productID: '$productID',
                                            quantity: $('#$productID').val()
                                        },
                                    });
                                });
                            });
                        </script>
                        <form id='$formID'>
                            <script src='js/Increment.js'></script>

                            <div id='chooseQnt'>
                                <label for:'name'>Quantity: </label>
                                <div class='value-button' id='decrease' onclick=decreaseValue('$productID') value='Decrease Value'>
                                    <span class='glyphicon glyphicon-minus'></span>
                                </div>
                                <input type='text' name='quantity' id='$productID' value='1'>
                                <div class='value-button' id='increase' onclick=increaseValue('$productID') value='Increase Value'>
                                    <span class='glyphicon glyphicon-plus'></span>
                                </div> 
                                <p id='subTotalDisplay'><span id='subTotalID'>$SalePrice</span>$</p>
                            </div>
                            
                            
                            <button type='submit' id='cartBtn' name='productID' value='$productID'>
                                <span class='glyphicon glyphicon-shopping-cart'></span>
                            </button>       
                        </form>
                    </div>
                </div>
                
            </div>

            <div class='container'>
                <div class='col-md-12' style='margin-top:20px'>
                    <p>
                        <button class='btn' type='button' data-toggle='collapse' data-target='#collapseInfo'>More Info <span class='glyphicon glyphicon-chevron-down'></span></button>
                    </p>

                    <div id='collapseInfo' class='collapse'>
                        <div class='panel panel-body'>
                            $productDetails
                        </div>
                    </div>
                </div>
            </div>
        ";
        }

        //Else display in this format
        else{
            echo "
            <div class='container'>
                <div class='row'>
                    <div class='col-md-6' id='productImage'>
                        <img src='images/$productImage' alt='$productName'>
                    </div>

                    <div class='col-md-6' id='addToCart'>
                        <h1>$productName</h1>
                        <h1 id = 'price' style='color:Green; margin-top:3%;'>$price$</h1>
                        <p>$weight g</p>

                        <script>
                            $(document).ready(function(){
                                var form = $('#$formID');

                                form.submit(function(){
                                    
                                    $.ajax({
                                        url: 'php/AddToCart.php',
                                        type: 'post',
                                        data: {
                                            productID: '$productID',
                                            quantity: $('#$productID').val()
                                        },
                                    });
                                });
                            });
                        </script>
                        <form id='$formID'>
                            <script src='js/Increment.js'></script>

                            <div id='chooseQnt'>
                                <label for:'name'>Quantity: </label>
                                <div class='value-button' id='decrease' onclick=decreaseValue('$productID') value='Decrease Value'>
                                    <span class='glyphicon glyphicon-minus'></span>
                                </div>
                                <input type='text' name='quantity' id='$productID' value='1'>
                                <div class='value-button' id='increase' onclick=increaseValue('$productID') value='Increase Value'>
                                    <span class='glyphicon glyphicon-plus'></span>
                                </div> 
                                <p id='subTotalDisplay'><span id='subTotalID'>$price</span>$</p>
                            </div>
                            
                            <button type='submit' id='cartBtn' name='productID' value='$productID'>
                                <span class='glyphicon glyphicon-shopping-cart'></span>
                            </button>       
                        </form>
                    </div>
                </div>
                
            </div>

            <div class='container'>
                <div class='col-md-12' style='margin-top:20px'>
                    <p>
                        <button class='btn' type='button' data-toggle='collapse' data-target='#collapseInfo'>More Info <span class='glyphicon glyphicon-chevron-down'></span></button>
                    </p>

                    <div id='collapseInfo' class='collapse'>
                        <div class='panel panel-body'>
                            $productDetails
                        </div>
                    </div>
                </div>
            </div>
        ";
        }
        

    }

?>