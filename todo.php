<?php
// session_start();
// session_save_path();
include('database.php');
include('message.php');

// for a user to sucessfuly register
if (isset($_POST['register'])){
    $username =  mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    if (empty($username)){
        $_SESSION['error'] = "username is required";
        header("location:register.php");
    }elseif (empty($email)){
        $_SESSION['error'] = "Email is required";
        header("location:register.php");
    }elseif (empty($password)){
        $_SESSION['error'] = "Password is required";
        header("location:register.php");
    }elseif ($password != $confirm_password){
        $_SESSION['error'] = "Passwords doesn't match";
        header("location:register.php");
    }else{
        $results = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1") ;
        $user = mysqli_fetch_array($results);
        if ($user['username'] === $username){
             $_SESSION['error'] = "username already exists";
            header("location:register.php");
        }elseif ($user['email'] === $email){
            $_SESSION['error'] = "email already exists";
            header("location:register.php");
        }elseif (strlen($password) < 8){
            $_SESSION['error'] = "Password too short";
            header("location:register.php");
        }else {$password = sha1($password);
            $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user_id;
            $_SESSION['success'] = "Registration successful";
            header("location:login.php");
        }
    }
}   

// User's login
if (isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($username)){
        $_SESSION['error'] = "Kindly enter your username";
        header("location:login.php");
    }elseif (empty($password)){
        $_SESSION['error'] = "Kindly enter your password";
        header("location:login.php");
    }else{
        $password = sha1($password);
        $results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
        $row = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] =$row['id'];
            $_SESSION['success'] ="you are now logged in";
            header('location:dashboard.php');
        }else{
            $_SESSION['error'] = "Wrong Username/Password";
            header('location:login.php');
        }
    }
}

if(isset($_POST['add'])){
    $tag = $_POST['tag'];
    $username = $_SESSION['username'];
    $sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
    while($row = mysqli_fetch_assoc($sql)){
    $_SESSION['user_id'] = $row['id'];
    $user_id = $_SESSION['user_id'];
        if(empty($tag)){
            $_SESSION['error'] = "kindly create a tag";
            header("location:createTag.php");
        }else{
            $results = mysqli_query($conn, "SELECT * FROM tags WHERE tag = '$tag' AND user_id = '$user_id' LIMIT 1");
            $row = mysqli_fetch_assoc($results);
            if ( ($row['tag'] === $tag) && ($row['user_id'] === $user_id) ){
               $_SESSION['error'] = "tag already exists";
               header("location:dashboard.php");
            }else{
                $sql = mysqli_query($conn, "INSERT INTO tags (tag, user_id) VALUES ('$tag', '$user_id')");
                $_SESSION['success'] = "you have created a new tag";
               header("location:dashboard.php");
            }
        }
    }
  
}

// Backend code for creating a new task
 
    if(isset($_POST['submit'])){
        try{
            $user_id = $_SESSION['user_id'];
            $task_name = mysqli_real_escape_string($conn, ($_POST['task_name']));
            $task_description =mysqli_real_escape_string($conn,($_POST['task_description']));
            $status = $_POST['status'];
            $priority = $_POST['priority'];
            $tag_id = $_POST['id'];
            $end_date = mysqli_real_escape_string($conn, ($_POST['end_date']));
            $sql = "INSERT INTO tasks (user_id, task_name, task_description, status_id, priority_id, end_date, tag_id) 
            VALUES('$user_id','$task_name', '$task_description', '$status', '$priority', '$end_date', '$tag_id')";
            
            if(empty($task_name)){
            $_SESSION['error'] = "Please add a task name";
            header('location:createtask.php');
            }elseif(empty($task_description)){
                $_SESSION['error'] = "Please add a task description";
                header('location:createtask.php');
            }elseif(empty($status)){
                    $_SESSION['error'] = "Please add a ";
                    header('location:createtask.php');
            }elseif(empty($priority)){
                $_SESSION['error'] = "Please add a ";
                header('location:createtask.php');
            }elseif(mysqli_query($conn, $sql)){
                echo "Records inserted successfully.";
            }else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
        }catch(\Exception $e){
        var_dump($e->getMessage());exit;
        }
    }
// }

?>