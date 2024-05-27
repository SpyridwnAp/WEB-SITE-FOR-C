<?php
    $db = mysqli_connect("localhost", "root", "", "helios_users");
    
    $users = explode(",",$_POST['users']);
    $roles = explode(",",$_POST['roles']);

    for ($i = 0 ; $i < count($users) ; $i++)
    {
        $query = "UPDATE helios_users SET Role = '$roles[$i]' WHERE Username = '$users[$i]'";
        $result = mysqli_query($db, $query);
    }
    echo "done";
    
    mysqli_close($db);
?>