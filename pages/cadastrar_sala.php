<?php
session_start();
$titulo_page = "Cadastrar Sala";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Cadastrar Sala';
require("../includes/header/header.php");
include_once("../includes/menu.php"); 

if(!$ifgensala){
    header("Location: ./listar_recados.php");
}

use App\Entity\Sala;
use App\Entity\CadastroChecklist;
use App\Entity\Imagens;




$objCadastroChecklist = new CadastroChecklist();
$dados = $objCadastroChecklist -> getDados();
$options = '';
foreach ($dados as $row_check ){
    $options .= '<option  class="ops" value="'.$row_check['id'].'"> '.$row_check['nome'].' </option>';
}

//dsadsadsa// 
if (isset(
            $_POST      ['btn_submit']    
        ))
{  
    $status='L'; 
    // var_dump($_FILES);exit;
    if (!empty($_FILES['img_sala']['name']))
    {
        $objImagem = new Imagens;
        // $imagem = $objImagem::storeImg($_FILES['imagem_sala']['name']);
        $novo_nome_imagem = $objImagem::storeImg($_FILES['img_sala']['name']); 
        
    }
            
    $dias_funcionamento = array("segunda" => (isset($_POST['segunda']) && $_POST['segunda'] == 'on' ? 'sim' : 'nao'),
         
    "terca" => (isset($_POST['terca']) && $_POST['terca'] == 'on' ? 'sim' : 'nao'),
    "quarta" => (isset($_POST['quarta']) && $_POST['quarta'] == 'on' ? 'sim' : 'nao'),
    "quinta" => (isset($_POST['quinta']) && $_POST['quinta'] == 'on' ? 'sim' : 'nao'),
    "sexta" => (isset($_POST['sexta']) && $_POST['sexta'] == 'on' ? 'sim' : 'nao'),
    "sabado" => (isset($_POST['sabado']) && $_POST['sabado'] == 'on' ? 'sim' : 'nao'),

    "turnos" => array(
        'matutino' => (isset($_POST['matutino']) && $_POST['matutino'] == 'on' ? 'sim' : 'nao'),
        'vespertino' => (isset($_POST['vespertino']) && $_POST['vespertino'] == 'on' ? 'sim' : 'nao'),
        'noturno' => (isset($_POST['noturno']) && $_POST['noturno'] == 'on' ? 'sim' : 'nao')
                    )
    );
    // var_dump($novo_nome_imagem);
    $dias_funcionamentoJson = json_encode($dias_funcionamento);
    // linha que eu add  $imagem = $objImagem::storeImg($_FILES['imagem_sala']['name']); // 
    // $imagem = $objImagem::storeImg($_FILES['imagem_sala']['name']);
    $obj_sala = new Sala
    
    
    (
        $_POST       ['nome_sala'],
        $_POST      ['codigo_sala'],
        $_POST      ['cor_sala'],
        $novo_nome_imagem,
        $_POST      ['descricao_sala'],
        'L', //status
        $dias_funcionamentoJson, //horarios
        $_POST['checklist'],
        null
    );
        $obj_sala -> cadastrar();
        // header("Location: listar_salas.php");
    
}   


require("../includes/header/header.php");
require("../includes/main/main_cadastrar_sala.php");
require("../includes/footer/footer.php");

?>