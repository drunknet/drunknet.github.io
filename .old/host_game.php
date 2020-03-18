<?php

$game = $_POST["submit"];
$code = rand(1000, 9999);

echo "Join this game of ".$game." with the code ".$code;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);

$gameIdentifier = 'G';
switch ($game) {
  case 'Pub Quiz':
    $gameIdentifier = 'P';
    break;
  case 'Never Have I Ever':
    $gameIdentifier = 'N';
    break;
}

$sql = 'CREATE TABLE IF NOT EXISTS '.$gameIdentifier.$code.' (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, UserName varchar(255), score INT(6))';

if ($conn->query($sql) === TRUE) {
  echo "Game created successfully";
} else {
  echo "Error creating game: " . $conn->error;
}

?>
<html>
<body>
  <a href=barquiz.php>
    <button>Join Game</button>
  </a>
 </body>
</html>
