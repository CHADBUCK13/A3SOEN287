<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Home</title>
    <meta charset="utf-8">



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

    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>
</body>

</html>