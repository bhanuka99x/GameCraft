<?php
include_once 'connection.php';

if (isset($_POST['add_game'])) {
    $game_name = $_POST['game_name'];
    $game_description = $_POST['game_description'];
    $game_image = $_FILES['game_image']['name'];
    $status = $_POST['status'];
    $game_image_tmp_name = $_FILES['game_image']['tmp_name'];
    $game_image_folder = 'uploaded_img/' . $game_image;

    if (empty($game_name) || empty($status)|| empty($game_description) || empty($game_image)) 
    {
        $message[] = 'Please fill out all fields';
    } else {
        $insert = "INSERT INTO home(hname, hdes, himage,hstatus) VALUES('$game_name', '$game_description', '$game_image','$status')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($game_image_tmp_name, $game_image_folder);
            $message[] = 'Game added successfully';
        } else {
            $message[] = 'Could not add the game';
        }
    }
};
if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM home WHERE hid = $id");
   header('location:admin_hadd_games.php');
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<span class="message">' . $message . '</span>';
    }
}
?>

<div class="container">
    <div class="admin-games-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add New Games</h3>
            <input type="text" name="game_name" placeholder="Enter Game Name" class="box">
            <input type="text" name="game_description" placeholder="Enter Game Description" class="box">
            <input type="text" name="status" placeholder="status" class="box">
            <input type="file" accept="image/jpeg, image/png" name="game_image" class="box">
            <input type="submit" name="add_game" value="Add Game" class="btn">
        </form>
    </div>

    <?php
    $select = mysqli_query($conn,"SELECT * FROM home");

    ?>

    <div class="game-display">
        <table class="game-display-table">
            <thead>
                <tr>
                    <td>image</td>
                    <td>name</td>
                    <td>description</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php  while($row = mysqli_fetch_assoc($select)){?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['himage'];?>" height = "100"alt=""></td>
                    <td><?php echo $row['hname'];?></td>
                    <td><?php echo $row['hdes'];?></td>
                    <td>
                        <a href="admin_Update_game.php?edit=<?php echo $row['hid']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                        <a href="admin_add_games.php?delete=<?php echo $row['hid']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                    </td>

                </tr>
                <?php };?>
        </table>
    </div>
</div>
    
</body>
</html>