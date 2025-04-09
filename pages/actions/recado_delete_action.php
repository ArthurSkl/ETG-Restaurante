<?php
require __DIR__."/../../vendor/autoload.php";

use \App\Entity\Recado;


if(isset($_GET['id_recado'])){
    $id_perfil = $_GET['id_recado'];
}else{
    header("Location: ../../pages/gerenc_perfis.php");
}

$action_excluir = Recado::deleteById($id_perfil) ? true : false;

if($action_excluir){

    $response = [
        'status'=>true  
    ];
}else{

    $response = [
        'status'=>false
    ];
}

echo(json_encode($response));