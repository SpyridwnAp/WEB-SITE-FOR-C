<?php

$username = trim($_POST["username"]);
$datetime = trim($_POST["datetime"]);
$difficulty = trim($_POST["difficulty"]);
$result = trim($_POST["results"]);

$db = mysqli_connect("localhost", "root", "", "helios_users");
$sql = "INSERT INTO user_answers (Username, Datetime, Difficulty, Result) VALUES ('$username', '$datetime', '$difficulty', '$result')";

mysqli_query($db, $sql);

mysqli_close($db);

echo $username." ".$datetime." ".$difficulty." ".$result;
// header("location:../answers_history.php");
?>