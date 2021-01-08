<?php
session_start();
include('database.php');
// include('message.php');
// include('error.php');
// $username ="";
$email = "";
// $errors= "";
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
             }else{
                $password = sha1($password);
                $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
                $_SESSION['success'] = "Registration successful";
                header("location:login.php");
             }
    }
}   

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
       header('location:login.php');
   }else{
       $_SESSION['error'] = "Wrong Username/Password";
       header('location:login.php');
   }
        }
}

?>