<div class="main-container">
                <div class="main-header">
                    <?php 
                        if (!isset($_SESSION['username'])){
                            $_SESSION['error'] = "you have to log in first";
                            header('location:login.php');
                        }else{ ?>
                            <div> <h2><strong>Welcome!</strong>&nbsp;&nbsp;
                            <?php echo $_SESSION['username'];?>
                            <?php }?> </h2></div>
                            <img src="images/dashboard.png" alt="">
                </div>
                <div class="main-content">
                    <h2>I am here</h2>
                    
                </div>
            </div>
            <div class="main-side">
                <div class="category">
               <?php $user_id = $_SESSION['user_id'];
                    $sql = mysqli_query($conn, "SELECT tag, id FROM tags where user_id ='$user_id' ORDER BY tag ASC LIMIT 3");
                    if ($sql->num_rows > 0) {
                        while ($row = $sql->fetch_assoc()) {
                            $tag = $row['tag'];
                            $tag_id = $row['id']; ?>
                            <!-- <div class='col-sm-4'> -->
                                <!-- <div class= 'col-sm-6'> -->
                                <div class='card card-name'>
                                    <div class="tag"><h2><?php echo$tag?></h2></div>
                                    <span><a href="createtask.php?id= <?php echo $tag_id;?>"">Add Task</a></span>
                                    <span><a href="viewtasks.php?id= <?php echo $tag_id;?>"">View task</a></span>
                                </div>                            
                  <?php  } 
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
                        showTz=0&amp;showPrint=0" style="border:solid 1px #777" width="300" height="180"
                         frameborder="0" scrolling="no"></iframe>
                </div>
       