<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include("./php/checkAdmin.php");
    include("./php/DBConnect.php");
    include('./php/EditPage.php');
    if(isset($_POST['save'])){
        

        $query = AddNewProduct($database);

        if($query === true){
            $message = "Your Information has been added";
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
<h4>Add/Edit product page</h4>
<h1 id = "sfh1">Add/Edit Product</h1>
<form name='editProdctForm' method='post' action=''>
    <br/>
    <br/>
        <h5 id = 'sfh5'>Product Name:</h5>
        <input  type = 'text' id = 'productname' name = 'productname' value = '' class = 'change-product-name'>
    <br/>

    <br/>
        <h5 id = 'sfh5'>Product ID:</h5>
        <input  type = 'text' id = 'productID' name = 'productID' value = '' class ='change-product-id'>
    <br/>
    
    <br/>
        <h5 id = 'sfh5'>Inventory: </h5>
        <h6 id = 'shift'><i>Quantity</i></h6>
        <input type = 'text' id = 'Inventoryoption' name = 'productQuantity' value = '' class = 'change-inventory-option'>
    <br/>

    <br/>
        <h5 id = 'sfh5'>Price:</h5>
        <input type = 'text' id = 'price' name = 'productPrice' value = '' class = 'change-price'>
    <br/>

    <br/>
        <h5>Product description</h5> 
        <textarea type = 'textarea' name = 'description' class = 'productdescription'></textarea>
    <br/>
    
    <br/>
        <h5>Product Aisle</h5> 
        <input type = 'text' name = 'Aisle' class = 'productaisle'>
    <br/>
    
    <br/>
        <h5>Product Image</h5> 
        <input type = 'text' name = 'Image' class = 'productimage'>
    <br/>
    
    <br/>
        <h5>Product OnSale (Enter 1 for yes and enter 0 for no): </h5> 
        <input type = 'text' name = 'Sale' class = 'productOnSale'>
    <br/>
    
    <br/>
        <h5>Product Weight</h5> 
        <input type = 'text' name = 'Weight' class = 'productWeight'>
    <br/>
    
    <br/>
        <h5>Product Sale Price</h5> 
        <input type = 'text' name = 'SalePrice' class = 'productSalePrice'>
    <br/>
    

    <br/>
        <input type = 'submit' name='save' value='Save' ></input>
    
</form>
<?php if(isset($message)){
        $message;
    }?>



</div>
</main>


<!--Include common footer-->
<?php include("Shared/Footer.php")?>

</body>
</html>
