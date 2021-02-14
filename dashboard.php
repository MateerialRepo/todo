<?php include('todo.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <!-- <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
    <link rel = "stylesheet" href="style2.css" >
</head>
<body>
    <div class="grid-container">
        <header class="header"></header>
        <aside class="sidenav">
            <ul>
                <li><img src="images/logo.png"" alt="" width="55px"></li>
                <li><a href="dashboadrd.html">Dashboard</a></li>
                <li><a href="createtask.php"> ADD TASK</a></li>
                <li><a href="dashboard.php?logout">Logout</a> </li>
            </ul>
        </aside>
        <main class="main">
            <div class="main-container">
                <div class="main-header">
                    <?php 
                        if (!isset($_SESSION['username'])){
                            $_SESSION['error'] = "you have to log in first";
                            header('location:login.php');
                        }else{ ?>
                            <div>
                                <h2><strong>Welcome!</strong>&nbsp;&nbsp;
                                   <?php echo $_SESSION['username'];?>
                                    <?php
                         }?> 
                                </h2>
                            </div>
                            <?php
                    if (isset($_GET['logout'])){
                        session_destroy();
                        unset($_SESSION['username']);
                        header("location:login.php");
                    } ?>
                    <img src="images/dashboard.png" alt="">
                </div>
                <div class="main-content">
                    <?php include ('pagination.php'); ?>
                </div>
            </div>
            <div class="main-side">
                <div class="tag">
                    <?php 
                        // $user_id = $_SESSION['user_id'];
                        $sql = mysqli_query($conn, "SELECT tag, id FROM tags ORDER BY tag ASC LIMIT 4");
                        if ($sql->num_rows > 0) {
                            while ($row = $sql->fetch_assoc()) {
                                $tag = $row['tag'];
                                $tag_id = $row['id']; ?>
                                <div class='card card-name'>
                                    <div class="tag"><h2><?php echo$tag?></h2></div>
                                    <?php
                                        $result = mysqli_query($conn, "SELECT tag_id FROM tasks where user_id = '$user_id'"); 
                                    ?>
                                    <?php
                                    $sql = mysqli_query($conn, "SELECT task FROM tasks WHERE user_id = '$user_id' group by tag_id having count(*)>1"); 
                                    if ($sql->num_rows > 0) {
                                        while ($row = $sql->fetch_assoc()) {
                                            $task = $row['task'];
                                            // $tag_id = $row['id'];
                                             ?>
                                    <!--  -->
                                    <span>
                                    <?php echo $task;
                                    
                                        }
                                        }?>
                                    </span>
                                    <span><a href="viewtasks.php?id= <?php echo $tag_id;?>"">View task</a></span>
                                </div>                            
                    <?php  
                            }
                        } 
                        $conn->close();
                    ?>
                </div>
                <div class="calender">
                    <iframe src="https://calendar.google.com/calendar/embed?height=180&amp;wkst=1&amp;
                        bgcolor=%23fef89d&amp;ctz=Africa%2FLagos&amp;
                        src=ZW4uY2hyaXN0aWFuI2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;
                        src=ZW4ubmcjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;
                        src=ZW4uanVkYWlzbSNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;
                        src=ZW4uaXNsYW1pYyNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;
                        src=ZW4ub3J0aG9kb3hfY2hyaXN0aWFuaXR5I2hvbGlkYXlAZ3JvdXAudi5jYWxlbmRhci5nb29nbGUuY29t&amp;
                        color=%234285F4&amp;color=%230B8043&amp;color=%237CB342&amp;color=%23F6BF26&amp;
                        color=%23F4511E&amp;showTitle=0&amp;showDate=1&amp;showTabs=1&amp;showCalendars=1&amp;
                        showTz=0&amp;showPrint=0" style="border:solid 1px #777" width="370" height="250"
                         frameborder="0" scrolling="no"></iframe>
                </div>
            </div>
        </main>
        <footer class="footer">
           <!-- <h1>copyright</h1> -->
        </footer>
    </div>
</body>
</html>