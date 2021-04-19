<?php
include("DBConnect.php");


function createProductTableRows(){
   
    global $database;
    $getProducts = mysqli_query($database, "SELECT * FROM product_table ORDER BY ProductName");  
    echo"
   
    <tr>
    <td> </td>
    <td><h4><i>Product Name</i></h4></td>
    <td><h4><i>Product ID</i></h4></td>
    <td><h4><i>Quantity</i></h4></td>
    <td><h4><i>Price</i></h4></td>
    <td><a href = 'Backstore(P8Add).php'> <button  type = 'button' id = 'add' class='addCheckedRows'>Add</button></a></td>
    </tr>
    ";
    
    while($products = mysqli_fetch_array($getProducts)){
  
        $productName = $products['ProductName'];
        $productID = $products['ProductID'];
        $price = $products['Price'];
        $productImage = $products['ProductImage'];
        $productDetails = $products['ProductDescription'];
        $weight = $products['Weight'];
        $productQuantity = $products['Stock'];
        $productAisle = $products['Aisle'];
        $productWeight = $products['Weight'];
        $productOnSale = $products['OnSale'];
        $productSalePrice = $products['SalePrice']; 
    

       echo "
        <tr>
        <td class = 'productpic' id = 'productpic'><img src = 'images/$productImage' id = 'centerimage'
             alt = '$productName' width = '150' height = '100'>
        </td>     
        <td class = 'productname'><h5 id  = 'sfh5'>$productName</h5></td>
        <td class = 'productID'><h5 id = 'sfh5'>$productID</h5></td>
        <td class = 'productquantity'><h5 id = 'sfh5'>$productQuantity</h5></td>
        <td class = 'productprice'><h5 id = 'sfh5'>$price</h5></td>
        <td id = 'rightmargin'><a href = 'Backstore(P8Edit).php?ProductID=$productID&ProductName=$productName&Price=$price&ProductImage=$productImage
        &ProductDescription=$productDetails&Weight=$weight&Stock=$productQuantity&Aisle=$productAisle&Weight=$productWeight&Sale=$productOnSale&SalePrice=$productSalePrice'><button  type = 'button' id = 'edit' >Edit</button></a>
        
        
        <a href = './php/deleteProduct.php?ProductID=$productID'> 
        <button type = 'button' id = 'delete' class = 'btn-remove'>Delete</button></td>
        </a>
       
        </tr>
        
        
        "; 


    }
}
?>