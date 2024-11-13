<?php

@include 'connection.php';

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Document</title>
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
<div class="container">

<section class="shopping-cart">

   <h1 class="heading">Your Shopping Cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th class="action">action</th>
      </thead>

      <tbody>

         <?php 
         $select_cart = mysqli_query($conn, "SELECT * FROM cart");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $grand_total +=(float) $fetch_cart['cprice']; // Add the price to the grand total
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $fetch_cart['cimage']; ?>" height="100" alt=""></td>
            <td><?php echo $fetch_cart['cname']; ?></td>
            <td>$<?php echo $fetch_cart['cprice']; ?></td>
            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
            };
         };
         ?>
         <tr class="table-bottom">
            <td colspan="2" >grand total</td>
            <td>$<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>
   
   <div class="checkout-btn">
      <a href="store.php" class="option-btn" style="margin-top: 0;">continue Shopping</a>
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">procced to checkout</a>
   </div>
</section>

</div>
    
<?php
include_once 'footer.php';
?>
</body>
</html>
