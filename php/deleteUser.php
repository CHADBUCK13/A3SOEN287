<?php
    
    if(!isset($_SESSION))
    {
        session_start();
    }

    include("DBConnect.php");

    $userID = $_GET['userID'];
    mysqli_query($database, "DELETE FROM users WHERE userID = $userID");

    echo "<h1 style='color: orange;'> To admin: User $userID has succesfully been deleted <h1>";
    echo "<h1><a href ='../Backstore(P9).php'> Go back to list of Users </a><h1>";
?>