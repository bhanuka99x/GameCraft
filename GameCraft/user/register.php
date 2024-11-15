<?php
include_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password === $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email,$hashed_password);

        if ($stmt->execute()) {
            header("../user/login.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Passwords do not match.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>

<body>



    <div class="register-container">
        <h1>Register </h1>
        <form action="register.php" method="POST">
            <label for="user name">Username: </lable><br>
                <input type="text" id="username" name="username" required autocomplete="off"><br>

                <label for="eamil">Email: </lable><br>
                    <input type="text" id="email" name="email" required autocomplete="off"><br>

                    <label for="password">Password: </lable><br>
                        <input type="password" id="password" name="password" required autocomplete="off"><br>

                        <label for="confirm_password">Confirm Password: </lable><br>
                            <input type="password" id="confirm_password" name="confirm_password" required
                                autocomplete="off"><br>

                            <input type="submit" name="register" value="Register"><br>
        </form>

        <div class="login-link"><br>
            <p>Already have an account? <a href="./login.php">Login here</a></p>
        </div>
    </div>
    <section class="page-section">
        <div class="character-container">
            <!-- Replace with the actual image of the gaming character -->
            <img src="./Images/8.jpg" alt="Gaming Character">
        </div>
    </section>
</body>

</html>