<?php

session_start();

$_userRole = "";
$_userName = "";
$_fName = "";
$_lName = "";
$_email = "";
$_gender = "";
$_date = "";
$_photo = "";

if(isset($_SESSION["id"]))
{
    $_temp = explode("/",$_SESSION["photo"]);
    $_userRole = $_SESSION["role"];
    $_userName = $_SESSION["username"];
    $_fName = $_SESSION["fname"];
    $_lName = $_SESSION["lname"];
    $_email = $_SESSION["email"];
    $_gender = $_SESSION["gender"];
    $_date = $_SESSION["date"];
    $_password = $_SESSION["password"];
    $_pswHash = $_SESSION["pswhash"];
    $_photo = $_temp[1]."/". $_temp[2];
}
else
{
    $_userRole = "1";
    $_userName = "World";
}
?>