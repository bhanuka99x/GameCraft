<?php
include_once 'connection.php';


if (isset($_POST['delete_library'])) {
    $game_name = mysqli_real_escape_string($conn, $_POST['game_name']);

    // Delete the item from the whitelist
    $delete_query = "DELETE FROM library WHERE lname='$game_name'";
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
    <link rel="stylesheet" href="./CSS/library.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item">Home</a>
            <a href="store.php" class="nav-item">Store</a>
            
            <a href="whitelist.php" class="nav-item">whitelist</a>
            <?php
                $select_rows = mysqli_query($conn, "SELECT * FROM library") or die('query failed');
                $row_count = mysqli_num_rows($select_rows);
            ?>
            
            <a href="library.php" class="nav-item">Library<span><?php echo $row_count; ?></span></a>
            
        <a href="cart.php" class="nav-item">Cart</a>
        </nav>
        <nav class="nav-right">
            <a href="#" class="l-btn"></a>
            <a href="#" class="r-btn"></a>
        </nav>
    </header>
    <main>
        <?php
        $select_library = mysqli_query($conn, "SELECT * FROM library");
        if (mysqli_num_rows($select_library) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($select_library)) {
        ?>
        <form action="" method="post">
            <div class="games">
                <img src="./Images/<?php echo $fetch_product['limage']; ?>" alt="Game Image">
                <div class="games-info">
                    <h4 class="games-title"><?php echo $fetch_product['lname']; ?></h4>
                    <p class="games-price"><b><?php echo $fetch_product['lprice']; ?></b></p>
                    <input type="hidden" name="game_name" value="<?php echo $fetch_product['lname']; ?>">
                    <input type="hidden" name="game_price" value="<?php echo $fetch_product['lprice']; ?>">
                    <input type="hidden" name="game_image" value="<?php echo $fetch_product['limage']; ?>">
                    <div class="btn">
                        <button type="submit" class="cart-btn" name="add_to_cart">Download</button>
                        <br>
                        <button type="submit" class="delete-btn" name="delete_library">Remove game</button>
                        <br>
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
