<!DOCTYPE html>
<html>
<head>
    <title> DrunkNet Home </title>
</head>

<style>
input[type=submit],button{
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
input[type=submit],button:hover,
input[type=submit],button:active {
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
<header> <img src="drunk.png" alt="trippy"> </header>
</body>
<?php
$servername = "dbhost.cs.man.ac.uk";
$username = "k01092tr";
$password = "az094567";
$dbname = "k01092tr";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo ' Hi ' .$_POST["name"]. ' in game' .$_POST["code"];
$name = $_POST["name"];
$code = $_POST["code"];

echo '<div>SCOREBOARD</div>';
$sql = "SELECT * FROM players WHERE game = '$code'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_array()) {
        echo("<p>");
        echo("<div>");
        echo ($row["userName"]);
        echo (" --> ");
        echo($row["score"]);

    }
} else {
    echo "0 results";
}
?>
<p>
<a href=index.php>
  <button>Start another game</button>
</a>
<?php
echo '<form action="scoreboard.php" method="post">';
echo '<input type="hidden" name="name" value='.$name.">";
echo '<input type="hidden" name="code" value='.$code.">";
echo '<p><input type="submit" value="Refresh Page" name="Refresh page"></p>';
echo'</form>';
?>
</p>
