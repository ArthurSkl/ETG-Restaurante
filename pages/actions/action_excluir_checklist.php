<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Checklist;

$return = '';
try{
    if(Checklist::deleteChecklist($_GET['id_checklist'])){

        $return = true;
    }
}catch(Exception $e){

    $return = $e->getMessage();
}
$response = [
    'status'=> $return
];
echo(json_encode($response));

?>