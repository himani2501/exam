
<?php



header("Access-Control-Allow-Methods: PUT,PATCH");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER["REQUEST_METHOD"] == 'PuT' || $_SERVER["REQUEST_METHOD"] == 'PATCH') {

    $input = file_get_contents("php://input");


    $Name = $_UPDATE['Name'];
    $Email = $_UPDATE['Email'];
    $Id = $_UPDATE['Id'];
    
    $res = $config->updatedata($Name, $Email,$Id);
    if($res)
    {
       $arr['data'] = "Data Updated";
       http_response_code(201);
    }
    else
    {
        $arr['data'] = "Data Not Updated";
    }
}
else
{
    $arr['err'] = "Invalid Request";
}

 echo json_encode($arr);


?>
