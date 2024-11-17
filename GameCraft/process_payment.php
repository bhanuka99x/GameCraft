<?php
include_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    // Here you would add logic to process the payment information
    // For example, integrating with a payment gateway API

    // Check if the game is already in the library
    $select_library = mysqli_query($conn, "SELECT * FROM library WHERE lname = '$game_name'");

    if (mysqli_num_rows($select_library) > 0) {
        $message = 'Product already in the library';
    } else {
        // Insert the game into the library table
        $insert_library = mysqli_query($conn, "INSERT INTO library (lname, lprice, limage) VALUES ('$game_name', '$game_price', '$game_image')");
        
        if ($insert_library) {
            $message = 'Payment processed successfully. Product added to your library.';
        } else {
            $message = 'Failed to add product to the library. Please try again.';
        }
    }

    // Redirect to library.php with a success message
    header("Location: library.php?message=" . urlencode($message));
    exit();
}
?>

<?php
session_start();
@include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $card_holder_name = $_POST['card_holder_name'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $ccv = $_POST['ccv'];

    // Validate card details (this is a simplified example; in reality, you would perform more rigorous validation)
    if (empty($card_holder_name) || empty($card_number) || empty($expiry_date) || empty($ccv)) {
        echo "All fields are required.";
        exit;
    }

    // Simulate a payment process (you should integrate with a real payment gateway here)
    // Example: using Stripe, PayPal, etc.

    // If payment is successful, clear the cart and redirect to a success page
    mysqli_query($conn, "DELETE FROM `cart` WHERE 1");
    header('location:payment_success.php');
    exit;
} else {
    header('location:payment.php');
    exit;
}
?>

<?php
session_start();
@include 'connection.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $card_holder_name = $_POST['card_holder_name'];
    $card_number = $_POST['card_number'];
    $expiry_date = $_POST['expiry_date'];
    $ccv = $_POST['ccv'];

    // Fetch all items from the cart
    $select_cart = mysqli_query($conn, "SELECT * FROM cart");
    if (mysqli_num_rows($select_cart) > 0) {
        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
            $lname = $fetch_cart['cname'];
            $lprice = $fetch_cart['cprice'];
            $limage = $fetch_cart['cimage'];

            // Insert each item into the library table
            $insert_library = mysqli_query($conn, "INSERT INTO library (lname, lprice, limage) VALUES ('$lname', '$lprice', '$limage')");
        }

        // Clear the cart
        $clear_cart = mysqli_query($conn, "DELETE FROM cart");

        // Redirect to a success page
        header('Location: success.php');
    } else {
        // If the cart is empty, redirect back to the cart page
        header('Location: cart.php');
    }
}
?>
