<?php
include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel = "stylesheet" href="style2.css" > -->

</head>
<body>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
    <?php
        $user_id = $_SESSION['user_id'];
        if (isset($_GET['page_no']) && $_GET['page_no']!=""){
            $page_no =$_GET['page_no'];
        }else{
            $page_no = 1;
        }
        $total_records_per_page = 5;
        $next_page = $page_no + 1;
        $previous_page = $page_no - 1;
        $offset = $previous_page * $total_records_per_page;
        $adjacents = "2";
        $result_count = mysqli_query($conn, "SELECT COUNT(*) AS total_records FROM tasks WHERE user_id = $user_id");
        $total_records = mysqli_fetch_array($result_count);
        $total_records = $total_records['total_records'];
        $total_no_of_pages = ceil($total_records / $total_records_per_page);
        $second_last = $total_no_of_pages - 1; 
        $sql = mysqli_query($conn, "SELECT *  FROM tasks WHERE user_id = '$user_id' LIMIT $offset, $total_records_per_page"); ?>
            <table class="table table-bordered">
                <caption> <h1>TASKS BOARD </h1></caption>
                <thead>
                    <tr>
                        <th>TASK NAME</th>
                        <th>TASK TAG</th>
                        <th>END DATE</th>
                        <th>TASK DESCRIPTION</th>
                        <th>PRIORITY</th>
                        <th>STATUS</th>
                        <th colspan = "2">ACTION</th>
                    </tr>
                    </thead>
                    <?php while ($row = mysqli_fetch_array($sql)) { ?>
                        <?php   
                            $diff = '%m Month %d Days %h Hours';
                            $dob =  date_create($row['end_date']);
                            $today = date_create('now');
                            $ages = date_diff($dob, $today);
                            $age = $ages->format($diff);
                        ?><tbody>
                        <tr>
                            <td><?php echo$row['task_name']; ?></td>
                            <?php 
                                $tag_id = $row['tag_id'];
                                $tag = mysqli_query($conn, "SELECT tag FROM tags WHERE id = '$tag_id' "); 
                                foreach ($tag as $key => $val);?>
                            <td> <?php echo $val['tag']; ?></td>
                            <td> <?php echo $age; ?></td>
                            <td> <?php echo $row['task_description']; ?></td>
                            <?php $priority_id = $row['priority_id'];
                                $priority = mysqli_query($conn, "SELECT *  FROM priorities WHERE id = '$priority_id' "); 
                                foreach ($priority as $key => $val);?>
                            <td> <?php echo $val['priority']; ?></td>
                            <?php 
                                $status_id = $row['status_id'];
                                $status = mysqli_query($conn, "SELECT *  FROM statuses WHERE id = '$status_id' "); 
                                foreach ($status as $key => $val); ?>
                            <td><?php echo $val['status']; ?></td>

                        <td> <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Delete</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Tasks</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete tasks?</p>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-default"><a href="todo.php?delete= <?php echo $row['id'];?>"> Yes</a></button>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div></td>
                        </tr>
                        </tbody>
                    <?php } ?>
            </table>
           
            <div class="pagination">
                  <!-- <strong>Page <?php echo $page_no. "of" . $total_no_of_pages; ?> -->
                <!-- </strong> -->
                <!-- <strong>Page <?php echo $page_no. "of" . $total_no_of_pages; ?>
                </strong> -->
                    <ul class="pagination">
                        <li <?php if($page_no<=1){ echo "class ='disabled'"; }?>>
                            <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                        </li>
                    <?php 
                    if($total_no_of_pages <=10){
                        for($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if($counter == $page_no){
                                echo "<li class ='active'><a>$counter</a></li>";
                            }else{
                                echo "<li><a href = '?page_no=$counter'>$counter</a></li>";
                            }
                        }
                    }elseif($total_no_of_pages > 10){
                        if ($page_no <= 4){
                            for($counter = 1; $counter < 8; $counter++){
                                if($counter == $page_no){
                                    echo "<li class ='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href = '?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                            
                        }elseif($page_no > 4 && $page_no < $total_no_of_pages - 4){
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ( $counter = $page_no - $adjacents;
                                $counter <= $page_no + $adjacents;
                                $counter++ ) {
                                if ($counter == $page_no){
                                    echo "<li class ='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href = '?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            
                            echo "<li><a>...</a></li>";
                            echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";

                        }else{
                            echo "<li><a href='?page_no=1'>1</a></li>";
                            echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ( $counter = $total_no_of_pages - 6;
                                $counter <= $total_no_of_pages;
                                $counter++ ) {
                                if ($counter == $page_no){
                                    echo "<li class ='active'><a>$counter</a></li>";
                                }else{
                                    echo "<li><a href = '?page_no=$counter'>$counter</a></li>";
                                }
                        }
                    }
                }
                    ?>
                    <li <?php if($page_no >=$total_no_of_pages){ echo "class ='disabled'"; }?>>
                    <a <?php if($page_no < $total_no_of_pages){ echo "href='?page_no=$next_page'"; } ?>>Next</a>
                    </li>
                    <?php if($page_no < $total_no_of_pages){ echo "<li><a href='?page_no=$total_no_of_pages'>Last</a><li>";
                     } ?>
                  </ul>
                </div>
                
 
</body>
</html>
