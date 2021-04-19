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
    <title>More Details</title>

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
        <!--Container for details-->
        <div class="productDetails">
            <?php
                //Show specified product details
                include("php/ShowDetails.php");
                showDetails();
            ?>        
        </div>
    </main>

    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>
</body>
</html>