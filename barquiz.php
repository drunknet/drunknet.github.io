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
input[type="radio"] {
  appearance: none;
display: inline-block;
position: relative;
background-color: #66d8ed;
color: #66d8ed;
top: 10px;
height: 25px;
width: 25px;
border: 0;
border-radius: 50px;
cursor: pointer;
margin-right: 7px;
outline: none;
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
<header> <img src="drunk.png" alt="trippy"> </header>
</body>
<?php
$servername = "dbhost.cs.man.ac.uk";
$username = "k01092tr";
$password = "az094567";
$dbname = "k01092tr";
// Create connection

echo ' Hi ' .$_POST["name"]. ' in game' .$_POST["code"];
$name = $_POST["name"];
$code = $_POST["code"];
$nrOfAnsweredQuest=$_POST['nrOfAnsweredQuest']+1;
echo ($nrOfAnsweredQuest);
// $_POST["name"] | $_POST['code']
$conn = new mysqli($servername, $username, $password, $dbname);
// CREATE TABLE WITH QUESTIONS FOR PUBQUIZ
$sql = 'CREATE TABLE IF NOT EXISTS barquiz (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, Question varchar(255), Answer1 varchar(255),Answer2 varchar(255),Answer3 varchar(255))';
if ($conn->query($sql) === TRUE) {
  echo " Game created successfully";
} else {
  echo "Error creating game: " . $conn->error;
}
//INSERT FIRST QUESTION IF YOU DONT COMMENT THIS IT WILL ADD THIS QUESTON INFINITELY MANY TIMES

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('Who wrote Hunger Games Trilogy?', 'Suzanne Collins', 'J.R.R. Tolkien', 'Isaac Asimov')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('Why did NASA cancel an all female spacewalk in March?', 'Not enough space suits to fit females', 'One of them had an infection', 'Airlock malfunction')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('March 2019 saw strikes by school children to raise awareness of climate change after being inspired by which teenager?', 'Greta Thunberg', 'Kashish Raimalani', 'Elinor Sergeeva')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('The Event Horizon Telescope took the first ever picture of what last year?', 'Black hole', 'Mimas and Ida', 'Donald Trump')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('Which ‘Game of Thrones’ actress was married to Joe Jonas by an Elvis impersonator?', 'Sophie Turner', 'Priyanka Chopra', 'your mom')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('Who starred in the recently released film ‘Joker’?', 'Joaquin Phoenix', 'Jared Leto', 'Duncan Hull')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('In August who’s ‘Divide’ tour became the most attended and highest grossing tour in history after 893 days on the road?', 'Ed Sheeran', 'Taylor Swift', 'Sam Smith')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('In March Google announced that one of its employees had calculated Pi to how many place?', '31.4 Trillion', '112 Billion', '1000 Million')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('In April 2019 a major fire broke out in which iconic building in France?', 'Notre Dame', 'Effiel Tower', 'Mickey Mouse in Disneyland')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$insert ="INSERT INTO barquiz (Question, Answer1, Answer2, Answer3)
VALUES ('In March last year according to Forbes who became the world’s youngest billionaire at just 21?', 'Kylie Jenner', 'Justin Bieber', 'Kendall Jenner')";
if ($conn->query($insert) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// GET QUESTIONS AND ANSWERS FROM TABLE barquiz
$quest = "SELECT Question, Answer1, Answer2, Answer3 from barquiz";
$result = $conn->query($quest);

// SELECT RANDOM QUESTIONS AND CORRESPONDING ANSWERS
$sql = "SELECT Question, Answer1, Answer2, Answer3 FROM barquiz
        ORDER BY RAND()
        LIMIT 1";

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<br>';

echo '<br>';
if ($nrOfAnsweredQuest==5){
  echo '<form action="scoreboard.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="rightAnswer" value='.$row['Answer1'].">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo '<p><input type="submit" name="submit"></p>';
  echo'</form>';}
else {

echo '<form action="barquiz.php" method="post">';

echo "<h4>The question is:</h4><br><h1<i>".$row["Question"]."</h1></i>";

$answer1 = '<p><input type="radio" name="Answer" value='.$row['Answer1'].">".$row['Answer1']."</p>";
$answer2 = '<p><input type="radio" name="Answer" value='.$row['Answer2'].">".$row['Answer2']."</p>";
$answer3 = '<p><input type="radio" name="Answer" value='.$row['Answer3'].">".$row['Answer3']."</p>";

// Shuffle answers

$answer = array($answer1 ,$answer2 ,$answer3);
shuffle($answer);
foreach ($answer as $answer) {
	echo $answer;
}

echo '<input type="hidden" name="name" value='.$name.">";
echo '<input type="hidden" name="rightAnswer" value='.$row['Answer1'].">";
echo '<input type="hidden" name="code" value='.$code.">";
echo '<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo '<p><input type="submit" name="submit"></p>';
echo "</form>";


//CHECK IF GOOD ANSWER
if (isset($_POST['submit'])) {
  $selectAnswer = $_POST['Answer'];
	if ($selectAnswer == $_POST['rightAnswer'])  { // correct answer score increase
      echo($name);
	    $sql = "SELECT score from players WHERE userName = '$name'";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);


    echo($row[0]);
    $score = (int)$row[0]+10;
	  echo($score);
    $ScoreUpdate = "UPDATE players SET score='$score' WHERE userName = '$name'";
    if ($conn->query($ScoreUpdate) == TRUE) {
          echo "Score Updatede";
      } else {
        echo "Error:";
      }
		echo "Correct";
	}else{
    echo '<img src="drink.png" alt="trippy">';
  }
}

}

//FURTHER CODE FOR NEW TABLE



?>



</html>
