<?php
require 'connection.php';
session_start();

if ($_SESSION['role'] !== 'admin') {
    header("home.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id']; // Cast to an integer for safety
} else {
    header("user_management.php"); // If no ID is set, redirect back
    exit;
}

// Fetch the user info for confirmation
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    // If no user is found, redirect
    header("user_management.php");
    exit;
}

$stmt->bind_result($username);
$stmt->fetch();
?>
<style>
h2 {
    text-align: center;
}

h2 {
    color: #333;
    margin-bottom: 10px;

}

p {
    font-size: 16px;
    color: #555;
}


a {
    display: inline-block;
    padding: 10px 20px;
    margin: 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    text-align: center;
}


a[href*="delete"] {
    background-color: #e74c3c;
    /* Red */
}

a[href*="delete"]:hover {
    background-color: #c0392b;
}

/* No button (cancel deletion) */
a[href*="user_management.php"]:not([href*="delete"]) {
    background-color: #2ecc71;
}

a[href*="user_management.php"]:not([href*="delete"]):hover {
    background-color: #27ae60;
}
</style>


<h1>Confirm Deletion</h1>
<p>Are you sure you want to delete the user: <?php echo htmlspecialchars($username); ?>?</p>
<a href=" user_management.php?delete=<?php echo $id; ?>">Yes</a>
<a href="user_management.php">No</a>