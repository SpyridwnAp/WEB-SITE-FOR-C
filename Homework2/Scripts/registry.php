<?php

$usr_fname = trim($_POST["user_fname"]);
$usr_lname = trim($_POST["user_lname"]);
$usr_email = trim($_POST["user_email"]);
$usr_name = trim($_POST["username"]);
$usr_pass = trim($_POST["password"]);
$usr_re_pass = trim($_POST["repeat_password"]);
$pw_hash = password_hash($usr_pass, PASSWORD_BCRYPT);
$usr_gender = trim($_POST["user_gender"]);
$usr_date = trim($_POST["user_date"]);
$usr_photo = $_FILES["user_photo"]['name'];

$target = "../UserPhoto/$usr_name.".pathinfo($usr_photo, PATHINFO_EXTENSION);
$data = getimagesize($_FILES["user_photo"]['tmp_name']);
$width = $data[0];
$height = $data[1];

$db = mysqli_connect("localhost", "root", "", "helios_users");

$sql = "SELECT * FROM helios_users WHERE Username = '$usr_name' OR Email = '$usr_email'";
$result = mysqli_query($db, $sql);

$error = '';

if($result-> num_rows > 0)
{
    $row = $result->fetch_assoc();
    if($row["Username"] == $usr_name)
    {
        $error .= 'Username already used!';
    }
    else if($row["Email"] == $usr_email)
    {
        $error .= 'Email already used!';
    }
}
else if($usr_pass != $usr_re_pass)
{
    $error .= 'Invalid password!';
}
else if($width > 512)
{
    $error .= 'Width > 512!';
}

if($error == '')
{
    $sql = "INSERT INTO helios_users (Fname, Lname, Email, Username, Password, Gender, Date, Photo, Role) VALUES ('$usr_fname', '$usr_lname','$usr_email', '$usr_name', '$pw_hash', '$usr_gender', '$usr_date', '$target', 'user')";

    $result = mysqli_query($db, $sql);

    if (move_uploaded_file($_FILES['user_photo']['tmp_name'],$target)) 
    {
        echo "true";
    }
    else
    {
        echo "false";
    }

    mysqli_close($db);
    header("location:../login.html");
}
else
{
    mysqli_close($db);
    echo "<script>alert('$error');location.href = '../signup.html';</script>";
}


?>