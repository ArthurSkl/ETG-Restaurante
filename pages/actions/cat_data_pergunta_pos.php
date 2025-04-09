<?php


// PRECISA DAR UM UPDATE NA TABELA ADICIONANDO A DATA DE FECHAMENTO 


session_start();
require __DIR__."/../../vendor/autoload.php";
use App\Entity\ResponderChecklist;
use App\Entity\Checklist;
use App\Entity\Sala;





$status = false;
 // Liberando a sala 
//  Sala::setStatusSala( $_GET['id_sala'] , 'L' );
 
  
try {

    $dados = json_decode(file_get_contents('php://input'), true);
    
    
    $id_sala = $_GET['id_sala'];
    
    $data_last_insert = Checklist::getLastCheck($id_sala)[0] ;

    
     
    
    $response=ResponderChecklist::cadastrarPos($data_last_insert['id'], $dados);

    $status = $response ; 
 } catch (Exception $e) {

    $status = $e->getMessage();

}
// Bloqueando a sala 
Sala::setStatusSala( $_GET['id_sala'] , 'B' );

echo(json_encode([
    'status' => $status
])); 