<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'mydb');

$username = $_POST['username'];
$pass = $_POST['password'];

$n = "select * from users where username = '$username' && password = '$pass' ";

$result = mysqli_query($con, $n);

$num = mysqli_num_rows($result);

if($num == 1){
    echo "welcome back!";
}
else {
    echo 'incorrect username or password';
}

?>