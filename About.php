<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>About</title>
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
    <main>
        <div id="about"class="container">
            <h1>
                Hole Foods is commited to whole foods
            </h1>
            <p>
                Here at Hole Foods we want to provide the healthiest and most delicious food with holes. We believe that food withs holes is the only way to trick your brain
                into thinking you are eating more calories than you actually are. I mean, what contains more calories, a donut with a hole or a donut without a hole? But your brain is gonna 
                say: "I ate a donut" either way.              
            </p>
            <br> 
            <img src="images\Charity.jpg" class="img-responsive"alt="Happy child with donut">
            <br> <br>
            <p>
                Hole foods donates thousands of donuts to children all around the world. We are also commited to teaching children holeology, the fastest growing religion in the world!
                We thank our lord and saviour <a href="https://holes.fandom.com/wiki/Mr._Sir_(Marion_Sevillon)">Mr. Sir</a> everyday for the opportunity to spread our message. With his heart
                wrenching story he inspired us to be the company we are today. Our company lives by the philosophy that Mr. Sir portrays in our religion's HOLEy book 
                <a href="https://en.wikipedia.org/wiki/Holes_(novel)">Holes</a> by Louis Sachar.
            </p>

            <img src="images/Mr_sir.jpg" class="img-responsive" alt="Mr. Sir">
        </div>
    </main>
    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>
    
</body>
</html>