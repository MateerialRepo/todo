<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <form action="todo.php" method= "POST">
        <h2 style= "text-align: center; color: white;">Create an account</h2>
        <?php include('message.php') ?>
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your Username">
        </div>
        <div class="input-group">
            <label for="email">Email Address</label>
            <input type="email" name="email" placeholder="Enter your email">
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Minimum of eight characters" >
        </div>
        <div class="input-group">
            <label for="password"> Confirm Password</label>
            <input type="password" name="confirm_password">
        </div>
        <div class="submit">
            <input type="submit" value="Register" name="register" >
        </div>
        <div>
        <p style="margin-top: 30px;">Already have an account? <a href="login.php">login</a></p>
        </div>
    </form>
</body>
</html>
