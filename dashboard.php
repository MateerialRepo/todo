
<?php
// session_start();
include('todo.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background-color:purple;">
  <div class="side-nav">
  <ul>
  <li> <a href="#home">HOME</a> </li>
  <li> <a href="createTag.php">Add Tag</a> </li>
  <li> <a href="#">HOME</a> </li>
  <li> <a href="dashboard.php?logout">Logout</a> </li>

  </ul>
  </div>
  <div class="main">
    <div class="container">
    <!-- <h1 style="padding-top: 50px;">Welcome back!!! NAME</h1> -->
      <div class="row">

<?php 
if (!isset($_SESSION['username'])){
  $_SESSION['error'] = "you have to log in first";
  header('location:login.php');
}else{
    echo"<p> Welcome Back  </p>"?> .
    <strong>
    <?php echo" " .$_SESSION['username']; ?>
    </strong>
    
<?php
$username = $_SESSION['username'];
$sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
while($row = mysqli_fetch_assoc($sql)){
$_SESSION['user_id'] = $row['id'];
}
} 
  if(isset($_POST['add'])){
    $tag = $_POST['tag'];
    $user_id = $_SESSION['user_id'];
  $sql = "INSERT INTO tags (tag, user_id) VALUES ('$tag', '$user_id')";
  if(mysqli_query($conn, $sql)){
    echo" tag created";
  }else{
    echo "tags not created". $conn->error;
  }
  // }
}
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location:login.php");
}
 $sql = mysqli_query($conn, "SELECT tag FROM tags");
      if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
          $tag = $row['tag'];
          echo "<div class='col-md-3'>
                  <div class='card card-name'>
                    <div class='card-body'>
                      <h2>$tag</h2>
                      <span><a href=createtask.php> c <a/> Add task</span>
                    </div>
                  </div>
                </div>";
        } 
      }
$conn->close();
?>
      </div>
    </div>
  </div>
</body>
</html>