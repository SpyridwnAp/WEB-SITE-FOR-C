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

$dataArr[0] = $json;


for($i = 0; $i < count($data); $i++)
{
    $dataArr[$i + 1] = $data[$i];
}

if (file_put_contents($file, json_encode($dataArr))) {
    $error = 'none';
}
else{
    $error = 'done';
}
//file_put_contents($file, json_encode($dataArr));

echo $file." ".$error;
?>