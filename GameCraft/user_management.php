<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Bar</title>
    <link rel="stylesheet" href="./CSS/umnav.css">
</head>

<body>


    <nav class="navbar">
        <h2>Admin panel</h2>
        <ul>
            <li><a href="user_management.php">Reg&Log</a></li>
            <li><a href="#about">Home</a></li>
            <li><a href="#services">Store</a></li>



        </ul>
    </nav>

</body>

</html>




<?php
require 'connection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: index.php");
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
<a href="logout.php">Logout</a>