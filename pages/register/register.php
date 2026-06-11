<?php

require "../../functions.inc.php";
require "../../db.php";

$err = null;


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/general.css">
    <link rel="stylesheet" href="../../assets/css/auth.css">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>
    <link rel="stylesheet" href="../../general.css">
    <link rel="stylesheet" href="./register.css">
    <?php echo $err ? "<p class='err'>{$err}</p>" : '' ?>
    <form method="POST" action="register.php">
        <div>
            <label for="first_name">First name*</label>
            <input type="text" name="first_name" id="first_name"/>
        </div>
        <div>
            <label for="last_name">Last name*</label>
            <input type="text" name="last_name" id="last_name"/>
        </div>
        <div>
            <label for="birth_date">Birth date*</label>
            <input type="date" name="birth_date" id="birth_date"/>
        </div>
        <div>
            <label for="username">Username*</label>
            <input type="text" name="username" id="username"/>
        </div>
        <div>
            <label for="password">Password*</label>
            <input type="password" name="password" id="password"/>
        </div>
        <input type="submit" value="Submit"></input>
    </form>
    <p>You already have an account? <a href="../login/login.php">Login</a></p>
</body>
</html>