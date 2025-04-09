<?php 
session_start();
ob_start();

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Notificacao;

if(isset($_GET['id_notificacao'])){
    $id_not = $_GET['id_notificacao'];
}

$dados = Notificacao::setVisualizar($id_not);

if($dados){

    $response = [
        'status'=> true,
    ];

}else{
    $response = [
        'status'=> false,
    ];
}


echo(json_encode($response));




?>