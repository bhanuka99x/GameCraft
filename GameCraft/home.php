<?php
include_once 'connection.php';
$query = "SELECT * FROM home";
$result = $conn->query($query);
$carouselItems = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameCraft</title>
    <link rel="stylesheet" href="./CSS/home.css">
</head>
<body>

<header>
    <span>GameCraft</span>
    <a href="home.php">Home</a>
    <a href="store.php">Store</a>
    <a href="Library.php">Library</a>
    <a href="cart.php">Cart</a>
    <div class="btns">
        <button class="l-btn">Login</button>
        <button class="s-btn">Sign up</button>
    </div>
</header>

<!-- carousel -->
<div class="carousel">
    <!-- list item -->
    <div class="list">
        <?php foreach ($carouselItems as $item): ?>
            <div class="item">
                <img src="./Images/<?php echo $item['himage']; ?>" alt="">
                <div class="content">
                    <div class="topic"><?php echo $item['hname']; ?></div>
                    <p class="des"><?php echo $item['hdes']; ?></p>
                    <div class="buttons">
                        <button><a href="store.php">Shop Now</a></button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- list thumbnail -->
    <div class="thumbnail">
        <?php foreach ($carouselItems as $item): ?>
            <div class="item">
                <img src="./Images/<?php echo $item['himage']; ?>" alt="<?php echo $item['hdes']; ?>">
                <div class="content">
                    <div class="title"><?php echo $item['hname']; ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- next prev -->
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <!-- time running -->
    <div class="time"></div>
</div>

<script src="./JS/home.js"></script>

<?php
include_once 'footer.php';
?>
</body>
</html>
