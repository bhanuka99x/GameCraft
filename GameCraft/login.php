<?php
include_once 'connection.php';

// check if the form is submitted 
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();

        if ($row["usertype"] == "user") {
            header("Location: home.php");
            exit();
        } elseif ($row["usertype"] == "admin") {
            header("Location: user_management.php");
            exit();
        }
    } else {
        echo "Username or password is incorrect";
    }

    $stmt->close();
    $conn->close();
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
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div> 
    </div>

</body>
</html>
   






