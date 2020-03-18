<!DOCTYPE html>
<html>
<head>
  <title>DrunkNet - Welcome</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

Welcome <?php echo $_POST["name"]; ?><br>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = 'SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE name LIKE _'.$_POST['code'];
$result = $conn->query($sql);
if ($result === TRUE) {
  echo "Player added successfully";
  echo $result;
} else {
  echo "Error finding game: " . $conn->error;
}

$sql = 'INSERT INTO G'.$_POST['code'].' (UserName) VALUES ("'.$_POST['name'].'")';
if ($conn->query($sql) === TRUE) {
  echo "Player added successfully";
} else {
  echo "Error adding player: " . $conn->error;
}

$sql = 'SELECT GameType FROM'

?>

</body>
</html>
