<?php
session_start();
@include 'connection.php';

// Retrieve cart data for display
$select_cart = mysqli_query($conn, "SELECT * FROM cart");
$grand_total = 0;
if (mysqli_num_rows($select_cart) > 0) {
    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        $grand_total += (float) $fetch_cart['cprice'];
    }
} else {
    // Redirect back to cart if no items are found
    header('Location: cart.php');
    exit();
}

$message = isset($_GET['message']) ? $_GET['message'] : 'Order placed successfully!';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardholder_name = $_POST['cardholder_name'];
    $card_number = $_POST['card_number'];
    $expiration_date = $_POST['expiration_date'];
    $cvv = $_POST['cvv'];

    // Handle all cart items
    mysqli_data_seek($select_cart, 0); // Reset the result pointer to the beginning
    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        $game_name = $fetch_cart['cname'];
        $game_price = $fetch_cart['cprice'];
        $game_image = $fetch_cart['cimage'];

        $select_library = mysqli_query($conn, "SELECT * FROM library WHERE lname = '$game_name'");
        if (mysqli_num_rows($select_library) > 0) {
            $message = 'Product already in the library';
        } else {
            $insert_library = mysqli_query($conn, "INSERT INTO library (lname, lprice, limage) VALUES ('$game_name', '$game_price', '$game_image')");
            if ($insert_library) {
                $message = 'Payment processed successfully. Product added to your library.';
            } else {
                $message = 'Failed to add product to the library. Please try again.';
            }
        }
    }

    header("Location: library.php?message=" . urlencode($message));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/checkout.css">
    <title>Checkout</title>
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
    <div class="all-con">
    <div class="container">
        <h1 class="heading">Order Confirmation</h1>
        <table>
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
            </thead>
            <tbody>
                <?php 
                if (mysqli_num_rows($select_cart) > 0) {
                    mysqli_data_seek($select_cart, 0); // Reset the result pointer to the beginning
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $fetch_cart['cimage']; ?>" height="100" alt=""></td>
                    <td><?php echo $fetch_cart['cname']; ?></td>
                    <td>$<?php echo $fetch_cart['cprice']; ?></td>
                </tr>
                <?php
                    }
                }
                ?>
                <tr class="table-bottom">
                    <td colspan="2">Grand Total</td>
                    <td>$<?php echo $grand_total; ?>/-</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="form-container">
        <h1 class="heading">Enter Card Details</h1>
        <form action="" method="POST" class="payment-form">
            <div class="form-group">
                <label for="card_holder_name">Card Holder Name</label>
                <input type="text" id="card_holder_name" name="cardholder_name" required>
            </div>
            <div class="form-group">
                <label for="card_number">Card Number</label>
                <input type="text" id="card_number" name="card_number" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="text" id="expiry_date" name="expiration_date" placeholder="MM/YY" required>
            </div>
            <div class="form-group">
                <label for="ccv">CCV</label>
                <input type="text" id="ccv" name="cvv" required>
            </div>
            <input type="submit" value="Submit Payment">
        </form>
    </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>
