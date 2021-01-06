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
// $sql = "CREATE TABLE registrations(
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
?>