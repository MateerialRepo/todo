<?php
// session_start();
// session_save_path();
include('database.php');
    //code to handle the registration form
    if(isset($_POST['register'])){
        $username =  mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        if(empty($username)){
            // $message = '<div class="alert alert-danger" role ="alert>sucess</div>
            // ';
            $_SESSION['error'] = "username is required";
            header("location:registration.php");
            // exit();
            // echo "username is required";
        }elseif(empty($email)){
            $_SESSION['error'] = "Email is required";
            header("location:registration.php");
        }elseif(empty($password)){
            $_SESSION['error'] = "Password is required";
            header("location:registration.php");
        }elseif($password != $confirm_password){
            $_SESSION['error'] = "Passwords doesn't match";
            header("location:registration.php");
        }else{
            $results = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1") ;
            $user = mysqli_fetch_array($results);
                if($user['username'] === $username){
                    $_SESSION['error'] = "username already exists";
                    header("location:registration.php");
                }
                elseif($user['email'] === $email){
                    $_SESSION['error'] = "email already exists";
                    header("location:registration.php");
                }elseif(strlen($password) < 8){
                    $_SESSION['error'] = "Password too short";
                    header("location:registration.php");
                }else{$password = sha1($password);
                    $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
                    $_SESSION['success'] = "Registration successful";
                    header("location:login.php");
                }
        }
    }  

    //Code for the application Login
    if(isset($_POST['login'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(empty($username)){
            $_SESSION['error'] = "Kindly enter your username";
            header("location:login.php");
        }elseif(empty($password)){
            $_SESSION['error'] = "Kindly enter your password";
            header("location:login.php");
        }else{
            $password = sha1($password);
            $results = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
            if(mysqli_num_rows($results) == 1){
                $_SESSION['success'] ="you are now logged in";
                header('location:dashboard.php');
            }else{
                $_SESSION['error'] = "Wrong Username/Password";
                header('location:login.php');
            }
        }
    }


// if(isset($_POST['add'])){
//     $tag = $_POST['tag'];
//     // $username = $_SESSION['username'];
//     // $sql = mysqli_query($conn, "SELECT id FROM users WHERE username = '$username'");
//     // while($row = mysqli_fetch_assoc($sql)){
//     // $_SESSION['user_id'] = $row['id'];
//     $user_id = $_SESSION['user_id'];
//         if(empty($tag)){
//             $_SESSION['error'] = "kindly create a tag";
//             header("location:createTag.php");
//         }elseif(empty($user_id)){
//                 $_SESSION['error'] = "Please kindly login";
//                 header("location:login.php");
//         }else{
//             $results = mysqli_query($conn, "SELECT * FROM tags WHERE tag = '$tag' AND user_id = '$user_id' LIMIT 1");
//             $row = mysqli_fetch_assoc($results);
//             if ( ($row['tag'] === $tag) && ($row['user_id'] === $user_id) ){
//                $_SESSION['error'] = "tag already exists";
//                header("location:dashboard.php");
//             }else{
//                 $sql = mysqli_query($conn, "INSERT INTO tags (tag, user_id) VALUES ('$tag', '$user_id')");
//                 $_SESSION['success'] = "you have created a new tag";
//                header("location:dashboard.php");
//             }
//         }
//     }
  
// }

    if(isset($_POST['submit'])){
        try{
            
            $task_name = mysqli_real_escape_string($conn, ($_POST['task_name']));
            $task_description =mysqli_real_escape_string($conn,($_POST['task_description']));
            $status = $_POST['status'];
            $priority = $_POST['priority'];
            $end_date = mysqli_real_escape_string($conn, ($_POST['end_date']));
                var_dump($_POST);
                exit();
            $results = mysqli_query($conn,"SELECT id FROM statuses WHERE status = '$status'");
            while ($row = mysqli_fetch_row($results)){
                $status = $row['id'];
            }
            $results = mysqli_query($conn,"SELECT id FROM priorities WHERE priority = '$priority'");
            while ($row = mysqli_fetch_row($results)){
                $priority = $row['id'];
            }


            // $priority = mysqli_query($conn, "SELECT id FROM priorities WHERE priority = $priority");
            // if(
                mysqli_query($conn, "INSERT INTO tasks (task_name, task_description, status_id, priority_id, end_date) 
        VALUES('$task_name', '$task_description', '$status', '$priority', '$end_date')");
        // 
            }catch(\Exception $e){
                var_dump($e->getMessage());
            // }git 
            }
}

            // if(isset($_POST['submit'])){

            //     $task_name = mysqli_real_escape_string($conn, ($_POST['task_name']));
            //     $task_description =mysqli_real_escape_string($conn,($_POST['task_description']));
            //     $status = $_POST['status'];
            //     $priority = $_POST['priority'];
            //     $end_date = mysqli_real_escape_string($conn, ($_POST['end_date']));
            //     $input = mysqli_query($conn, "INSERT INTO tasks (task_name, task_description, status_id, priority_id, end_date) 
            //     VALUES('$task_name', '$task_description', '$status', '$priority', '$end_date')");

            //     echo "We got here";

            // }

?>