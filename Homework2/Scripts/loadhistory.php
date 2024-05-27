<?php

$usr_name = trim($_GET["username"]);

$db = mysqli_connect("localhost", "root", "", "helios_users");
$query = "SELECT * FROM user_answers WHERE Username = '$usr_name'";
$result = mysqli_query($db, $query);

if($result->num_rows == 0)
{
    echo "<p>No results</p>";
    mysqli_close($db);
}
else
{
    $responseText = '<table class="history_tb">
                        <tr>
                            <th>
                                Datetime
                            </th>
                            <th>
                                Difficulty
                            </th>
                            <th>
                                Results
                            </th>
                        </tr>';

    while ($row = $result->fetch_assoc()) 
    { 
        $responseText .=  "<tr><td>".$row['Datetime']."</td><td>".$row['Difficulty']."</td><td>".$row['Result']."</td></tr>";
    }
    $responseText .="</table>";
    echo $responseText;
    mysqli_close($db);
}
?>