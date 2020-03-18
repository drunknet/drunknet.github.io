<!DOCTYPE html>
<html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drunknet";
// Create connection

$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
else{
   echo "";
}
$root = '';
$path = 'images/';
echo ' Hi ' .$_POST["name"]. ' in game' .$_POST["code"];
$name = $_POST["name"];
$code = $_POST["code"];
$nrOfAnsweredQuest=$_POST['nrOfAnsweredQuest']+1;
echo("---");
echo ($nrOfAnsweredQuest);
echo("---");

if ($nrOfAnsweredQuest>=5){
  echo '<form action="scoreboard.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo'</form>';
}

function getImagesFromDir($path) {
    $images = array();
    if ( $img_dir = @opendir($path) ) {
        while ( false !== ($img_file = readdir($img_dir)) ) {
            // checks for gif, jpg, png
            if ( preg_match("/(\.gif|\.jpg|\.png)$/", $img_file) ) {
                $images[] = $img_file;
            }
        }
        closedir($img_dir);
    }
    return $images;
}
function getRandomFromArray($ar) {
    mt_srand( (double)microtime() * 1000000 ); // php 4.2+ not needed
    $num = array_rand($ar);
    return $ar[$num];
    }

// Obtain list of images from directory
$imgList = getImagesFromDir($root . $path);

$img = getRandomFromArray($imgList);


?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="stylesheetforbuttons.css">

<meta charset="utf-8" />
<title>Demo</title>
<style type="text/css">
body { font: 14px/1.3 verdana, arial, helvetica, sans-serif; }
h1 { font-size:1.3em; }
h2 { font-size:1.2em; }
a:link { color:#33c; }
a:visited { color:#339; }
p { max-width: 60em; }

//so linked image won't have border
a img { border:none; }
</style>
</head>
<body>

<!-- image displays here -->
<div><img src="<?php echo $path . $img ?>" alt="" /></div>
<p id="score"> <p/>
<p id="winORlose"> <p/>

<script>

document.getElementById("score").innerHTML = 0
document.getElementById("winORlose").innerHTML = "you got this!"


var imagesArray = [
    {name: 'q1', image: '/images/q1.jpg'},
  //  {name: 'q2', image: '/images/q2.jpg'},
  //  {name: 'q3', image: '/images/q3.jpg'},
  //  {name: 'q4', image: '/images/q4.jpg'},
  //  {name: 'q5', image: '/images/q5.jpg'},
  //  {name: 'q6', image: '/images/q6.jpg'}
]

function correct() {
alert("  <?php
  $sql = "SELECT score from players WHERE userName = '$name'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  echo($name);
  echo($row[0]);
  $score = (int)$row[0]+10;
  echo($score);
  $ScoreUpdate = "UPDATE players SET score='$score' WHERE userName = '$name'";
  if ($conn->query($ScoreUpdate) == TRUE) {
        echo "Score Updatede";
    } else {
      echo "Error:";
    }
    ?>");
    document.getElementById("winORlose").innerHTML = "you just won 10 points! woo";
    location.reload(2000);
}

function incorrect() {
  alert("  <?php
    $sql = "SELECT score from players WHERE userName = '$name'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    echo($name);
    echo($row[0]);
    $score = (int)$row[0]-5;
    echo($score);
    $ScoreUpdate = "UPDATE players SET score='$score' WHERE userName = '$name'";
    if ($conn->query($ScoreUpdate) == TRUE) {
          echo "Score Updatede";
      } else {
        echo "Error:";
      }
      ?>");
    document.getElementById("score").innerHTML = Number(document.getElementById("score").innerHTML) - 10;
    document.getElementById("winORlose").innerHTML = "you just lost 10 points rip";
    location.reload(2000);
}

function go_to_next() {
    alert(score);
    /* add function here */
}

</script>

<p>&nbsp;</p>
<style>
input[type=button], input[type=submit], input[type=text], input[type=number][disabled=disabled]{
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
input[type=button], input[type=submit], input[type=text],input[type=number]:hover,
input[type=button], input[type=submit], input[type=text],input[type=number]:active {
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
body{
  text-align: center;
    background-color: #090c39;
    font-family: Helvetica;
    color: #66d8ed;
}
#q3button1 {
    background-color: black;
    color: red;
}
#q3button2 {
    background-color: red;
    color: yellow;
}
#q3button3 {
    background-color: green;
    colour: violet;
}
#q3button4 {
    background-color: blue;
    colour: green;
}
#q5button1 {
    background-color: black;
    color: red;
}
#q5button2 {
    background-color: red;
    color: yellow;
}
#q5button3 {
    background-color: red;
    colour: Yellow;
}
#q5button4 {
    background-color: blue;
    colour: green;
}
</style>
</body>
<?php

