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
        <h2>Register </h2>
        <form action="register.php" method="post">
            <label for="user name">Username: </lable>
            <input type="text" id="username" name="username" required auto complete="off">

            <label for="eamil">Email: </lable>
            <input type="text" id="Email" name="Email" required auto complete="off">

            <label for="password">Password: </lable>
            <input type="password" id="password" name="password" required auto complete="off">

            <label for="confirm_password">password: </lable>
            <input type="password" id="confirm_password" name="confirm_password" required auto complete="off">

            <input type="submit" name="register" value="Register">
        </form>

        <div class="login-link">
        <p>Already have an account? <a href="login.php">Login here</a></p>
        </div> 
        </div>
</body>
</html>