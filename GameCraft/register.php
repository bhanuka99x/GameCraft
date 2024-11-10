<?php
include_once 'connection.php';

//form handling
if (isset($_POST['register'])){
    $username= ($_POST['username']);
    $email= ($_POST['Email']);
    $password= ($_POST['password']);
    $confirm_password=($_POST['confirm_password']);

    // validation
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
       
        //insert database
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="./CSS/register.css">
</head>
<body>
    <div class="register-container">
        <h1>Register </h1>
        <form action="register.php" method="POST">
            <label for="user name">Username: </lable>
            <input type="text" id="username" name="username" required autocomplete="off">

            <label for="eamil">Email: </lable>
            <input type="text" id="Email" name="Email" required autocomplete="off">

            <label for="password">Password: </lable>
            <input type="password" id="password" name="password" required autocomplete="off">

            <label for="confirm_password">Confirm Password: </lable>
            <input type="password" id="confirm_password" name="confirm_password" required autocomplete="off">

            <input type="submit" name="register" value="Register">
        </form>

        <div class="login-link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div> 
        </div>
</body>
</html>