if ($img =="q1.jpg"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
echo '<form action="try.php" method="post">';
echo '<input type="hidden" name="name" value='.$name.">";
echo '<input type="hidden" name="code" value='.$code.">";
echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='button' name='q1.button1' value='4' onclick='incorrect()'>";
echo "<input type='button' name='q1.button2' value='5', onclick='incorrect()'>";
echo "<input type='button' name='q1.button3' value='6', onclick='correct()'>";
echo "<input type='button' name='q1.button4' value='7', onclick='incorrect()'>";
echo "</form>";}
}

if ($img =="q2.png"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
echo '<form action="try.php" method="post">';
echo '<input type="hidden" name="name" value='.$name.">";
echo '<input type="hidden" name="code" value='.$code.">";
echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='submit' name='submit1' value='15', onclick='incorrect()'>";
echo "<input type='submit' name='submit2' value='12', onclick='incorrect()'>";
echo "<input type='submit' name='submit3' value='13', onclick='correct()'>";
echo "<input type='submit' name='submit4' value='6', onclick='incorrect()'>";
echo "</form>";}
}

if ($img =="q3.png"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
  echo '<form action="try.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='submit' name='submit1' id='q3button1 'value='Green', onclick='incorrect()' >"; // only the colours matter
echo "<input type='submit' name='submit2' id='q3button2' value='Blue', onclick='incorrect()'>";
echo "<input type='submit' name='submit3' id='q3button3'  value='Red', onclick='correct()'>";
echo "<input type='submit' name='submit4' id='q3button4'  value='Yellow', onclick='incorrect()'>";
echo "</form>";}
}

if ($img =="q4.png"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
  echo '<form action="try.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='submit' name='submit1' id='q5button1' value='yellow', onclick='incorrect()'>";
echo "<input type='submit' name='submit2' id='q5button2' value='green', onclick='incorrect()'>";
echo "<input type='submit' name='submit3' id='q5button3' value='blue', onclick='incorrect()'>";
echo "<input type='submit' name='submit4' id='q5button4' value='red', onclick='correct()'>";
echo "</form>";}
}

if ($img =="q5.png"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
  echo '<form action="try.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='submit' name='submit1' value='Red', onclick='incorrect()' >"; // the colour of this button is green
echo "<input type='submit' name='submit2' value='blue', onclick='correct()'>"; // the colour of this button is red
echo "<input type='submit' name='submit3' value='Red', onclick='incorrect()'>"; //colour =  pink
echo "<input type='submit' name='submit4' value='orange', onclick='incorrect()'>"; // colour = orange
echo "</form>";}
}

if ($img =="q6.png"){
  if($nrOfAnsweredQuest>=6){
    echo '<form action="scoreboard.php" method="post">';
    echo '<input type="hidden" name="name" value='.$name.">";
    echo '<input type="hidden" name="code" value='.$code.">";
    echo '<p><input type="submit" name="submit"></p>';
    echo'</form>';
  }else{
  echo '<form action="try.php" method="post">';
  echo '<input type="hidden" name="name" value='.$name.">";
  echo '<input type="hidden" name="code" value='.$code.">";
  echo'<input type="hidden" name="nrOfAnsweredQuest" value='.$nrOfAnsweredQuest.">";
echo "<input type='submit' name='submit1' value='blue', onclick='incorrect()'>"; // colour = red
echo "<input type='submit' name='submit2' value='red', onclick='correct()'>"; // colour = pink
echo "<input type='submit' name='submit3' value='green', onclick='incorrect()'>"; // colour = green
echo "<input type='submit' name='submit4' value='yellow', onclick='incorrect()'>"; // colour = blue
echo "</form>";}
}

/* more q:
what comes after 11
what word matches its colour
5!
*/

?>
</html>
