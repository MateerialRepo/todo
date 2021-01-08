<?php
$servername = "localhost";
$username ="root";
$password ="";
$dbname = "todo";
$conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error){
//     die ("connection failed" . $conn->connect_error);
// }else{
//     echo "connected successfully";
// }
// $sql = "CREATE DATABASE todo";
// if($conn->query($sql) === TRUE){
//     echo "database created successfully";
// }else{
//     echo "Database not craeted". $conn->error;
// }
// $sql = "CREATE TABLE users(
//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(100) NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     password VARCHAR(100) NOT NULL
// )";
// if($conn->query($sql) === TRUE){
//     echo "Table created";
// }else{
//     echo "Table not craete" . $conn->error;
// }

// include('databse.php');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "todo";
// $conn = new mysqli($servername, $username, $password, $dbname);
// $username ="";
// $email ="";

// if(isset($_POST['register'])){
//     $username = $mysqli->real_escape_string($_POST['username']);
//     $email = $mysqli->real_escape_string($_POST['email']);
//     $password =$mysqli->real_escape_string($_POST['password']);
//     $confirm_password = $mysqli->real_escape_string($_POST['confrim_password']);

//     if(empty($username)){
//         echo "Username is required";
//     }
//     if(empty($email)){
//         echo "email is required";
//     }
//     if(empty($password)){
//         echo "Password required";
//     }
//     if($password!=$confirm_password){
//         echo "passwords don't match";

//     }
//     $results = mysqli_query($conn, "SELECT FROM users WHERE username = '$username' OR email = '$email' LIMIT 1") ;
//     $user = mysqli_fetch_array($results);
//     if($user){
//         if($user['username'] === $username){
//             echo "Username already exists";
//         }
//         if($user['email'] === $eamil){
//             echo "email already exists";
//         }
//     };
//     $password = sha1($password);
//     $sql = mysqli_query($conn, "INSERT INTO users(username, email, password) VALUES ('$username', '$email', '$password')");
//     echo "Registeration successful";
// }
?>