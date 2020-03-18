<?php

  $conn =  new mysqli('localhost','root','','scoreDB');

  $scoretable = 'CREATE TABLE IF NOT EXISTS scoreboard (name VARCHAR(15) NOT NULL PRIMARY KEY,
  score INT(5) UNSIGNED NOT NULL DEFAULT 0, ts TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)';

  if ($conn->query($scoretable) === TRUE) {
    echo "Scoreboard created successfully";
  } else {
    echo "There was an error creating the scoreboard:" . $conn-> connect_error;
  }



?>
