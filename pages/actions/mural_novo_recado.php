<?php 

session_start();

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Recado;
 

try {
    $dados = json_decode(file_get_contents('php://input'), true);
    if($_SESSION['id_user']){

        $obRecado = new Recado($_SESSION['id_user'],$dados['texto']);
        $obRecado->cadastrar();

        $response = [
            'status'=> true
        ];
    }else{
        $response = [
            'status'=>false
        ];
    }
}
catch(Exception $e){
    $response = [
        'status'=>$e
    ];
}

$responseJson = json_encode($response);
echo($responseJson);


?>