<?php
// order_confirmation.php
$game_name = isset($_GET['game_name']) ? $_GET['game_name'] : '';
$game_price = isset($_GET['game_price']) ? $_GET['game_price'] : '';
$game_image = isset($_GET['game_image']) ? $_GET['game_image'] : '';
$message = isset($_GET['message']) ? $_GET['message'] : 'Order placed successfully!';
// process_payment.php

include_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    // Here you would add logic to process the payment information
    // For example, integrating with a payment gateway API

    // For demonstration, we'll just display a success message
    echo "Payment processed successfully for $cardholder_name.<br>";
    echo "Game: $game_name<br>";
    echo "Price: $game_price<br>";
    echo "<a href='store.php'>Return to Store</a>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="./CSS/confirmorder.css">
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item"></a>
            <a href="store.php" class="nav-item"></a>
            <a href="whitelist.php" class="nav-item"></a>
            <a href="library.php" class="nav-item"></a>
            <a href="cart.php" class="nav-item"></a>
        </nav>
        <nav class="nav-right">
            <a href="./user/login.php" class="l-btn"></a>
            <a href="./user/register.php" class="r-btn"></a>
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
        <form action="process_payment.php" method="post">
            <div class="payment-info">
                <label for="cardholder_name">Cardholder Name:</label>
                <input type="text" id="cardholder_name" name="cardholder_name" required>
                
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" required>
                
                <label for="expiration_date">Expiration Date:</label>
                <input type="text" id="expiration_date" name="expiration_date" placeholder="MM/YY" required>
                
                <label for="cvv">CVV:</label>
                <input type="text" id="cvv" name="cvv" required>
                
                <input type="hidden" name="game_name" value="<?php echo htmlspecialchars($game_name); ?>">
                <input type="hidden" name="game_price" value="<?php echo htmlspecialchars($game_price); ?>">
                <input type="hidden" name="game_image" value="<?php echo htmlspecialchars($game_image); ?>">
                
                <input type="submit" value="Place Order">
            </div>
        </form>
    </main>
    <?php include_once 'footer.php'; ?>
</body>
</html>
