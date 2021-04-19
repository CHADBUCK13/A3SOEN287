<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    //Connect to database
    include("DBConnect.php");

    //Get cart table
    $cartID = "cart_" . $_SESSION['userID'];
    
    //Creates a new cart table in the database based on a template and put quantity check over 0
    function createCart(){
        global $database;
        global $cartID;
        
        mysqli_query($database, "CREATE TABLE $cartID AS SELECT * FROM shopping_cart");
        mysqli_query($database, "ALTER TABLE $cartID ADD CHECK (Quantity >= 0)");
    }    

    //Display all products in users cart
    function showCartProducts(){
        global $database;
        global $cartID;
        
        //If cart does not exist, create it and get users cart table
        $getCart = mysqli_query($database, "SELECT * FROM $cartID ORDER BY ProductName");
        if(!$getCart){
            createCart();
            $getCart = mysqli_query($database, "SELECT * FROM $cartID ORDER BY ProductName");
        }
            
        //Boolean to check if there is something in cart
        $entered = false;
        
        //Loop through each of the rows in the cart table
        while($products = mysqli_fetch_array($getCart)){
            //Get all necessary info for display
            $entered = true;
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $quantity = $products['Quantity'];

            //Make unique ID
            $displayedPrice = "price".$productID;

            $itemSubtotal = $products['Subtotal'];

            //Make unique IDs
            $deleteformID = "deleteForm".$productID;
            $increaseQuantityFormID = "increaseQuantityForm".$productID;
            $decreaseQuantityFormID = "decreaseQuantityForm".$productID;

            //Display the row from the cart
            echo 
            "                
                    <div class='productInCart'>
                        <img src='images/$productImage' alt='$productName'>
                        <h2>$productName</h2>
                        <h4 style = 'color: green; display: inline;' id='$displayedPrice'> $price$/unit </h4>

                        
                            
                            <script src='js/Increment.js'></script>
                            <div id='chooseQnt'>
                                <p id='quantityLabel'><b>Quantity: </b></p>
                                
                                <script>
                                        $(document).ready(function(){
                                            var form = $('#$decreaseQuantityFormID');

                                            form.submit(function(){
                                                
                                                $.ajax({
                                                    url: 'php/DecreaseItemQuantity.php',
                                                    type: 'post',
                                                    data: {
                                                        productID: '$productID',
                                                    },
                                                });
                                            });
                                        });
                                </script>
                                <form id='$decreaseQuantityFormID' class='increment-form'>  
                                    <button class='increment-button' id='decrease' type='submit' value='Decrease Value'>
                                        <span class='glyphicon glyphicon-minus' style='font-size: 15px'></span>
                                    </button>
                                </form>
                                <input type='text' name='quantity' id='$productID' value='$quantity'>

                                <script>
                                $(document).ready(function(){
                                    var form = $('#$increaseQuantityFormID');

                                    form.submit(function(){
                                        
                                        $.ajax({
                                            url: 'php/IncreaseItemQuantity.php',
                                            type: 'post',
                                            data: {
                                                productID: '$productID',
                                            },
                                        });
                                    });
                                });
                                </script>
                                <form id='$increaseQuantityFormID' class='increment-form'>  
                                    <button class='increment-button' id='increase' type='submit' value='Increase Value'>
                                        <span class='glyphicon glyphicon-plus' style='font-size: 15px'></span>
                                    </button> 
                                </form>
                                <p id='subTotalDisplay'><span class='subtotal'>$itemSubtotal</span>$</p>
                            </div>
                        

                        <script>
                                $(document).ready(function(){
                                    var form = $('#$deleteformID');

                                    form.submit(function(){
                                        
                                        $.ajax({
                                            url: 'php/DeleteFromCart.php',
                                            type: 'post',
                                            data: {
                                                productID: '$productID',
                                            },
                                        });
                                    });
                                });
                        </script>
                        <form id='$deleteformID'>      
                            <button type='submit' id='cartBtn' name='productID' value='$productID'>
                                <span class='glyphicon glyphicon-folder-close'> Delete</span>
                            </button>                                 
                        </form>
                    </div>            
                   
            ";
        }

        //If loop was never entered, there is the nothing in the cart
        if(!$entered)
        {
            echo "
                    <div class='col-md-9'>
                        <h2 style = 'margin-top:50px'>Looks like there is nothing in your cart!</h2>      
                    </div>
                ";
        }
    }

    //Show cost information based on users cart
    function showCartSummary(){
        global $database;
        global $cartID;
        $getSubtotal = mysqli_query($database, "SELECT SUM(Subtotal) FROM $cartID");

        //Display formatted string representing subtotal taxes and total
        $subtotal = number_format(mysqli_fetch_row($getSubtotal)[0], 2, '.', '');
        $gst = number_format($subtotal * 0.05, 2, '.', '');
        $qst = number_format($subtotal * 0.1, 2, '.', '');
        $total = number_format($subtotal + $qst + $gst, 2, '.', '');

        //Display above information
        echo "
    
            <hr>
            <h1>Cart Summary</h1>
            <hr>

            <div class='cost' id='subtotal'>
                <p style='float:left;'><b>Subtotal</b> </p>
                <p style='float:right;' id='subtotalValue'>$subtotal$</p>
            </div>

            <div class='cost' id='gst'>
                <p style='float:left;'><b>GST</b> </p>
                <p style='float:right;' id='gstValue'>$gst$</p>
            </div>

            <div class='cost' id='qst'>
                <p style='float:left;'><b>QST</b> </p>
                <p style='float:right;' id='qstValue'>$qst$</p>
            </div>
            <hr style='margin-top:50px'>
            <div class='cost' id='Total'>                        
                <p style='float:left; font-size: 20px'><b>Total</b> </p>
                <p style='float:right; font-size: 20px'>$total$</p>               
            </div>

            <div id='checkOutBtns'>
                <form action='php/CheckOut.php' method='post'>
                    <button type='submit' id='cartBtn' style='margin-left: 30px'>
                        CHECK OUT
                    </button>
                </form>
                <a href='AllProducts.php'>
                    <button id='cartBtn'>
                        CONTINUE SHOPPING
                    </button> 
                </a> 
            </div>
    
        ";
    }
?>