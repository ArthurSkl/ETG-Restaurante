<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta;

$return = '';
try{
    if(Pergunta::excluirPergunta($_GET['id_pergunta'])){

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