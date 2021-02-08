
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
            <li> <a href="index.html">HOME</a> </li>
            <li> <a href="createTag.php">Add Tag</a> </li>
            <li> <a href="#">HOME</a> </li>
            <li> <a href="dashboard.php?logout">Logout</a> </li>
        </ul>
    </div>

    <div class="main">
        <!-- <div class="main-content"> -->
                <div class="container">
                    <div class="row">
                <!-- <?php 
                    if (!isset($_SESSION['username'])){
                        $_SESSION['error'] = "you have to log in first";
                        header('location:login.php');
                    }else{ ?>
                        <strong>Welcome!</strong>
                        <?php echo $_SESSION['username'];
                    }?> -->
<!-- </div> -->

                <?php
                    if (isset($_GET['logout'])){
                        session_destroy();
                        unset($_SESSION['username']);
                        header("location:login.php");
                    }
                    if (isset($_GET['page_no']) && $_GET['page_no']!=""){
                        $page_no =$_GET['page_no'];
                    }else{
                        $page_no = 1;
                    }
                    $user_id = $_SESSION['user_id'];
                    $total = 3;
                    $offset = ($page_no - 1) * $total;
                    $prev = $page_no - 1;
                    $next = $page_no + 1;
                    $adj = 2;
                    $result_count = mysqli_query($con, "SELECT COUNT(*) As tot FROM tags WHERE user_id = '$user_id' ");
                    $tot = mysqli_fetch_array($result_count);
                    $tot = $tot['tot'];
                    $pages = ceil($tot / $total);
                    $second_last = $pages - 1;

                    $user_id = $_SESSION['user_id'];
                    $sql = mysqli_query($conn, "SELECT * FROM tags where user_id ='$user_id' ORDER BY tag ASC LIMIT $offset, $total");
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
                  <div style="padding: 10px 20px 0px; border-top: dotted 1px #CCC;">
                  <strong>Page <?php echo $page_no. "of" . $pages; ?></strong>
                  <ul class="pagination">
                      <?php if($page_no > 1){
                          echo "<li><a href='?page_no=1'> First Page</a></li>";
                          
                      }?>
                      <li <?php if($page_no <=1){ echo "class ='disabled'"; }?>>
                    <a <?php if($page_no > 1){ echo "href='?page_no=$prev'"; } ?>>Previous</a>
                    </li>
                    <li <?php if($page_no >=$total){ echo "class ='disabled'"; }?>>
                    <a <?php if($page_no < $total){ echo "href='?page_no=$next'"; } ?>>NEXt</a>
                    </li>
                    <?php if($page_no < $total){ echo "<li><a href='?page_no=$total'>Last</a><li>";
                     } ?>
                  </ul>
                </div>
              </div>
          </div>
    </div>
    <!-- </div> -->
</body>
</html>