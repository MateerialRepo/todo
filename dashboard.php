
<?php include('todo.php')?>
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
}else{ ?>
    <strong>Welcome!</strong>
    <?php echo $_SESSION['username'];
    }?>
  
<?php
  if(isset($_POST['add'])){
    $tag = $_POST['tag'];
    $username = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];
    $sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
    while($row = mysqli_fetch_assoc($sql)){
    $_SESSION['user_id'] = $row['id'];
    }

    if(empty($tag)){
      $_SESSION['error'] = "kindly create a tag";
      header("location:createTag.php");
    }else{
      $results = mysqli_query($conn, "SELECT * FROM tags WHERE tag = '$tag' LIMIT 1");
      $row = mysqli_fetch_assoc($results);
      if ($row['tag'] === $tag){
        $_SESSION['error'] = "tag already exists";
        header("location:dashboard.php");
        }else{
               $sql = mysqli_query($conn, "INSERT INTO tags (tag, user_id) VALUES ('$tag', '$user_id')");
       $_SESSION['success'] = "you have created a new tag";
       header("location:dashboard.php");
      }
  }

  if(isset($_POST['submit'])){
    // try{ 
        $user_id = $_SESSION['user_id'];
        $task_name = mysqli_real_escape_string($conn, ($_POST['task_name']));
        $task_description =mysqli_real_escape_string($conn,($_POST['task_description']));
        $status = $_POST['status'];
        $priority = $_POST['priority'];
        $end_date = mysqli_real_escape_string($conn, ($_POST['end_date']));
        $sql = "INSERT INTO tasks (user_id, task_name, task_description, status_id, priority_id, end_date, tag_id) 
            VALUES('$user_id','$task_name', '$task_description', '$status', '$priority', '$end_date', '$tag_id')";
           if(mysqli_query($conn, $sql)){
            echo "Records inserted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    // }catch(\Exception $e){
    //     var_dump($e->getMessage());exit;
    // }
}

}
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header("location:login.php");
}
 $sql = mysqli_query($conn, "SELECT tag, id FROM tags ORDER BY tag ASC");
      if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
          $tag = $row['tag'];
          $tag_id = $row['id']; ?>
         <div class='col-md-3'>
                  <div class='card card-name'>
                    <div class='card-body'>
                      <h2><?php echo$tag?> </h2>
                      <span><a href="createtask.php?id= <?php echo $row['id'];?>"">Add Task</a></span>
                    </div>
                  </div>
                </div>
      <?php  } 
      }
$conn->close();
?>
      </div>
    </div>
  </div>
</body>
</html>