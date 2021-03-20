<?php include('todo.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Do It Now</title>
    <link rel="stylesheet" href="css/style.css">
    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="js/plan.js"></script>
    
    <script>
        $(function() {
            $( "#datepicker" ).datepicker({
                //appendText:"(yy-mm-dd)",
                dateFormat:"yy-mm-dd",
                altField: "#datepicker-4",
                altFormat: "DD,MM, yy"
            })
        });
    </script>
</head>
<body>
    <?php 
        $user_id = $_SESSION['user_id'];
            if (!isset($_SESSION['username'])){
            $_SESSION['error'] = "you have to log in first";
            header('location:login.php');
            }else{ ?>
    <form action="todo.php" method="POST">
        <div class="input-group">
            <label for="task_name">Task name</label>
            <input type="text" name="task_name">
        </div>
        <div>
            <label for="end_date">End date</label>
            <input type="text" name="end_date" id="datepicker">
        </div>

        <div>
            <label for="priority">Priority</label>
            <select name="priority" id="">
                <option value="">Select Priority</option>
                     <?php  
                     $priority = mysqli_query($conn, "SELECT * FROM priorities");
                     while($data = mysqli_fetch_array($priority)){?>
                <option value="<?php $data['id']?>"> <?php echo $data['priority'] ?> </option>
                    <?php }?>
            </select>
        </div>

        <div>
             <label for="status">Status</label>
             <select name="status" id="">
                <option value="status">Status</option>
                     <?php
                     $status = mysqli_query($conn, "SELECT id, status FROM statuses");
                     while($data = mysqli_fetch_array($status)){ ?>
                <option value="<?php echo $data['id'] ?>"> <?php echo$data['status'] ?> </option>
                    <?php }  ?>
            </select>
        </div>

        <div>
            <input type="submit" name="submit" value="Create Task">
        </div>
    </form>
    <?php } ?>
</body>
</html>