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

$dataArr[] = $data[0];

for ($i=0; $i < count($json); $i++) { 
    $error.=$json[$i];
}

$len = count($data);

$j = 0;

for($i = 0 ; $i < $len ; $i++)
{
    if($json[$i] != 1)
    {
        $dataArr[$j] = $data[$i];
        $j++;
    }
    else
    {
        continue;
    }
}
file_put_contents($file,json_encode($dataArr));
echo $error;
?>