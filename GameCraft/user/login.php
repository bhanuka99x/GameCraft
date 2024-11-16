<?php

include_once '../connection.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];


        if ($user['role'] == 'admin') {
            header("Location: ../user_managment.php");
        } else {
            header("Location: ../home.php");
        }
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/login.css">
    <title>Login</title>
</head>
<body>

<header>
        <nav class="nav-left">
            <a href="../" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item"></a>
            <a href="store.php" class="nav-item"></a>
            <a href="whitelist.php" class="nav-item"></a>
            <a href="library.php" class="nav-item"></a>
            <a href="cart.php" class="nav-item"></a>
        </nav>
        <nav class="nav-right">
            <a href="./user/login.php" class="l-btn"></a>
            <a href="./user/register.php" class="r-btn"></a>
        </nav>
    </header>
   <div class="container">
    <h1>Login</h1>
<form action="login.php" method="POST">
    <label for="username">User name:</label>
    <input type="text" id="username" name="username" required autocomplete="off">

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required autocomplete="off">

    <input type="submit" name="login" value="Login">
</form>

<div class="register-link">
    <p>Don't have an account? <a href="./register.php">Register here</a></p>
</div>

   </div>
</body>
</html>