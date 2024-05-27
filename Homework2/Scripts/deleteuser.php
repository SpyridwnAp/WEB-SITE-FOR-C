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
                                Role
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>';
    while ($row = $result->fetch_assoc()) 
    { 
        $option = '<input type="checkbox" name="del_user_cb" id="del_'.$i.'_userid">';
        $table .=  "<tr><td>".$row['Username']."</td><td>".$row['Role']."</td><td>".$option."</td></tr>";
    }
    $table .="</table> <button value='Submit' id='submit_btn' onclick='submitChanges()'>Submit</button>";
    echo $table;
    mysqli_close($db);
?>