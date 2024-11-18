<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Managment</title>
    <link rel="stylesheet" href="./CSS/user_manage.css">
</head>
<body>
   
<header>
        <nav class="nav-left">
            <a href="home.php" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item"></a>
            <a href="Managment.php" class="nav-item">Admin home</a>
            <a href="whitelist.php" class="nav-item"></a>
            <a href="library.php" class="nav-item"></a>
            <a href="cart.php" class="nav-item"></a>
        </nav>
        <nav class="nav-right">
            <a href="../user/login.php" class="l-btn"></a>
            <a href="../user/register.php" class="r-btn"></a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

</body>
</html>




<?php
require 'connection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: ");
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location:user_management.php");
    exit;
}

$result = $conn->query("SELECT * FROM users");
$user_count = $result->num_rows;
?>



<link rel="stylesheet" href="./CSS/user_manage.css">

<p>Total Users: <?php echo $user_count; ?></p>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['role']; ?></td>
        <td>
            
            <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a>
          <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    
        </td>
    </tr>
    <?php endwhile; ?>
</table>

