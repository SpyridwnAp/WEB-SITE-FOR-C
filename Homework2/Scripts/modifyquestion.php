<?php
$q_a = explode(",",$_POST['q_a']);
$types = explode(",",$_POST['types']);



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
$temp = 0;

$error = '';

for ($i=0; $i < count($data); $i++) 
{ 
    $error.=" ".$temp;
    $data[$i]['question'] = $q_a[$temp];
    
    if($types[$i] == 'text_free' || $types[$i] == 'text_strict')
    {
        $data[$i]['correctAnswers'] = $q_a[$temp+1];
        $temp += 2;
    }
    else if ($types[$i] == 'radio') 
    {
        if($q_a[$temp+1] == 'True')
        {
            $temp += 3;
        }
        else
        {
            $data[$i]['answers']['a'] = $q_a[$temp+1];
            $data[$i]['answers']['b'] = $q_a[$temp+2];
            $data[$i]['answers']['c'] = $q_a[$temp+3];
            $data[$i]['answers']['d'] = $q_a[$temp+4];
            $temp += 5;
        }
    }
    else if($types[$i] == 'checkbox')
    {
        $data[$i]['answers']['a'] = $q_a[$temp+1];
        $data[$i]['answers']['b'] = $q_a[$temp+2];
        $data[$i]['answers']['c'] = $q_a[$temp+3];
        $data[$i]['answers']['d'] = $q_a[$temp+4];
        $temp += 5;
    }
}

$returnM = "";

for ($i=0; $i < count($q_a); $i++) 
{ 
    $returnM .= $q_a[$i]."\n";
}

file_put_contents($file,json_encode($data));

// $dataArr[] = $data[0];

// for ($i=0; $i < count($json); $i++) { 
//     $error.=$json[$i];
// }

// $len = count($data);

// $j = 0;

// for($i = 0 ; $i < $len ; $i++)
// {
//     if($json[$i] != 1)
//     {
//         $dataArr[$j] = $data[$i];
//         $j++;
//     }
//     else
//     {
//         continue;
//     }
// }
// file_put_contents($file,json_encode($dataArr));
echo $error."\n".$returnM;
?>