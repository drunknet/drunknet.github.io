<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_select_db($conn, 'mydb');


$sql = 'CREATE TABLE IF NOT EXISTS users (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, username varchar(255), password varchar(255))';


$username = $_POST['username'];
$pass = $_POST['password'];

$n = "select * from users where username = '$username'";

$result = mysqli_query($conn, $n);


$num = mysqli_num_rows($result);

if($num == 1){
    echo "username already taken, please be original";
}
else {
    $reg = "insert into users(username, password) values ('$username', '$pass')";
    mysqli_query($conn, $reg);
    echo 'hey!';
}

?>