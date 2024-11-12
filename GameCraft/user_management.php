<?php
require 'connection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit;
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: admin.php");
    exit;
}

$result = $conn->query("SELECT * FROM users");
$user_count = $result->num_rows;
?>
<link rel="stylesheet" href="./CSS/user_manage.css">
<h1>Admin Panel</h1>
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
            
            <button> <a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></button>
          <button><a href="admin.php?delete=<?php echo $row['id']; ?>">Delete</a></button>
    
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<button><a href="logout.php">Logout</a></button>
