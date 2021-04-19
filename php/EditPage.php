<?php
// include("DBConnect.php");

function AddNewProduct($database)
{
    global $database;
    $productName8 = $_POST['productname'];
    $productID8 = $_POST['productID'];
    $quantity8 = $_POST['productQuantity'];
    $price8 = $_POST['productPrice'];
    $productDetails8 =$_POST['description'];
    $aisle8 = $_POST['Aisle'];
    $productImage8 = $_POST['Image'];
    $weight8 = $_POST['Weight'];
    $onSale8 = $_POST['Sale'];
    $salePrice8 = $_POST['SalePrice'];


    $sql = "INSERT INTO product_table" 
            . " VALUES ('$productName8', '$productID8', '$aisle8', '$price8', '$quantity8', '$productDetails8', '$productImage8', '$weight8', '$onSale8', '$salePrice8')";
    $query = mysqli_query($database, $sql);
    return $query;
}

function SaveEditedProduct($database){
    global $database;
    $productName8 = $_POST['productname'];
    $productID8 = $_POST['productID'];
    $quantity8 = $_POST['productQuantity'];
    $price8 = $_POST['productPrice'];
    $productDetails8 =$_POST['description'];
    $aisle8 = $_POST['Aisle'];
    $productImage8 = $_POST['Image'];
    $weight8 = $_POST['Weight'];
    $salePrice8 = $_POST['SalePrice'];

   

    $sql = "UPDATE product_table SET ProductName ='$productName8', Aisle = '$aisle8', Price = '$price8', Stock = '$quantity8', ProductDescription = '$productDetails8', ProductImage =  '$productImage8', Weight = '$weight8', SalePrice = '$salePrice8' WHERE ProductID = '$productID8'" ;
    $query = mysqli_query($database, $sql);
    return $query;
}

?>
