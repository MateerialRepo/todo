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
//     echo "Table not created" . $conn->error;
// }

// $sql = "CREATE TABLE statuses(
//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     status VARCHAR(50) NOT NULL
// )";
// if($conn->query($sql) === TRUE){
//     echo "Table created";
// }else{
//     echo "Table not created" . $conn->error;
// }
// $sql = "INSERT INTO statuses(status) VALUE ('Pending');";
// $sql.= "INSERT INTO statuses(status) VALUE ('In Progress');";
// $sql.= "INSERT INTO statuses(status) VALUE ('Completed')";
// if($conn->multi_query($sql) === TRUE){
//     echo "Statuses added";
// }else {
//     echo "Status not added". $conn->error;
// }
// $sql = "CREATE TABLE priorities(
//     id INT(6) AUTO_INCREMENT PRIMARY KEY,
//     priority VARCHAR(50) NOT NULL
// )";

// if($conn->query($sql) === TRUE){
//     echo "Table created";
// }else{
//     echo "Table not created" . $conn->error;
// }
// $sql = "INSERT INTO priorities(priority) VALUE ('Low');";
// $sql.= "INSERT INTO priorities(priority) VALUE ('Medium');";
// $sql.= "INSERT INTO priorities(priority) VALUE ('High')";
// if($conn->multi_query($sql) === TRUE){
//     echo "Priorities added";
// }else {
//     echo "Priorities not added". $conn->error;
// }
?>