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
    <title>Pantry</title>

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
        <!--Container for all products in Pantry aisle-->
        <div id="productRow" class="container">
            <div class="row">
                <?php
                    //Show all products in Pantry aisle
                    include("php/getProducts.php");
                    getProductsByAisle("Pantry");
                ?>            
            </div>
        </div>
    </main>
    
    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>

    
</body>
</html>