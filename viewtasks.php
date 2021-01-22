<?php include('todo.php');
if (isset($_GET['id'])){
    $tag_id = $_GET['id'];
$sql = mysqli_query($conn, "SELECT task_name, end_date, task_description FROM tasks WHERE id = '$tag_id'");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO APP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table>
    <thead>
        <tr>
            <th>TASK NAME</th>
            <th>END DATE</th>
            <th>TAsk DEscription</th>
        </tr>
        </thead>
<?php while ($row = mysqli_fetch_array($sql)) { ?>
 
    <?php
    // echo   
    $diff = '%m Month %d Days %h Hours';
    $dob =  date_create($row['end_date']);
    $today = date_create('now');
    
 $ages = date_diff($dob, $today);
 $age = $ages->format($diff); ?>
    <tr>
    <td> <?php echo$row['task_name']; ?></td>
<td> <?php echo $age; ?></td>
<td> <?php echo$row['task_description']; ?></td>
</tr>
<?php } } ?>

</table>


</body>
</html>