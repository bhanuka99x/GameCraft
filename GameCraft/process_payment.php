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
