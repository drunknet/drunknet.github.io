<!DOCTYPE html>
<html>
<head>
  <title>DrunkNet - Welcome</title>
  <header> <img src="drunk2.png" alt="trippy"> </header>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<style>
body{
  color:#66d8ed;
}
</style>
<?php

$name = $_POST['name'];
$code = $_POST['code'];

?>

Welcome <?php echo $name; ?><br>

<?php

$servername = "dbhost.cs.man.ac.uk";
$username = "k01092tr";
$password = "az094567";
$dbname = "k01092tr";
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM games WHERE code = '".$code."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo "Game found\n";
    $row = $result->fetch_assoc();
    $nrOfAnsweredQuest=0;
    $nrOfDrinks=0;
    switch ($row["gameType"]) {
      case "P":
          echo '<form action="barquiz.php" method="post">'; // SENDS PLAYER name and gamecode TO THE GAME
          echo '<input type="hidden" name="name" value='.$name.">";
          echo '<input type="hidden" name="code" value='.$code.">";
          echo '<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
          echo '<p><input type="submit" name="Start Game"></p>';
           echo '</form>';
        break;
      case "N":
            echo '<form action="nhie.php" method="post">'; // SAME AS ABOVE
            echo '<input type="hidden" name="name" value='.$name.">";
            echo '<input type="hidden" name="code" value='.$code.">";
            echo '<input type="hidden" name="nrOfDrinks" value='.$nrOfDrinks.">";
            //for owen
            echo '<p><input type="submit" name="Start Game"></p>';
            echo '</form>';
        break;
        case "I":
              echo '<form action="try.php" method="post">'; // SAME AS ABOVE
              echo '<input type="hidden" name="name" value='.$name.">";
              echo '<input type="hidden" name="code" value='.$code.">";
                echo '<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
              echo '<p><input type="submit" value="Start Game" name="Start Game"></p>';
              echo '</form>';
          break;
    }
} else {
    echo "No game found: " . $conn->error . "\n";
}

$sql = "INSERT INTO players (username, game, score) VALUES ('".$name."','".$code."','0')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>

</body>
</html>
