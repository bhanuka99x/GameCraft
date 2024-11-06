<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="./CSS/second-nav.css">
    <script defer src="./JS/store.js"></script>
    <title>Document</title>
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
</body>
</html>