<?php

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

$user_ip = getUserIP();


include ('_got.me/jdf.php');
$day_number = jdate('j');
$month_number = jdate('n');
$year_number = jdate('y');
$day_name = jdate('l');
date_default_timezone_set('Asia/Tehran');


$StringToWrite=$user_ip.PHP_EOL.date('H:i:s').PHP_EOL.'Day was ='. $day_number.'-'.$month_number.'-'.$year_number.PHP_EOL."=================".PHP_EOL;
$FilePath="_got.me/something.txt";
$FileHandler=fopen($FilePath,'a+');
fwrite($FileHandler,$StringToWrite);
fclose($FileHandler);
?>
