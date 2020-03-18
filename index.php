<!DOCTYPE html>
<html>
<?php
<?php
$database_host = "dbhost.cs.man.ac.uk";
$database_user = "k01092tr";
$database_pass = "<the password you set>";
$database_name = "k01092tr";
?>

$servername = "dbhost.cs.man.ac.uk";
$username = "k01092tr";
$password = "az094567";
$dbname = "k01092tr";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "\n");
}
else{
    echo "SQL Connection Successful\n";
}

$sql = 'CREATE DATABASE IF NOT EXISTS '.$dbname;
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . $conn->error . "\n";
}

$sql = 'CREATE TABLE IF NOT EXISTS games (code varchar(255) PRIMARY KEY DEFAULT "0000", gameType varchar(255) DEFAULT "G")';
if ($conn->query($sql) === TRUE) {
    echo "Table games created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

// Creates the players table: the "game" column references the "code" column of games
// I added score !!! delete old table if you wanna have it thx !!!
$sql = 'CREATE TABLE IF NOT EXISTS players (id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, userName varchar(255), game varchar(255), FOREIGN KEY (game) REFERENCES games(code), score int(6))';
if ($conn->query($sql) === TRUE) {
    echo "Table players created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

?>

<head>
  <title>DrunkNet</title>

</head>
<style>
button{
  display: inline-block;
  width: 200px;
  padding: 8px;
  color: #fff;
 background-color: transparent;

  border: 2px solid #fff;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: background-color 0.2s ease-out,
              border-color 0.2s ease-out;
}
button:hover,
button:active {
  background-color: #fff; /* fallback */
  background-color: rgba(255, 255, 255, 0.4);
  border-color: #fff; /* fallback */
  border-color: rgba(255, 255, 255, 0.4);
  transition: background-color 0.3s ease-in,
              border-color 0.3s ease-in;
  color: #66d8ed;
  border-color: #66d8ed;
  transition: border-color 0.4s ease-in,
    color 0.4s ease-in;
}
body {
  text-align: center;
    background-color: #090c39;
    font-family: Helvetica;
    color: #66d8ed;
}
body {
  text-align: center
}
header{
  img-align:center;
}
</style>
<body>
<header> <img src="drunk2.png" alt="trippy"> </header>
<h1>Welcome to DrunkNet!</h1>
<body>

  <a href=join_game.php>
    <button>Join Game</button>
  </a>

  <a href=create_game.php>
    <button>Create Game</button>
  </a>

</body>
</html>
