<?php
$diffs = explode(",",$_POST['diffs']);

$easy = [];
$medium = [];
$hard = [];

$difficulty = $_POST["difficulty"];
$error = '';

$easyfile = file_get_contents("../JSON/Easy.json");
$mediumfile = file_get_contents("../JSON/Medium.json");
$hardfile = file_get_contents("../JSON/Hard.json");

$easydata = json_decode($easyfile, true);
$mediumdata = json_decode($mediumfile, true);
$harddata = json_decode($hardfile, true);

$k = 0;
$l = 0;
$m = 0;
if($difficulty == "easy")
{
    for ($i=0; $i < count($diffs) ; $i++) 
    { 
        if($diffs[$i] == 'easy')
        {
            $easy[$k] = $easydata[$i];
            $k++;
        }
        else if($diffs[$i] == 'medium')
        {
            $medium[$l] = $easydata[$i];
            $l++;
        }
        else
        {
            $hard[$m] = $easydata[$i];
            $m++;
        }
    }
    file_put_contents("../JSON/Easy.json",json_encode($easy));
    for ($i=0; $i < $l; $i++) { 
        $mediumdata[$i+count($mediumdata)] = $medium[$i];
    }
    for ($i=0; $i < $m; $i++) { 
        $harddata[$i+count($harddata)] = $hard[$i];
    }
    file_put_contents("../JSON/Medium.json",json_encode($mediumdata));
    file_put_contents("../JSON/Hard.json",json_encode($harddata));
    echo "done";
}
else if($difficulty == "medium")
{
    for ($i=0; $i < count($diffs) ; $i++) 
    { 
        if($diffs[$i] == 'easy')
        {
            $easy[$k] = $mediumdata[$i];
            $k++;
        }
        else if($diffs[$i] == 'medium')
        {
            $medium[$l] = $mediumdata[$i];
            $l++;
        }
        else
        {
            $hard[$m] = $mediumdata[$i];
            $m++;
        }
    }
    file_put_contents("../JSON/Medium.json",json_encode($medium));
    for ($i=0; $i < $k; $i++) { 
        $easydata[$i+count($easydata)] = $easy[$i];
    }
    for ($i=0; $i < $m; $i++) { 
        $harddata[$i+count($harddata)] = $hard[$i];
    }
    file_put_contents("../JSON/Easy.json",json_encode($easydata));
    file_put_contents("../JSON/Hard.json",json_encode($harddata));
    echo "done";
}
else{
    for ($i=0; $i < count($diffs) ; $i++) 
    { 
        if($diffs[$i] == 'easy')
        {
            $easy[$k] = $harddata[$i];
            $k++;
        }
        else if($diffs[$i] == 'medium')
        {
            $medium[$l] = $harddata[$i];
            $l++;
        }
        else
        {
            $hard[$m] = $harddata[$i];
            $m++;
        }
    }
    file_put_contents("../JSON/Hard.json",json_encode($hard));
    for ($i=0; $i < $k; $i++) { 
        $easydata[$i+count($easydata)] = $easy[$i];
    }
    for ($i=0; $i < $l; $i++) { 
        $mediumdata[$i+count($mediumdata)] = $medium[$i];
    }
    file_put_contents("../JSON/Easy.json",json_encode($easydata));
    file_put_contents("../JSON/Medium.json",json_encode($mediumdata));
    echo "done ";
}
?>