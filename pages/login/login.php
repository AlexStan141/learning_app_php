<?php

require "../../functions.inc.php";
require "../../db.php";

$err = null;

if($_SERVER['REQUEST_METHOD'] === "POST"){
    $username = e($_POST["username"]);
    $password = e($_POST['password']);
    if(empty($username) || empty($password)){
        $err = "Please fill all the fields";
    } else {
        $verify = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $verify->execute([$username]);
        $user = $verify->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            header("Location: " . "../dashboard/dashboard.php");
            die();
        } else {
            $err = "Invalid username or password";
        }
    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label>
            Username
            <input type="text" name="username" />
        </label>
        <label>
            Password
            <input type="password" name="password" />
        </label>
        <input type="submit" value="Submit"></input>
    </form>
    <p><?php echo $err ?? '' ?></p>
</body>
</html>