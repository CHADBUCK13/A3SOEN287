<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("./php/checkAdmin.php");
    include("./php/DBConnect.php");
    include('./php/EditPage.php');
    $productName = $_GET['ProductName'];
 $productID = $_GET['ProductID'];
 $price = $_GET['Price'];
 $productImage = $_GET['ProductImage'];
 $productDetails = $_GET['ProductDescription'];
 $weight = $_GET['Weight'];
 $productQuantity = $_GET['Stock'];
 $productAisle = $_GET['Aisle'];
 $productWeight = $_GET['Weight'];
 $productOnSale = $_GET['Sale'];
 $productSalePrice = $_GET['SalePrice']; 

    if(isset($_POST['save'])){

        $query = SaveEditedProduct($database);
        if($query){
           
            $message = "Your Information has been changed";
        }else{
            $message = "There is a problem " ;        
        }

    }
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
<?php include('./Shared/backstoreHeader.php');

?>
<div id = "page-container">
 <main>
<h4>Edit product page</h4>
<h1 id = "sfh1">Edit Product</h1>
<form name="editProdctForm" method="post" action="">
    <br/>
    <br/>
        <h5 id = 'sfh5'>Product Name:</h5>
        <input  type = 'text' id = 'productname' name = 'productname' value = '<?=$productName?>' class = 'change-product-name'>
    <br/>
    

    <br/>
        <h5 id = 'sfh5'>Inventory: </h5>
        <h6 id = 'shift'><i>Quantity</i></h6>
        <input type = 'text' id = 'Inventoryoption' name = 'productQuantity' value = '<?=$productQuantity?>' class = 'change-inventory-option'>
    <br/>

    <br/>
        <h5 id = 'sfh5'>Price:</h5>
        <input type = 'text' id = 'price' name = 'productPrice' value = '<?=$price?>' class = 'change-price'>
    <br/>

    <br/>
        <h5>Product description</h5> 
        <textarea type = 'textarea' name = 'description' class = 'productdescription' ><?=$productDetails?></textarea>
    <br/>
    
    <br/>
        <h5>Product Aisle</h5> 
        <input type = 'text' name = 'Aisle' class = 'productaisle' value = '<?=$productAisle?>' >
    <br/>
    
    <br/>
        <h5>Product Image</h5> 
        <input type = 'text' name = 'Image' class = 'productimage' value = '<?=$productImage?>'>
    <br/>
    
    <br/>
        <h5>Product Weight</h5> 
        <input type = 'text' name = 'Weight' class = 'productWeight' value = '<?=$productWeight?>'>
    <br/>
    
    <br/>
        <h5>Product Sale Price</h5> 
        <input type = 'text' name = 'SalePrice' class = 'productSalePrice' value = '<?=$productSalePrice?>'>
    <br/>
    

    <br/>
        <input type = 'submit' name='save' value='Save' ></input>
    
</form>
<?
    if(isset($message)){
        $message 
    }

?>


</div>
</main>


<!--Include common footer-->
<?php
        include("Shared/Footer.php")
    ?>

</body>
</html>