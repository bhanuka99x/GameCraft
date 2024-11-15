<?php
// order_confirmation.php
$game_name = isset($_GET['game_name']) ? $_GET['game_name'] : '';
$game_price = isset($_GET['game_price']) ? $_GET['game_price'] : '';
$game_image = isset($_GET['game_image']) ? $_GET['game_image'] : '';
$message = isset($_GET['message']) ? $_GET['message'] : 'Order placed successfully!';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="./CSS/store.css">
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item">Home</a>
            <a href="store.php" class="nav-item">Store</a>
            <a href="whitelist.php" class="nav-item">Whitelist</a>
            <a href="library.php" class="nav-item">Library</a>
            <a href="cart.php" class="nav-item">Cart</a>
        </nav>
        <nav class="nav-right">
            <a href="./user/login.php" class="l-btn">Login</a>
            <a href="./user/register.php" class="r-btn">Register</a>
        </nav>
    </header>
    <main>
        <h1><?php echo $message; ?></h1>
        <div class="games">
            <img src="./Images/<?php echo htmlspecialchars($game_image); ?>" alt="Game Image">
            <div class="games-info">
                <h4 class="games-title"><?php echo htmlspecialchars($game_name); ?></h4>
                <p class="games-price"><b><?php echo htmlspecialchars($game_price); ?></b></p>
            </div>
        </div>
        <a href="store.php" class="btn">Continue Shopping</a>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>
