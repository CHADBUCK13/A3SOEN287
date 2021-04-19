<?php

    if(!isset($_SESSION))
    {
        session_start();
    }
    

    if((!isset($_SESSION['isAdmin']) || !$_SESSION['isAdmin'])){
        header('Location: ./NotAdmin.php');
        exit;
    }
?>