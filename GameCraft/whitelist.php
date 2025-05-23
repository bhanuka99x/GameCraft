<?php
include_once 'connection.php';


if (isset($_POST['delete_whitelist'])) {
    $game_name = mysqli_real_escape_string($conn, $_POST['game_name']);

    // Delete the item from the whitelist
    $delete_query = "DELETE FROM whitelist WHERE wname='$game_name'";
    $delete_result = mysqli_query($conn, $delete_query);

    if ($delete_result) {
        echo "<script>alert('Item deleted successfully');</script>";
    } else {
        echo "<script>alert('Failed to delete item');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/whitelist.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item">Home</a>
            <a href="store.php" class="nav-item">Store</a>
            <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM whitelist") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
            ?>
            <a href="whitelist.php" class="nav-item">whitelist<span><?php echo $row_count; ?></a>
            <a href="library.php" class="nav-item">Library</a>
            
        <a href="cart.php" class="nav-item">Cart</a>
        </nav>
        <nav class="nav-right">
            <a href="#" class="l-btn">Login</a>
            <a href="#" class="r-btn">Register</a>
        </nav>
    </header>
    <main>
        <?php
        $select_whitelist = mysqli_query($conn, "SELECT * FROM whitelist");
        if (mysqli_num_rows($select_whitelist) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_whitelist)) {
        ?>
        <form action="" method="post">
            <div class="games">
                <img src="./Images/<?php echo $fetch_product['wimage']; ?>" alt="Game Image">
                <div class="games-info">
                    <h4 class="games-title"><?php echo $fetch_product['wname']; ?></h4>
                    <p class="games-price"><b><?php echo $fetch_product['wprice']; ?></b></p>
                    <input type="hidden" name="game_name" value="<?php echo $fetch_product['wname']; ?>">
                    <input type="hidden" name="game_price" value="<?php echo $fetch_product['wprice']; ?>">
                    <input type="hidden" name="game_image" value="<?php echo $fetch_product['wimage']; ?>">
                    <div class="btn">
                        <button type="submit" class="buynow-btn" name="buy_now">Buy Now</button>
                        <button type="submit" class="cart-btn" name="add_to_cart">Add to Cart</button>
                        <br>
                        <button type="submit" class="delete-btn" name="delete_whitelist">Delete Whitelist</button>
                    </div> 
                </div>
            </div>
        </form>
        <?php
            }
        }
        ?>
    </main>
</body>
</html>
