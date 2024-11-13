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
        <nav class="nav-left">
            <a href="#" class="logo">Gamecraft</a>
            <a href="home.php" class="nav-item">Home</a>
            <a href="store.php" class="nav-item">Store</a>
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
