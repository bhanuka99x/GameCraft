<?php
include_once 'connection.php';

if (isset($_POST['add_to_cart'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE cname = '$game_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Product already added to cart';
    } else {
        $insert_product = mysqli_query($conn, "INSERT INTO cart (cname, cprice, cimage) VALUES ('$game_name', '$game_price', '$game_image')");
        $message[] = 'Product added to cart successfully';
    }
}

if (isset($_POST['add_whitelist'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    $select_whitelist = mysqli_query($conn, "SELECT * FROM whitelist WHERE wname = '$game_name'");

    if (mysqli_num_rows($select_whitelist) > 0) {
        $message[] = 'Product already added to whitelist';
    } else {
        $insert_whitelist = mysqli_query($conn, "INSERT INTO whitelist (wname, wprice, wimage) VALUES ('$game_name', '$game_price', '$game_image')");
        $message[] = 'Product added to whitelist successfully';
    }
}

if (isset($_POST['buy_now'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    $select_orders = mysqli_query($conn, "SELECT * FROM orders WHERE oname = '$game_name'");

    if (mysqli_num_rows($select_orders) > 0) {
        $message[] = 'Product already added to order page';
    } else {
        $insert_orders = mysqli_query($conn, "INSERT INTO orders (oname, oprice, oimage) VALUES ('$game_name', '$game_price', '$game_image')");
        $message[] = 'Product added to orders successfully';
    }
    header("Location: order_confirmation.php?message=Please enter your Payment detail&game_name=".urlencode($game_name)."&game_price=".urlencode($game_price)."&game_image=".urlencode($game_image));
    exit();
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
<?php
$select_products = mysqli_query($conn, "SELECT * FROM product");
if (mysqli_num_rows($select_products) > 0) {
    while ($fetch_product = mysqli_fetch_assoc($select_products)) {
?>
<form action="" method="post">
    <div class="games">
        <img src="./Images/<?php echo htmlspecialchars($fetch_product['gimage']); ?>" alt="Game Image">
        <br>
        <div class="games-info">
            <h4 class="games-title"><?php echo htmlspecialchars($fetch_product['gname']); ?></h4>
            <p class="games-price"><b><?php echo htmlspecialchars($fetch_product['gprice']); ?></b></p>
            <input type="hidden" name="game_name" value="<?php echo htmlspecialchars($fetch_product['gname']); ?>">
            <input type="hidden" name="game_price" value="<?php echo htmlspecialchars($fetch_product['gprice']); ?>">
            <input type="hidden" name="game_image" value="<?php echo htmlspecialchars($fetch_product['gimage']); ?>">
            <div class="btn"> 
                <br>
                <input type="submit" class="buynow-btn" value="Add Whitelist" name="add_whitelist">
                <br>
                <input type="submit" class="buynow-btn" value="Buy Now" name="buy_now">
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
