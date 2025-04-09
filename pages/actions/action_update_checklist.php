<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Checklist;



$id_checklist =  filter_input(INPUT_GET, 'id_checklist', FILTER_SANITIZE_NUMBER_INT);
$obChecklist = new Checklist($id_checklist);

$return = [];
$status = false;    
try{
     
    
    
    

    $nome_checklist =  filter_input(INPUT_POST, 'nome_checklist', FILTER_SANITIZE_SPECIAL_CHARS);

    
    if(strlen($nome_checklist)>0){

        $obChecklist->updateChecklist($_POST['perguntas'],$nome_checklist);
        
    } 
    $status = true;


}catch(PDOException $e){

    $status = $e->getMessage();

}

$return = [
    'status'=>$status
];

echo(json_encode($return));


?>