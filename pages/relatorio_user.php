<?php
session_start();
$titulo_page = 'Relatório Usuário';
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php");
if(!$ifreaac){
    header("Location: ./listar_recados.php");
}
use App\Entity\Relatorio;
use App\Entity\Usuario;
use App\Entity\Sala;
use App\Entity\Checklist;
use App\Entity\NaoConformidade;



$relatorio = new Relatorio();
$usuario = new Usuario();
$sala = new Sala();

$dadosRelatorio = $relatorio -> getAll();
$dadosUsuario = $relatorio::getUsers();
$dadosSala = $sala::getDados();
$dados_checklist = Checklist::getRespostasChecklist()['checklists'];


$qntNC = 0;
$qntC = 0 ;
$qntCorrecao = 0;
$dadosPDF = '';
if(isset($_POST['btn_submit_relatorio'])){

    $user = isset($_POST['users_select']) ? $_POST['users_select'] != 'Selecione o Usuário' ? $_POST['users_select'] : '' : '';

    $check = isset($_POST['checks_select']) ? 
       $_POST['checks_select'] != 'Selecione o Checklist' ? $_POST['checks_select'] : ''  
    : '';

    

    $data = isset($_POST['data_inicial'],$_POST['data_final'])? [$_POST['data_inicial'],$_POST['data_final']] : [];
     
    $result = NaoConformidade::getNCLogistica(id_prof:$user,id_checklist:$check,datas:$data); 
    $dadosPDF = json_encode($result[0]);
    if($result){ 
        $qntC = $result[1]['countC'];
        $qntNC = $result[1]['countNC'];
        $qntCorrecao = $result[1]['countCorrecao'];
    }
}
 

 
require("../includes/main/main_relatorio_usuario.php");