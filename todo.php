<?php
// session_start();
include('database.php');
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
        echo "Username is required";
    }elseif(empty($email)){
        echo "email is required";
    }elseif(empty($password)){
        echo "Password required";
    }elseif($password != $confirm_password){
        echo "passwords don't match";
    }else{
        $results = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1") ;
        $user = mysqli_fetch_array($results);
            if($user['username'] === $username){
                echo"Username already exists";
            }
            elseif($user['email'] === $email){
                echo "email already exists";
             }else{
                $password = sha1($password);
                $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
                echo "successful";
             }
    // $_SESSION['username'] = $username;
//   	$_SESSION['success'] = "You are now logged in";
 
    }
}   
?>