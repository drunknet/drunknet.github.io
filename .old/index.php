<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "SQL Connection Successful";
}

// SQL to create database

$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// SQL to create table

$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
buttonState INT(6)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}
?>

<head>
  <title>DrunkNet</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<h1>Welcome to DrunkNet!</h1>

<body>

  <a href=join_game.php>
    <button>Join Game</button>
  </a>

  <a href=create_game.php>
    <button>Create Game</button>
  </a>

  <a href=sql_restructure_test_index.php>
    <button>test</button>
  </a>

</body>
</html>
