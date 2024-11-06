<?php
include_once 'connection.php';
 

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Using prepared statements with MySQLi
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt === false) {
        // Handle error in preparing the statement
        die('MySQL prepare error: ' . $conn->error);
    }

    // Bind the parameter to the prepared statement
    $stmt->bind_param("s", $username);
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        $pwdHashed = $row['password'];

        // Verify the password
        if (password_verify($password, $pwdHashed)) {
            if ($row["usertype"] == "user") {
                header("Location: home.php");
                exit();
            } elseif ($row["usertype"] == "admin") {
                header("Location: user_management.php");
                exit();
            }
        } else {
            header("Location: ../../../../zulo/pages/login.php?error=password");
            exit();
        }
    } else {
        // Handle case where no row is found
        header("Location: ../../../../zulo/pages/login.php?error=invalid");
        exit();
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
   






