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

<!--Side navbar-->
  <nav>
    <button type="button" id="toggle-btn">
      <i class="fa fa-bars"></i>
    </button>
    <span>GameCraft</span>
    <ul class="sidebar-menu">
      <li><a href="#"><i class='bx bx-home-alt' ></i>Home</a></li>
      <li><a href="#"><i class='bx bx-store-alt' ></i>Store</a></li>
      <li><a href="#"><i class='bx bx-library' ></i>Library</a></li>
      <li><a href="#"><i class='bx bx-joystick' ></i>Cart</a></li>
      <li id="bgModeBtn"><a href="#"><i id="bgModeIcon" class='bx bx-sun'></i>Mode</a></li>
    </ul>
  </nav>

  <!--top navbar-->
 

<div id="topnav-bar">   
  <div class="logo1">
  

 </div> 
  

  <div class="topnav-search">
       <input type="text" id="site-search" name="search" placeholder="Search.." value ="<?php if(isset($_GET['search'])){echo $GET_['search'];} ?>">
       <button type="submit" id="btnsearch">Search</button>
  </div>

  
     <div class="topnav-user">
       <button id="b3"><i class='bx bx-user'></i></button>
     </div>
</div>

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
include_once 'footer.php';
?>
</body>
</html>