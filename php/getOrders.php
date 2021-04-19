<?php

include("DBConnect.php");

function displayOrders(){
    global $database;

    $getUsersThatOrdered = mysqli_query($database, "SELECT * FROM orders ORDER BY userID");    

    while($usersThatOrdered = mysqli_fetch_array($getUsersThatOrdered)){
        $id = $usersThatOrdered['userID'];
        $order = "order_".$id;

        $productsInOrder = mysqli_query($database, "SELECT * FROM $order ORDER BY ProductName");  

        echo"
        <div class = 'table-responsive' id = 'cart1'>
        <center><table>
            <label>
               <h3><u>Order #$id</u></h3>
            </label>

            <tr>
                <td></td>
                <td><i><h4>Product</h4></i></td>
                <td><i><h4>Quantity</h4></i></td>
                <td><i><h4>Price</h4></i></td>
                <td><a href='Backstore(P12).php?id=$id'><button type = 'button' id='edit'> Edit</button> </a> <a href='php/DeleteOrder.php?id=$id' > <button type = 'button' id='delete'>Delete </button></a></td>
            </tr>
        ";
        
        while($products = mysqli_fetch_array($productsInOrder)){
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $quantity = $products['Quantity'];

            echo"        
                <tr>
                    <td><center><img src = './images/$productImage'
                        alt = '$productName' width = '100' height = '100' style='object-fit: contain;'></center></td>
                    <td><h5>$productName</h5></td>
                    <td>
                        <h5>$quantity</h5>                    
                    </td>
                    <td><h5>$price$</h5></td>
                    <td> 
                        
                        <a href='php/DeleteItemFromOrder.php?productID=$productID&order=$order'> <button type = 'button'  id='delete'>Delete</button> </a>
                    </td>
                </tr>       

            
        ";       
        }

        echo"
            </table></center>
            </div>
            <br>
            <br>
            <br>
        ";
    }
    
}

function displayOrder(){
    global $database;    

        $id = $_GET['id'];

        $order = "order_".$id;

        $getUser = mysqli_query($database,"SELECT * FROM users WHERE userID=$id");
        $user = mysqli_fetch_array($getUser);
        $fname = $user['firstName'];
        $lname = $user['lastName'];
        $email = $user['email'];
        
        echo"
        <b>Change Name:</b>
        <input type = 'text' id = 'name' name = 'name' value = '$fname $lname'>
        <br/>
        <br/>

        <b>Change Email Address:</b>
        <input type = 'text' id = 'address' name = 'address' value = '$email'>
        <br/>
        <br/>

        <form action = ''>
            <label><b>Change Delivery Method:</b></label>
            <select name = 'delivery'>
                <option value = 'pickup'>Pickup</option>
                <option value = 'delivery'>Delivery</option>
            </select>
        </form>
        <br/>
        <br/>
        <div class = 'table-responsive' id = 'cart1'>
        <form name = 'order' action='php/updateOrder.php?order=$order' method='POST'>
        <center><table>
            <label>
               <h3><u>Cart Order #$id</u></h3>
            </label>

            <tr>
                <td></td>
                <td><i><h4>Product</h4></i></td>
                <td><i><h4>Quantity</h4></i></td>
                <td><i><h4>Price</h4></i></td>
                <td></td>
                
            </tr>
        ";
        
        $productsInOrder = mysqli_query($database, "SELECT * FROM $order ORDER BY ProductName");  
        while($products = mysqli_fetch_array($productsInOrder)){
            $productName = $products['ProductName'];
            $productID = $products['ProductID'];
            $price = $products['Price'];
            $productImage = $products['ProductImage'];
            $quantity = $products['Quantity'];

            echo"        
                <tr>
                    <td><center><img src = './images/$productImage'
                        alt = '$productName' width = '100' height = '100' style='object-fit: contain;'></center></td>
                    <td><h5>$productName</h5></td>
                    <td>
                        <input type = 'text' size = '5' value = '$quantity' name = 'amount_$productID'>                   
                    </td>
                    <td><h5>$price$</h5></td>
                    <td> 
                        
                        <a href='php/DeleteItemFromOrder.php?productID=$productID&order=$order&email=$email' id='delete'> Delete </a>
                    </td>
                </tr>             
        ";       
        }

        echo"
            </table></center>
            <br/>
            <br/>
            <br/>
            <center><button type='submit'> Save </button></center>
            </form>
            </div>
            <br>
            <br>
            <br>
        ";
    
    
}

?>