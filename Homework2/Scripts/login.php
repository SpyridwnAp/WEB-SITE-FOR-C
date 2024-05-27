<?php

require_once "session.php";

$error = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit']))
{
    $usr_name = trim($_POST["username"]);
    $usr_pass = trim($_POST["password"]);

    if (empty($usr_name))
    {
        $error .= 'Please enter name.';
    }
    if (empty($usr_pass))
    {
        $error .= 'Please enter your password.';
    }

    if (empty($error))
    {
        $db = mysqli_connect("localhost", "root", "", "helios_users");
        $query = "SELECT * FROM helios_users WHERE Username = '$usr_name'";
        $result = mysqli_query($db, $query);
        if ($result-> num_rows != 0)
        {
            $row = $result->fetch_assoc();
            if ($row)
            {
                if (password_verify($usr_pass, $row["Password"]))
                {
                    $_SESSION["password"] = $usr_pass;
                    $_SESSION["pswhash"] = $row["Password"];
                    $_SESSION["id"] = $row["id"];
                    $_SESSION["username"] = $row["Username"];
                    $_SESSION["role"] = $row["Role"];
                    $_SESSION["fname"] = $row["Fname"];
                    $_SESSION["lname"] = $row["Lname"];
                    $_SESSION["email"] = $row["Email"];
                    $_SESSION["gender"] = $row["Gender"];
                    $_SESSION["date"] = $row["Date"];
                    $_SESSION["photo"] = $row["Photo"];
                    header("location: ../index.php");
                    exit;
                }
                else
                {
                    $error .= 'The password is not valid.';
                }
            } 
            else {
                $error .= 'No user exists with this username.';
            }
        }
    }
    mysqli_close($db);
}
header("location: ../login.html");

?>