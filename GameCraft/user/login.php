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

        $file_path = '../home.php';
        $file_path1 ='../user_management.php';

        if ($user['role'] == 'admin') {
            header("Location: $file_path1");
        } else {
            header("Location: $file_path");
        }
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
?>

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