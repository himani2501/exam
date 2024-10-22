<?php


header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER["REQUEST_METHOD"] == 'GET')
{

    $res = $config->fetchdata();

    $all_movie_user = [];

    while ($result = mysqli_fetch_assoc($res)) {
        array_push($all_users, $result);
    }

    $arr['data'] = $all_movie_user;


} 
else
{
    $arr['err'] = "request Invalid!!";
}

echo json_encode($arr);


?>