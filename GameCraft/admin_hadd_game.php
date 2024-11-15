<?php
include_once 'connection.php';

if (isset($_POST['add_game'])) {
    $game_name = mysqli_real_escape_string($conn, $_POST['game_name']);
    $game_description = mysqli_real_escape_string($conn, $_POST['game_description']);
    $game_image = $_FILES['game_image']['name'];
    $game_image_tmp_name = $_FILES['game_image']['tmp_name'];
    $game_image_folder = 'uploaded_img/' . $game_image;

    if (empty($game_name) || empty($game_description) || empty($game_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        $insert = "INSERT INTO home (hname, hdes, himage) VALUES ('$game_name', '$game_description', '$game_image')";
        $upload = mysqli_query($conn, $insert) or die(mysqli_error($conn));
        if ($upload) {
            move_uploaded_file($game_image_tmp_name, $game_image_folder);
            $message[] = 'Game added successfully';
        } else {
            $message[] = 'Could not add the game';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM home WHERE hid = $id") or die(mysqli_error($conn));
    header('location:admin_hadd_game.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Admin</title>
</head>
<body>

<?php
if (isset($message)) {
    foreach ($message as $msg) {
        echo '<span class="message">' . $msg . '</span>';
    }
}
?>

<div class="container">
    <div class="admin-games-form-container">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <h3>Add New Games</h3>
            <input type="text" name="game_name" placeholder="Enter Game Name" class="box">
            <input type="text" name="game_description" placeholder="Enter Game Description" class="box">
            <input type="file" accept="image/jpeg, image/png" name="game_image" class="box">
            <input type="submit" name="add_game" value="Add Game" class="btn">
        </form>
    </div>

    <?php
    $select = mysqli_query($conn, "SELECT * FROM home");
    ?>

    <div class="game-display">
        <table class="game-display-table">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Action</td>
                </tr>
            </thead>
            <?php while ($row = mysqli_fetch_assoc($select)) { ?>
                <tr>
                    <td><img src="uploaded_img/<?php echo $row['himage']; ?>" height="100" alt=""></td>
                    <td><?php echo $row['hname']; ?></td>
                    <td><?php echo $row['hdes']; ?></td>
                    <td>
                        <a href="admin_hupdate_game.php?edit=<?php echo $row['hid']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
                        <a href="admin_hadd_game.php?delete=<?php echo $row['hid']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

</body>
</html>
