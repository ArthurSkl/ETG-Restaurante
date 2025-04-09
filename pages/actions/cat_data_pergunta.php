<?php
session_start();
require __DIR__."/../../vendor/autoload.php";
use App\Entity\ResponderChecklist;
use App\Entity\Sala;

$id_sala = $_GET['id_sala'];
$id_checklist  = $_GET['id_checklist']; 

$dados = json_decode(file_get_contents('php://input'), true); 
// echo json_encode($dados);
$status = false; 


if(isset($id_sala,$id_checklist)){
    
    
    try{
        ResponderChecklist::cadastrar($dados, $id_sala, $id_checklist);
        // echo(json_encode(ResponderChecklist::cadastrar($dados, $id_sala, $id_checklist)));
        $status = true;

    }catch(Exception $e){ 
        $status = $e->getMessage(); 
    }
    
 
} 
echo(json_encode([
    'status'=>$status
]));

 


 
