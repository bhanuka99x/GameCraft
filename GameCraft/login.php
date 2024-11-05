<?php
include_once 'connection.php';

session_start();

//email and password
$user=["users@gmail.com"=>"password123"];
$admin=["admin@gmail.com" => "password123"];

$error="";

// check form is submitted & remove whitespace
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=trim($_POST["email"]);
    $password=trim($_POST["password"]);

    //verify email & password
    if(isset($user[$email])&& $user[$email]===$password){

        $_SESSION["user"] = $email; // Store email in session
        $_SESSION["role"] = $users[$email]["role"];// Store user role in session
        
        //redirect user_management page
        if($_SESSION["role"]=== $admin){
        header("Location:user_management.php");
        }else{
        //Redirect home page
        header("Location:home.php");
    }
    exit();
}else{
    $error="Inavalid email or password";
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
        <form action="home.php" method="POST">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required autocomplete="off">

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
   






