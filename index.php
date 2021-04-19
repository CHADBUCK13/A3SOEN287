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
        include('Shared/Header.php');
        //Create cart once per session or if cart was dropped
        if(!isset($_SESSION['cartCreated']) || !$_SESSION['cartCreated'])
        {        
            createCart();
            $_SESSION['cartCreated'] = true;
        }
    ?>  
      
    <main>
        <!-- jumbotron -->
        <div class="container" style="height: 80%; width: 80%;">
            <div class="jumbotron">
                <div class="inside-jumbotron">
                    <h1>Welcome! Check out the Deal of the Day!</h1>
                    <p>Ah ah, we have bare deals famski</p>
                    <p>Stop being a waste and bless up the mandem with your business</p>
                    <p><a class="btn btn-primary btn-lg" href="#" role="button"><span class="glyphicon glyphicon-tag"></span> Deal of the Day</a></p>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom: 20px; border-radius: 15px;">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="images/market.jpg" alt="market.jpg">
                    </div>
                
                    <div class="item">
                        <img src="images/bagels-slide.jpg" alt="holes-bg.jpg">
                        <div class="carousel-caption">
                            <h2>Fresh bagels!</h2>
                        </div>
                    </div>
                
                    <div class="item">
                        <img src="images/donut-rack.jpg" alt="donut-rack.jpg">
                        <div class="carousel-caption">
                            <h2>Come check out our homemade donuts!</h2>
                        </div>    
                    </div>
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- from  https://www.w3schools.com/bootstrap/bootstrap_carousel.asp-->

        <!-- thumbnails -->
        <!--Container for all products and on sale products-->
        <div id="productRow" class="container">           
            

            <!--Put all on sale products-->
            <div class="row" id="specialsRow">
                <div class="col-md-12">
                    <h2 id="specials">Weekly Specials</h2>
                </div>
                <div class="col-md-12" id="saleItems">
                    <?php      
                        //Get all on sale products from database and display                
                        include("php/getProducts.php");     
                        getOnSaleProducts();
                    ?>                     
                </div>            
            </div>
        </div>
    </main>
    <!--Include common footer-->
    <?php include('Shared/Footer.php');?>
</body>
</html>