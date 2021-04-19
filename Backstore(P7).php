<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include("./php/checkAdmin.php");
?>
<!DOCTYPE html>
<html lang = "eng">
    <head>
            <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="js/js7.js"></script>

<link rel = "stylesheet" href="css/site.css">

    </head>


    <body>
<?php 
include('./Shared/backstoreHeader.php');

?>
    <div id = "page-container">
        <main>
   

   <div class ='page-container'>
        <h1 id = 'sfh1'>Products</h1>
       
        
   </div>
    
   <table id = 'user-table'>
    <?php
    include('./php/P7Table.php');
    createProductTableRows();
    ?>
    </table>

</div>
</main>

<!--Include common footer-->
<?php
        include("Shared/Footer.php")
    ?>

</body>
</html>
