<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>

    <!--Bootstrap stuff-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="css/site.css" />
    
</head>
<body>
    <!--Include common header-->
    <?php
        include("Shared/Header.php")
    ?>
    
    <main>        
        <!--Container for all products and on sale products-->
        <div id="productRow" class="container">           
            <!--Put all products-->
            <div class="row">
                <?php     
                    //Get all products from database and display 
                    include("php/getProducts.php");              
                    getAllProducts();
                ?>            
            </div>

            <!--Put all on sale products-->
            <div class="row" id="specialsRow">
                <div class="col-md-12">
                    <h2 id="specials">Weekly Specials</h2>
                </div>
                <div class="col-md-12" id="saleItems">
                    <?php      
                        //Get all on sale products from database and display                   
                        getOnSaleProducts();
                    ?>                     
                </div>            
            </div>
        </div>
    </main>

    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>

    
</body>
</html>