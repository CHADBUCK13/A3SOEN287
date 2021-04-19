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
    <!-- <script src="js\remove.js"></script> -->
    
<link rel = "stylesheet" href="css/site.css">
    </head>


<?php
    include('./Shared/backstoreHeader.php');
?>

<div id = "page-container">
    <main>
    <h1>List of Users</h1>
    <!-- <input type = "text" style="visibility: hidden"> -->
    <!-- <button type = "button" id = "delete" class="mainDeleteButton">Delete selected</button> -->
    
  
<center>
    <table id="user-table"> 
        <?php
        include('./php/ShowUserList.php');
        showUsers();
        ?> 
</table>
<p> <br/> <br/></p>
<button type = "button" style="visibility: hidden">Search
</button>
<a href = "Backstore(P10).php">
<button  type = "button" id = "add" class="addCheckedRows" style="font-size: 30px">Add</button> </a>
</center>
</div>
</main>

</body>
    <!--Include common footer-->
    <?php
        include("Shared/Footer.php")
    ?>
</html>
