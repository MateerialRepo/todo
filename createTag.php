<?php include('todo.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do It Now</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php if (!isset($_SESSION['username'])){
    $_SESSION['error'] = "you have to log in first";
    header('location:login.php');
}else{ ?>
    <form action="todo.php" method="POST">
        <div class="input-group">
            <label for="tag">TAG</label>
            <input type="text" name="tag">
        </div>
        <div>
            <input type="submit" value="Add TAG" name="add">
        </div>
    </form>
    <?php } ?>
</body>
</html>