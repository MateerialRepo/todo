<?php include('todo.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <form action="dashboard.php" method="POST">
    <div>
    <label for="tag">TAG</label>
    <input type="text" name="tag">
    </div>
    <div>
    <input type="submit" value="Add TAG" name="add">
    </div>
    </form>
    
</body>
</html>