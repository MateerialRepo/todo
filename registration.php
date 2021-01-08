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
    <h1 class = "wel"><span class ="span">WELCOME T</span>o <span class="span">Y</span>oo
        <span class="span">T</span>odo <span class="span">A</span>pp <span class="span">!!!</span> </h1>
    <form action="todo.php" method= "POST">
        <h2 style= "text-align: center; color: white;">Create Your Account</h2>
        <div class="registration">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your Username">
        </div>
        <div class="registration">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="registration">
            <label for="password">Password</label>
            <input type="password" name="password" >
        </div>
        <div class="registration">
            <label for="password"> Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>
        <div class="submit">
            <!-- <label for="register">Register</label> -->
            <input type="submit" value="Register" name="register" >
        </div>
    </form>
</body>
</html>
