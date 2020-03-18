<!DOCTYPE html>
<html>
<head>
    <title> DrunkNet Home </title>
</head>

<style>
input[type=submit]{
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
input[type=submit]:hover,
input[type=submit]:active {
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
    background-color: #090c39;
    text-align: center;
    font-family: Helvetica;
    color: #66d8ed;
}
body {
  text-align: center;
  border: 2px solid #fefe33 ;
  border-radius: 5px;
}
</style>

<body>
<header> <img src="drunk.gif" alt="trippy"> </header>
</body>
<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drunknet";
// $numberOfAnsweredQuestion = (int) $_POST['numberOfAnsweredQuestion']+1;
$numberOfAnsweredQuestion=$_POST['numberOfAnsweredQuestion']+1;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Never have I ever database
$name = $_POST["name"];
$code = $_POST["code"];
$nrOfDrinks = (int) $_POST["nrOfDrinks"];

$sql = 'CREATE TABLE IF NOT EXISTS statements
        (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Question varchar(255))';
if ($conn->query($sql) === TRUE) {
  echo " Never have I ever...";
} else {
  echo "Error creating game: " . $conn->error;
}


// $delete = 'DELETE FROM statements';
//
// $insert ="INSERT INTO statements (Question)
// VALUES ('Attempted to dance like Ricardo Milos')";
// if ($conn->query($insert) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $insert ="INSERT INTO statements (Question)
// VALUES ('Stole somebodys diamonds in Minecraft')";
// if ($conn->query($insert) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $insert ="INSERT INTO statements (Question)
// VALUES ('Used Ugandan Knuckles memes in 2020')";
// if ($conn->query($insert) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
//
// $insert ="INSERT INTO statements (Question)
// VALUES ('Blasted Caramelldansen')";
// if ($conn->query($insert) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }
if ($numberOfAnsweredQuestion>=6){
  echo "<br>END OF THE GAME <br>";
  if(isset($_POST["Yes"])){
    $nrOfDrinks = (int) $_POST["nrOfDrinks"];
    $nrOfDrinks += 1;
  }
  if ($nrOfDrinks <= 0){
    echo "Conguatulations! You don't need to drink :)<br>";
    echo '<form action="index.php">';
    echo '<p><input type="submit" value="Go Back To Home Page"></p>';
    echo '</form>';
  }else{
    echo "Oops! You got " .$nrOfDrinks. " to drink :(<br>";
    echo '<form action="index.php">';
    echo '<p><input type="submit" value="Go Back To Home Page"></p>';
    echo '</form>';
  }
  $numberOfAnsweredQuestion = 0;
}else{
  echo $numberOfAnsweredQuestion, "/5 question <br>";
  $quest = "SELECT Question from statements";
  $result = $conn->query($quest);
  $sql = "SELECT Question FROM statements
          ORDER BY RAND()
          LIMIT 1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  echo '<br>';
  printf($row["Question"]);
  if(isset($_POST["Yes"])){
    echo "<br>Drink";
    $nrOfDrinks = (int) $_POST["nrOfDrinks"];
    $nrOfDrinks += 1;
  }elseif(isset($_POST["No"])){
    echo "<br>Don't drink";
  }
  echo '<br>You have had ', $nrOfDrinks, ' drinks.';

  echo '<br>';
  echo '<form action="nhie.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo '<input type="hidden" name="nrOfDrinks" value='.$nrOfDrinks.">";
  echo '<input type="hidden" name="numberOfAnsweredQuestion" value='.$numberOfAnsweredQuestion.">";
  echo '<input type = "submit" name="Yes" value="Yes"> <br>';
  echo '<input type = "submit" name="No" value="No"> <br>';

}




?>
</html>
