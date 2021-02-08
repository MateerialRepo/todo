<?php
include('database.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="style2.css" >
</head>
<body>
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
            <table>
                <caption> <h1>TASKS BOARD </h1></caption>
                    <tr>
                        <th>TASK NAME</th>
                        <th>TASK TAG</th>
                        <th>END DATE</th>
                        <th>TASK DESCRIPTION</th>
                        <th>PRIORITY</th>
                        <th>STATUS</th>
                        <th style="column-span: 2;">ACTION</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_array($sql)) { ?>
                        <?php   
                            $diff = '%m Month %d Days %h Hours';
                            $dob =  date_create($row['end_date']);
                            $today = date_create('now');
                            $ages = date_diff($dob, $today);
                            $age = $ages->format($diff);
                        ?>
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
                        </tr>
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
