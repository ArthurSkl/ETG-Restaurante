<?php
session_start();
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);
require __DIR__."/../../vendor/autoload.php";
use App\Entity\AcaoCorretiva;
use App\Entity\NaoConformidade;
use App\Entity\ResponderChecklist;
 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
//setar
if (isset($_GET["id_sala"])) {
    $id_sala_get = isset($_GET["id_sala"]);
}

function convert_base64_png($img) {
    //LOGICA DA IMAGEM
    list($type, $data) = explode(';', $img);
    list(, $data) = explode(',', $data); 
    $img_decodificada = base64_decode($data); 
    $nome = uniqid().'_acao_corretiva.png'; 
    $caminho_salvar = '../../storage/acao_corretiva/'.$nome;
    file_put_contents($caminho_salvar, $img_decodificada);
    return $nome;
}

$data = json_decode(file_get_contents("php://input"), true);
// $response = ["status" => false];

function cadastrarAcaoCorretiva($AcaoCorretiva, $objeto_acao_corretiva) {
    $id_nao_conformidade = $AcaoCorretiva["id_n_conf"];
    $descricao = $AcaoCorretiva["descricao_n_conf"];
    $img_1 = (isset($AcaoCorretiva["images"][0])) ? $AcaoCorretiva["images"][0] : "";
    $img_2 = (isset($AcaoCorretiva["images"][1])) ? $AcaoCorretiva["images"][1] : "";
    $img_3 = (isset($AcaoCorretiva["images"][2])) ? $AcaoCorretiva["images"][2] : "";

    $img_1 = ($img_1 != "") ? convert_base64_png($img_1) : "";
    $img_2 = ($img_2 != "") ? convert_base64_png($img_2) : "";
    $img_3 = ($img_3 != "") ? convert_base64_png($img_3) : "";
    
    
    $objeto_acao_corretiva->setImg_1($img_1);
    $objeto_acao_corretiva->setImg_2($img_2);
    $objeto_acao_corretiva->setImg_3($img_3);
    $objeto_acao_corretiva->setIdNaoConformidade($id_nao_conformidade);
    $objeto_acao_corretiva->setDescricao($descricao);
    $objeto_acao_corretiva->setIdUsuario($_SESSION['id_user']);

    
    $responseDB = $objeto_acao_corretiva->save();
    // echo json_encode($responseDB);
    
    if(!$responseDB) {
        //ARMAZENAR NO LOG
        return false;
    }
    return true;
}

foreach ($data as $AcaoCorretiva) {
    $objeto_acao_corretiva = new AcaoCorretiva();
    cadastrarAcaoCorretiva($AcaoCorretiva, $objeto_acao_corretiva);
}


ResponderChecklist::setConfLogis($_GET['id_realizacao'], "s");


echo json_encode(true);





