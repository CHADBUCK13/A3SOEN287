<?php
    session_start();
    include "DBConnect.php";
    if(!$database){
        echo "NO conncetion";
    }else echo "we live baby";
    if(isset($_POST['new'])){
        // $sql = "INSERT INTO users (firstName, lastName, country, city, address, email, password)
        //         VALUES ('KAGUYASAMA', 'DeLisi', 'USA', 'Philadelphia', '4700 onetrick', 'cashew@gmail.com', 'MTD')";
        $sql = "INSERT INTO users (firstName, lastName)
                VALUES ('KAGUYASAMA', 'IMPALa')";
        if($query1 = mysqli_query($database, $sql)){
            echo "BRITTA";
        }
        else echo " query error ";
    }else echo "not set";

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>testtt</title>
        
        <!--Bootstrap stuff-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="css/site.css" />
</head>
<body>
    <form method="post" action="" name="new">
        <input type="text" name="text">
        <input type="submit" name="new" value="Create"/>
    </form>
    <?="how life goes" . $message?>
    <br>
    shirfaced
</body>
</html>