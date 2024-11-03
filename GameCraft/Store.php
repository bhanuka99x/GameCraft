<?php
include_once 'connection.php';

$sql="SELECT*FROM product";
$all_games = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./CSS/store.css">
    <script defer src="./JS/store.js"></script>
</head>
<body>
  
<main>
<?php
   while($row = mysqli_fetch_assoc($all_games)){
?>


 <div class="games">
	<img src="./Images/<?php echo $row["gimage"]; ?>" alt="Game Image">

	    <div class="games-info">
		    <h4 class="games-title"><?php echo $row["gname"];?></h4>
			    <p class="games-price"><b><?php echo $row["gprice"];?></b></p>
				    <a class="games-btn" href="https://www.youtube.com/" target="_blank">Buy Now</a>
                    <a class="games-btn" href="https://www.youtube.com/" target="_blank">Add to Cart</a>

	    </div>
 </div>


<?php

   }
?>
</main>

<?php
  include_once 'second-nav.php'
  ?>
  
<?php
include_once 'footer.php';
?>
</body>
</html>