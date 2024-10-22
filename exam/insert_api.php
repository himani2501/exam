
<?php

header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include "config.php";

$config = new Config();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    
    $res = $config->insertdata($Name, $Email);   

    if($res){

    $arr['data'] = "Data inserted successfully!!";
       http_response_code(201);

    }
    else
    {
        $arr['data'] = "Data not inserted!!";
    }
}
else
{
    $arr['err'] = "request Invalid!!";
}
echo json_encode($arr);
?>
