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
    <link rel="stylesheet" href="../../general.css">
    <link rel="stylesheet" href="./login.css">
    <title>Document</title>
</head>
<body>
    <h1>Login</h1>
    <?php echo $err ? "<p class='err'>{$err}</p>" : '' ?>
    <form method="POST" action="login.php">
        <div>
            <label for="username">Username*</label>
            <input type="text" name="username" />
        </div>
        <div>
            <label for="password">Password*</label>
            <input type="password" name="password" />
        </div>
        <input type="submit" value="Submit"></input>
    </form>
    <p>You don't have an account? <a href="../register/register.php">Register</a></p>
</body>
</html>