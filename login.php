<?php include('message.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
    <form action="todo.php" method="POST">
        <h2 style="text-align: center; color: white;">Login to your account</h2>
        <div class="registration">
            <label for="Username">Username</label>
            <input type="text" name="username">
        </div>
        <div class="registration">
            <label for="password">Password</label>
            <input type="password" name="password">
        </div>
        <div>
            <p class="forgot">forgot password?</p>
        </div>
        <div class="submit">
            <input type="submit" name="login" value="Login">
        </div>
       

        <p class="registration">Don't have an account? <a href="registration.php">sign up</a></p>
    </form>
</body>
</html>