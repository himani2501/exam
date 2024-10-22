<?php

header("Access-Control-Allow_Methods: POST");
header("Content-Type: application/json");  

include "../../config/config.php";

$config = new Config();

if ($_SERVER['REQUEST_METHODE'] == 'POST'){

    $id = $_POST['id'];
    $res = $config->fetchsingledata($id);
    $result = mysqli_fetch_assoc($res);


    if ($result)
    {

        $arr['data'] = $result;

    }
    else
    {
        $arr['data'] = "Data not founde!!";
    }

} 
else 
{
    $arr['err'] = "request Invalis!!";

}

echo json_encode($arr);

?>