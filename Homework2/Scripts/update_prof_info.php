<?php
$db = mysqli_connect("localhost", "root", "", "helios_users");

$usr_fname = trim($_POST["user_fname"]);
$usr_lname = trim($_POST["user_lname"]);
$usr_email = trim($_POST["user_email"]);
$usr_name = trim($_POST["user_name"]);
$usr_pass = trim($_POST["password"]);
$usr_re_pass = trim($_POST["repeat_password"]);
$pw_hash = password_hash($usr_pass, PASSWORD_BCRYPT);
$usr_gender = trim($_POST["user_gender"]);
$usr_date = trim($_POST["user_date"]);
$usr_photo = $_FILES["user_photo"]['name'];

$sql = "SELECT * FROM helios_users WHERE Email = '$usr_email'";
$result = mysqli_query($db, $sql);

$error = '';

if($result->num_rows > 1)
{
    $error .= 'Email already used!';
}
else if($usr_pass != $usr_re_pass)
{
    $error .= 'Invalid password!';
}
if ($error == '') 
{
    if($usr_photo == "")
    {
        if (empty($usr_pass)) {
            $sql = "UPDATE helios_users SET Fname = '$usr_fname', Lname = '$usr_lname' , Email = '$usr_email', Gender = '$usr_gender', Date = '$usr_date' WHERE Username = '$usr_name';";
        }
        else
        {
            $sql = "UPDATE helios_users SET Fname = '$usr_fname', Lname = '$usr_lname' , Email = '$usr_email',Password = '$pw_hash', Gender = '$usr_gender', Date = '$usr_date' WHERE Username = '$usr_name';";
        }
    }
    else
    {
        $target = "../UserPhoto/$usr_name.".pathinfo($usr_photo, PATHINFO_EXTENSION);
        $data = getimagesize($_FILES["user_photo"]['tmp_name']);
        $width = $data[0];
        $height = $data[1];
        if($width > 512)
        {
            $error .= 'Width > 512!';
            echo "<script>alert('$error');location.href = '../profile.php';</script>";
        }
        else
        {

            if (empty($usr_pass)) {
                $sql = "UPDATE helios_users SET Fname = '$usr_fname', Lname = '$usr_lname' , Email = '$usr_email', Gender = '$usr_gender', Date = '$usr_date', Photo = '$target' WHERE Username = '$usr_name';";
            }
            else
            {
                $sql = "UPDATE helios_users SET Fname = '$usr_fname', Lname = '$usr_lname' , Email = '$usr_email',Password = '$pw_hash', Gender = '$usr_gender', Date = '$usr_date', Photo = '$target' WHERE Username = '$usr_name';";
            }
            $row = $result->fetch_assoc();
            unlink($row["Photo"]);
            if (move_uploaded_file($_FILES['user_photo']['tmp_name'],$target)) 
            {
                echo "true";
            }
            else
            {
                echo "false";
            }
        }
    }
    mysqli_query($db, $sql);
    mysqli_close($db);
    header("location:../logout.php");
}
else
{
    echo "<script>alert('$error');location.href = '../logout.php';</script>";
}

?>