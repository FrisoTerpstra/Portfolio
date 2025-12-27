<?php
$host = "mysql";
$user = "root";
$password = "qwerty";
$db = "user";

session_start();

$data = mysqli_connect($host, $user, $password, $db);

if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if($row["usertype"] == "user"){

        $_SESSION["username"] = $username;
        header("location:portfoliouser.php");
    }

    elseif($row["usertype"] == "admin"){

        $_SESSION["username"] = $username;
        header("location:portfolioadmin.php");
    }

    else{
        echo "username or password incorrect";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    
    <h1>Login Page</h1>
    <form action="#" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="remember">Remember Me:</label>
            <input type="checkbox" id="remember" name="remember">
        </div>
        <div>
            <input type="submit" value="Login">
        </div>
    </form>


</body>
</html>