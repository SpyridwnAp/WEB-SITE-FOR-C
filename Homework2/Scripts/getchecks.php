<?php
$json = json_decode($_POST["json"], true);

$difficulty = $_POST["difficulty"];
$error = '';

if($difficulty == "easy")
{
    $file = "../JSON/Easy.json";
}
else if($difficulty == "medium")
{
    $file = "../JSON/Medium.json";
}
else{
    $file = "../JSON/Hard.json";
}


$fileContent = file_get_contents($file);

$data = json_decode($fileContent, true);

for($i = 0 ; $i < count($data); $i++)
{
    if($json[$i] == 1)
    {
        $data[$i]['check'] = 'True';
    }
    else
    {
        $data[$i]['check'] = 'False';
    }
}
file_put_contents($file,json_encode($data));

echo $json[0];
?>