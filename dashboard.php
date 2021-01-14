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
  <div class="dashboard">
  <ul>
  <li> <a href="#home">HOME</a> </li>
  <li> <a href="#">HOME</a> </li>
  <li> <a href="#">HOME</a> </li>
  <li> <a href="#">HOME</a> </li>

  </ul>
  </div>
  <div class="main">
    <div class="container">
      <div class="row">

<?php 
 $sql = mysqli_query($conn, "SELECT task_name FROM tasks");
      if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
          $task_name = $row['task_name'];

                echo "<div class='col-md-3'>
                  <div class='card card_name'>
                    <div class='card-body'>
                      <h2>$task_name</h2>
                    </div>
                  </div>
                </div>";

       } 
      }else{
         echo "empty";
       
      }
       $conn->close();
       ?>

      
  
  <!-- <h4 style="padding: 15px;">hey how are you joor</h4> -->
      </div>
    </div>
  </div>
</body>
</html>