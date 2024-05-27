<?php
    $i=0;
    $db = mysqli_connect("localhost", "root", "", "helios_users");
    $query = "SELECT * FROM helios_users WHERE Role <> 'admin'";
    $result = mysqli_query($db, $query);
    $table = '<table class="questions_tb" id = "table_id">
                        <tr>
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Role
                            </th>
                        </tr>';
    while ($row = $result->fetch_assoc()) 
    { 
        $option = "<select name = 'reg_user' id = 'reg_".$i."_id' class = 'text_field'>";
        if($row['Role'] == "user")
        {
            $option.="<option value = 'user' selected>User</option>";
            $option.="<option value = 'mod'>Moderator</option></select>";
        }
        else
        {
            $option.="<option value = 'user'>User</option>";
            $option.="<option value = 'mod' selected>Moderator</option></select>";
        }
        $table .=  "<tr><td>".$row['Username']."</td><td>".$row['Email']."</td><td>".$option."</td></tr>";
    }
    $table .="</table> <button value='Submit' id='submit_btn' onclick='submitChanges()'>Submit</button>";
    echo $table;
    mysqli_close($db);
?>