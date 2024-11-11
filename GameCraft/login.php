<?php
include_once 'connection.php';

// check form is submitted 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=($_POST["username"]);
    $password=($_POST["password"]);

    $sql= "select * from users where username='".$username."' AND password='".$pa."'";

    $result =mysqli_query($conn,$sql);

    $row =mysqli_fetch_array($result);

    if ($row["usertype"]=="user"){
        header("location:home.php");
    }
    elseif ($row["usertype"]=="admin"){
        header("location:user_management.php");
    }
    else{
        echo "username or password incorrect";
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
   






