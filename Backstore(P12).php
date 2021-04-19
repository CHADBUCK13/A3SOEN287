<?php
    include("./php/checkAdmin.php");
?>

<!DOCTYPE html>
<html lang = "en">
    <head>
        
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src = "js/OrderProfile.js"></script>
    <title>Order Profile</title>
    
<link rel = "stylesheet" href="css/site.css">

    </head>
<?php
    include("./Shared/backstoreHeader.php");
?>


    <h1>Edit Order Profile</h1>
    <br/>

    <h3>Edit Information:</h3>
    <?php
        include("php/getOrders.php");
        displayOrder(); 
    ?>
   
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
<br/>
<br/>
<br/>
    

</body>
<br/>
<br/>
<br/>
<br/>

<footer class="bg-primary text-white text-lg-start">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 customer-service">
                <h5 class="text-uppercase">Customer Service</h5>

                <ul class="list-unstyled mb-0">
                    <li>
                        <a href="#!" class="text-light">Contact us</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Terms and conditions</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">Find a store</a>
                    </li>
                    <li>
                        <a href="#!" class="text-light">FAQ</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2021 Copyright:
        <a class="text-light" href="../index.html">Hole Foods</a>
    </div>

</footer>
</html>