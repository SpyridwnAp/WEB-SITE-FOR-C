<?php
    $db = mysqli_connect("localhost", "root", "", "helios_users");
    
    $users = explode(",",$_POST['users']);
    $deletes = explode(",",$_POST['deletes']);

    for($i = 0 ; $i < count($users) ; $i++)
    {
        if($deletes[$i] == 'true')
        {
            $sql = "SELECT * FROM helios_users WHERE Username = '$users[$i]'";
            $result = mysqli_query($db, $sql);
            $row = $result->fetch_assoc();
            unlink($row["Photo"]);
        }
    }

    for($i = 0 ; $i < count($users) ; $i++)
    {
        if($deletes[$i] == 'true')
        {
            $sql = "DELETE FROM user_answers WHERE  Username = '$users[$i]'";
            $result = mysqli_query($db, $sql);
        }
    }


    for ($i = 0 ; $i < count($users) ; $i++)
    {
        if($deletes[$i] == 'true')
        {
            $query = "DELETE FROM helios_users WHERE Username = '$users[$i]'";
            
            $result = mysqli_query($db, $query);
        }
    }
        
    mysqli_close($db);
?>