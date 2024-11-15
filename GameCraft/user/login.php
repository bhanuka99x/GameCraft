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
            header("../user_management.php");
        } else {
            header("../home.php");
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
    <title>Login Form</title>
    <link rel="stylesheet" href="./CSS/login.css">
</head>

<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="login-container">

            <div class="login-container">
                <h1>Login</h1>
                <form action="login.php" method="POST">
                    <label for="username">User name:</label>
                    <input type="text" id="username" name="username" required autocomplete="off">

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required autocomplete="off">

                    <input type="submit" name="login" value="Login">
                </form>

                <div class="register-link">
                    <p>Already have an account? <a href="./register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>