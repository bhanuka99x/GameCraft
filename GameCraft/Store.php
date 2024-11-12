<?php
include_once 'connection.php';

if (isset($_POST['add_to_cart'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    // Fix the column name in the SELECT statement
    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE cname = '$game_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO cart (cname, cprice, cimage) VALUES ('$game_name', '$game_price', '$game_image')");
        $message[] = 'Product added to cart successfully';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameCraft</title>
    <link rel="stylesheet" href="./CSS/store.css">
    <script defer src="./JS/store.js"></script>
</head>
<body>

<header>
    <span>GameCraft</span>
    <a href="home.php">Home</a>
    <a href="store.php">Store</a>
    <a href="Library.php">Library</a>
    <a href="cart.php">Cart</a>
    <div class="btns">
    </div>
</header>



<main>
<?php
$select_products = mysqli_query($conn, "SELECT * FROM product");
if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
?>
<form action="" method="post">
    <div class="games">
        <img src="./Images/<?php echo $fetch_product['gimage']; ?>" alt="Game Image">
        <div class="games-info">
            <h4 class="games-title"><?php echo $fetch_product['gname']; ?></h4>
            <p class="games-price"><b><?php echo $fetch_product['gprice']; ?></b></p>
            <input type="hidden" name="game_name" value="<?php echo $fetch_product['gname']; ?>">
            <input type="hidden" name="game_price" value="<?php echo $fetch_product['gprice']; ?>">
            <input type="hidden" name="game_image" value="<?php echo $fetch_product['gimage']; ?>">
          <div class="btn"> 
            <button><input type="submit" class="buynow-btn" value="Buy Now" name="buy_now"></button>
            <button><input type="submit" class="cart-btn" value="Add to Cart" name="add_to_cart"></button>
            </div> 
        </div>
    </div>
</form>
<?php
    }
}
?>
</main>

<?php include_once 'footer.php'; ?>
</body>
</html>
