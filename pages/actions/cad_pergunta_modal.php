<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta; 

$pergunta = filter_input(INPUT_POST, 'nova_pergunta', FILTER_SANITIZE_SPECIAL_CHARS);
$check1 = $_POST['antes_da_aula'];
$check2 = $_POST['depois_da_aula'];

$obPergunta = new Pergunta($pergunta);
$resposta = '';

if($check1 == 'true' && $check2 == 'true'){
    // ambas 
    $resposta = $obPergunta->cadastrar('2');

}elseif($check1 == 'true'){
    // apenas antes 
    $resposta =   $obPergunta->cadastrar('0');


}elseif($check2  == 'true'){
    // apenas depois 
    $resposta =  $obPergunta->cadastrar('1');
}

$resp ='';
if($resposta){
    $resp = ['status' => 'OK'];
}else{
    $resp = ['status' => false];
}

echo json_encode($resp);