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

if (isset($_POST['add_whitelist'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_image = $_POST['game_image'];

    // Fix the column name in the SELECT statement
    $select_whitelist = mysqli_query($conn, "SELECT * FROM whitelist WHERE wname = '$game_name'");

    if (mysqli_num_rows($select_whitelist) > 0) {
        $message[] = 'Product already added to whitelist';
    } else {
        $insert_whitelist = mysqli_query($conn, "INSERT INTO  whitelist(wname, wprice, wimage) VALUES ('$game_name', '$game_price', '$game_image')");
        $message[] = 'Product added to whitelist successfully';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>GameCraft</title>

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="./CSS/store.css">

    <script defer src="./JS/store.js"></script>
</head>
<body>

<header>
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item">Home</a>
            <a href="store.php" class="nav-item">Store</a>
            <a href="whitelist.php" class="nav-item">whitelist</a>
            <a href="library.php" class="nav-item">Library</a>
            <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM cart") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>
        <a href="cart.php" class="nav-item">Cart<span><?php echo $row_count; ?></span></a>
        </nav>
        <nav class="nav-right">
            <a href="#" class="l-btn">Login</a>
            <a href="#" class="r-btn">Register</a>
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
        <img src="./Images/<?php echo $fetch_product['gimage']; ?>" alt="Game Image">
        <div class="games-info">
            <h4 class="games-title"><?php echo $fetch_product['gname']; ?></h4>
            <p class="games-price"><b><?php echo $fetch_product['gprice']; ?></b></p>
            <input type="hidden" name="game_name" value="<?php echo $fetch_product['gname']; ?>">
            <input type="hidden" name="game_price" value="<?php echo $fetch_product['gprice']; ?>">
            <input type="hidden" name="game_image" value="<?php echo $fetch_product['gimage']; ?>">
          <div class="btn"> 
            <input type="submit" class="buynow-btn" value="add whitelist" name="add_whitelist" >
            <br>
            <button><input type="submit" class="buynow-btn" value="Buy Now" name="buy_now"></button>
            <button><input type="submit" class="cart-btn" value="Add to Cart" name="add_to_cart"></button>
            </div> 
        </div>
    </div>
</form>
<?php
    };
};
?>
</main>

<?php include_once 'footer.php'; ?>
</body>
</html>
