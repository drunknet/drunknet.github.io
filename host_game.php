
<?php

$game = $_POST["submit"];
$code = rand(1000, 9999);


$servername = "dbhost.cs.man.ac.uk";
$username = "k01092tr";
$password = "az094567";
$dbname = "k01092tr";
$conn = new mysqli($servername, $username, $password, $dbname);

$gameIdentifier = 'G';
switch ($game) {
  case 'Pub Quiz':
    $gameIdentifier = 'P';
    break;
  case 'Never Have I Ever':
    $gameIdentifier = 'N';
    break;
  case 'IQTEST':
    $gameIdentifier = 'I';
}

$sql = "INSERT INTO games (code, gameType) VALUES ('".$code."', '".$gameIdentifier."')";
if ($conn->query($sql) === TRUE) {
    echo "\nGame added successfully\n";
} else {
    echo "\nError adding game: " . $conn->error . "\n";
}

?>
 <html>
<body>
  <style>

  body {
    text-align: center;
      background-color: #090c39;
      font-family: Helvetica;
      color: #66d8ed;
  }

  header{
    img-align:center;
  }
  </style>
  <header> <img src="drunk.png" alt="trippy"> </header>
  <p><?php echo "Join this game of ".$game." with the code ".$code;?></p>
 </body>
</html>
