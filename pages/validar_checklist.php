<?php
require __DIR__."/../vendor/autoload.php";
session_start();

use App\Entity\ResponderChecklist;
use App\Entity\ValidarChecklist;
use App\Entity\Sala;

$dados_sala = isset($dados_sala) ? $dados_sala : null;
// var_dump($dados_sala);exit;
include_once("../includes/menu.php");
$titulo_page = 'Validar checklist';
$idResponderCheck = $_GET["id_realizacao"];
$objValidarChecklist = new ValidarChecklist();  
$dadosSalaNEmail = $objValidarChecklist -> getIdSala(idResponderCheck: $idResponderCheck);
$idSala = $dadosSalaNEmail['id_sala'];

$dadosSala = Sala::getDadosById($idSala)[0];
 

$perguntas = $objValidarChecklist -> getPerguntas(idSala: $idSala);
// print_r($perguntas);
$observacao = ResponderChecklist::getObservacao($idResponderCheck);
$id_user = ResponderChecklist::getUserRealiza($idResponderCheck);
// var_dump($observacao);exit;
// $perguntas["id_realizacao"] = $idResponderCheck;
$id_sala = 0; 
foreach ($perguntas as &$row) {
    // var_dump($row);exit;
    $id_sala = $row["id_sala"]; 
    $NaoConformidade = $objValidarChecklist -> hasNaoConf(idPergunta: $row["id_pergunta"], idRealiza: $idResponderCheck); 

    

    $row["observacoes"] = $observacao;
    $row["id_user_realiza"] = $id_user;
    $row["id_realizacao"] = $idResponderCheck;
    if ($NaoConformidade[0] == true) {
        $dados = $NaoConformidade[1];
        $row["imagesToPHP"] = [
            0 => (strlen($dados["img1"]) > 0) ? $dados["img1"] : "",
            1 => (strlen($dados["img2"]) > 0) ? $dados["img2"] : "",
            2 => (strlen($dados["img3"]) > 0) ? $dados["img3"] : ""
        ];
        $row["descricao_nao_confirmidade_docente"] = $dados["descricao_NC"];
        $row["id_nao_conformidade"] = $dados["id"];
        $row["NaoConformidade"] = true;
        $row["responsavel"] = "docente";


    }
 

}

// var_dump($perguntas);exit;
$perguntasJson = json_encode($perguntas);
// não tenho tempo pra estruturar então vou só mandar por aqui mesmo
$id_sala = json_decode($id_sala);
 

echo('<script>
            var id_docente_resp = '.$dadosSalaNEmail['id_usuario'].' 
            var id_sala = '.json_encode($dadosSala['id']).' 
      </script>');

require("../includes/modais/nao_conformidade_logistica.php");
require("../includes/modais/mostrar_nao_conformidade.php");
require("../includes/main/main_validar_checklist.php");
require("../includes/footer/footer.php");
?>