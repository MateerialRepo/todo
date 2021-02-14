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
        <div class="input-group">
            <label for="task_description"> Task Description</label>
            <textarea name="task_description" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="input-group">
            <label for="priority">Priority</label>
            <select name="priority" id="">
                <option value="">Select Priority</option>
                    <?php  
                        $priority = mysqli_query($conn, "SELECT id, priority FROM priorities");
                        foreach ($priority as $key => $val) {?>
                <option value="<?php echo $val['id']?>"><?php echo $val['priority']; ?>
                </option>
                    <?php }?>
            </select>
        </div>
        <div class="input-group">
            <label for="tag">Tag</label>
            <select name="tag" id="">
                <option value="">Select Tag</option>
                    <?php
                        $result = mysqli_query($conn, "SELECT id, tag FROM tags");
                        while($val = mysqli_fetch_assoc($result))
                        { ?>
                <option value="<?php echo $val['id'] ?>"> <?php echo $val['tag'] ?></option> 
                    <?php }  ?> 
            </select>
        </div>
        <div class="input-group">
            <label for="status">Status</label>
            <select name="status" id="">
                <option value="">Select Status</option>
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