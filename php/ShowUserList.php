<?php
    include("DBConnect.php");

    function showUsers() {
        global $database;
        $getUsers = mysqli_query($database, "SELECT * FROM users ORDER BY userID");  

        echo"<tr>
                <td style='text-align:center'><h4><i>Name</i></h4></td>
                <td style='text-align:center'><h4><i>User ID</i></h4></td>
                <td style='text-align:center'><h4><i>email</i></h4></td>
                <td style='text-align:center'><h4><i>Country</i></h4></td>
                <td style='text-align:center'><h4><i>City</i></h4></td>
                <td style='text-align:center'><h4><i>Address</i></h4></td>
                <td style='text-align:center'><h4><i>Role</i></h4></td>
                <td style='text-align:center'></td>
            </tr>";

            while($users = mysqli_fetch_array($getUsers)){
                $userID = $users['userID'];
                $lastName = $users['lastName'];
                $firstName = $users['firstName'];
                $email = $users['email'];
                $password = $users['password'];
                $country = $users['country'];
                $city = $users['city'];
                $address = $users['address'];
                $isAdmin = $users['isAdmin'];

                if ($isAdmin == 0) {
                    $isAdmin = 'User'; 
                }
                else if ($isAdmin == 1) {
                    $isAdmin = 'Admin';
                }

                echo 
                "<tr class='userRow'>
                    <td style='text-align:center' class='user-name'><h5>$lastName $firstName</h5></td>     
                    <td style='text-align:center' class='user-id'><h5>$userID</h5></td>
                    <td style='text-align:center' class='user-email'><h6>$email</h6></td>
                    <td style='text-align:center' class='user-country'><h5>$country</h5></td>
                    <td style='text-align:center' class='user-city'><h5>$city</h5></td>
                    <td style='text-align:center' class='user-address'><h5>$address</h5></td>
                    <td style='text-align:center' class='user-address'><h5>$isAdmin</h5></td>
                    <td id = 'rightmargin'>
                    <a href='EditUserPage.php?userID=$userID&firstName=$firstName&lastName=$lastName&email=$email
                    &country=$country&city=$city&address=$address&password=$password'> 
                        <button  type = 'button' id = 'edit'> Edit</button>
                    </a> 
                    <a href = './php/deleteUser.php?userID=$userID'>   
                        <button type = 'button' id = 'delete' class='btn-remove'>
                            Delete
                        </button>
                    </a>
                    </td>
                </tr>";
            }
    }
?>