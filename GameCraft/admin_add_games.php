<?php
@include 'connection.php';

if (isset($_POST['add_game'])) {
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];
    $game_description = $_POST['game_description'];
    $game_image = $_FILES['game_image']['name'];
    $game_image_tmp_name = $_FILES['game_image']['tmp_name'];
    $game_image_folder = 'uploaded_img/' . $game_image;

    if (empty($game_name) || empty($game_price) || empty($game_description) || empty($game_image)) {
        $message[] = 'Please fill out all fields';
    } else {
        $insert = "INSERT INTO product(gname, gprice, gdescription, gimage) VALUES('$game_name', '$game_price', '$game_description', '$game_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($game_image_tmp_name, $game_image_folder);
            $message[] = 'Game added successfully';
        } else {
            $message[] = 'Could not add the game';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Admin</title>
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
            <input type="text" name="game_price" placeholder="Enter Game Price" class="box">
            <input type="text" name="game_description" placeholder="Enter Game Description" class="box">
            <input type="file" accept="image/jpeg, image/png" name="game_image" class="box">
            <input type="submit" name="add_game" value="Add Game" class="btn">
        </form>
    </div>
</div>

</body>
</html>
