<?php

session_start();
if(!isset($_SESSION["username"])){
    header("location:hacker.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>

    <?php echo $_SESSION["username"]?>

    <a href="logout.php">Logout</a> 
    
</body>
</html>