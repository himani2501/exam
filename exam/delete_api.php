
<?php 
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include "../../config/config.php";

$config = new Config();

if ($_SERVER["REQUEST_METHOD"] == 'DELETE') {

    $input = file_get_contents("php://input");

    parse_str($input, $_DELETE);

    $id = $_DELETE['id'];
    
    $res = $config->deletedata($id);

    if($res)
{
       $arr['data'] = "Data Deleted successfully!!";  
    }
    else
    {
        $arr['data'] = "Data not deleted!!";
    }
}
else
{    
    $arr['err'] = "request Invalid!!";
}

echo json_encode($arr);


?>
