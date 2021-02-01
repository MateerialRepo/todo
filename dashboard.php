
<?php include('todo.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do It Now</title>
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
        <!-- <div class="main-content"> -->
                <div class="container">
                    <div class="row">
                <?php 
                    if (!isset($_SESSION['username'])){
                        $_SESSION['error'] = "you have to log in first";
                        header('location:login.php');
                    }else{ ?>
                        <strong>Welcome!</strong>
                        <?php echo $_SESSION['username'];
                    }?>
<!-- </div> -->

                <?php
                    if (isset($_GET['logout'])){
                        session_destroy();
                        unset($_SESSION['username']);
                        header("location:login.php");
                    }

                    $user_id = $_SESSION['user_id'];
                    $sql = mysqli_query($conn, "SELECT tag, id FROM tags where user_id ='$user_id' ORDER BY tag ASC");
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) {
                            $tag = $row['tag'];
                            $tag_id = $row['id']; ?>
                            <div class='col-md-4'>
                                <!-- <div class= 'col-sm-6'> -->
                                <div class='card card-name'>
                                    <div class='card-body'>
                                        <div class="tag"><h2><?php echo$tag?></h2></div>
                                        <span><a href="createtask.php?id= <?php echo $tag_id;?>"">Add Task</a></span>
                                        <span><a href="viewtasks.php?id= <?php echo $tag_id;?>"">View task</a></span>
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
    <!-- </div> -->
</body>
</html>