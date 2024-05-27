<?php

$usr_name = $_GET['username'];

$db = mysqli_connect("localhost", "root", "", "helios_users");
$sql = "SELECT * FROM helios_users WHERE Username = '$usr_name'";
$result = mysqli_query($db, $sql);

$error = '';

if($result-> num_rows > 0)
{
    $error .= 'Username already used!';
}

if($error == '')
{
    echo 'True';
}
else
{
    echo 'False';
}

?>