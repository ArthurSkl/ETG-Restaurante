<?php
require __DIR__."/../vendor/autoload.php";
session_start();

use App\Entity\ResponderChecklist;
use App\Entity\ValidarChecklist;
use App\Entity\Sala;


include_once("../includes/menu.php");
$titulo_page = 'Acao Corretiva';
$oq_se_ta_querendo_ta_mole = $_GET["id_realizacao"];
// $oq_se_ta_querendo_ta_mole = 1;
$js = $_GET["from_javascript"];
$pular = $_GET["pular"];



// não mexa!
$js = false;
$pular = false;
// ⬆  -  não mexa aqui ❌ 


if ($js == false) {
    $dados = ResponderChecklist::os_300_espartanos($oq_se_ta_querendo_ta_mole);
    if (count($dados) == 0) {
        header("Location: listar_checklist_concluidas.php");
    }   
} 
$perguntasJson = json_encode($dados);
 


require("../includes/modais/nao_conformidade_logistica_2.php");
require("../includes/modais/mostrar_nao_conformidade.php");
require("../includes/main/main_acao_corretiva.php");
require("../includes/footer/footer.php");
