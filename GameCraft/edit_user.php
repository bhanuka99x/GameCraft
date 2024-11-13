<?php
require 'connection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("Location: home.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, role=? WHERE id=?");
    $stmt->bind_param("sssi", $username, $email, $role, $id);
    $stmt->execute();
    header("Location: user_management.php");
    exit;
}
?>
<link rel="stylesheet" href="./CSS/edit_user.css">

<form method="POST" action="">
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
    <select name="role">
        <option value="user" <?php echo ($user['role'] == 'user') ? 'selected' : ''; ?>>User</option>
        <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
    </select>
    <button type="submit">Update User</button>
</form>
