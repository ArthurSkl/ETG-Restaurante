<?php
session_start();
$titulo_page = "Editar Sala";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Editar Sala';
include_once("../includes/menu.php"); 
if(!$ifgensala){
    header("Location: ./listar_recados.php");
}




$obj_sala = new App\Entity\Sala;
$obj_imagem = new App\Entity\Imagens;

use App\Entity\CadastroChecklist; 
$objCadastroChecklist = new CadastroChecklist();


if (isset($_GET['id_sala']))
{  
     
    $dados_sala = $obj_sala::getDadosById($_GET['id_sala']);
    $funcionamento = json_decode($dados_sala[0]['horarios'], true);
}        

$options = '';
$checklists = array();  
$dados = $objCadastroChecklist -> getDados();

foreach ($dados as $row_check)
{
    $checklists[$row_check['id']] = $row_check['nome']; 
    $options .= '<option  class="ops" value="'.$row_check['id'].'"> '.$row_check['nome'].' </option>';
}
 

if (isset($_POST['btn_submit']))
{
    //echo($dados_sala[0]['id']);exit;
    //novo JSON de turnos para UPDATE
    $dias_funcionamento = array("segunda" => ($_POST['segunda'] == 'on' ? 'sim' : 'nao'),

                                "terca" => ($_POST['terca'] == 'on' ? 'sim' : 'nao'),

                                "quarta" => ($_POST['quarta'] == 'on' ? 'sim' : 'nao'),

                                "quinta" => ($_POST['quinta'] == 'on' ? 'sim' : 'nao'),

                                "sexta" => ($_POST['sexta'] == 'on' ? 'sim' : 'nao'),

                                "sabado" => ($_POST['sabado'] == 'on' ? 'sim' : 'nao'),

                                "turnos" => array(
                                    'matutino'          => ($_POST['matutino'] == 'on' ? 'sim' : 'nao'),
                                    'vespertino'        => ($_POST['vespertino'] == 'on' ? 'sim' : 'nao'),
                                    'noturno'           => ($_POST['noturno'] == 'on' ? 'sim' : 'nao')
                                                )
                            );
    $dias_funcionamentoJson = json_encode($dias_funcionamento);
    if (!empty($_FILES['img_sala']['name']))
    {   
        $novo_nome_imagem = $obj_imagem::storeImg($_FILES['img_sala']['name']); 
        $antigo_nome_imagem = '../storage/salas/'.$dados_sala[0]['img_sala'];
        unlink($antigo_nome_imagem);
    }
    $obj_sala -> setDados($_GET['id_sala'],
    [   
        'nome'              =>  $_POST['nome'],
        'codigo'             =>  $_POST['codigo'],
        'cor_itens'         =>  $_POST['cor_itens'],
        'img_sala'         =>  (strlen($_FILES['img_sala']['tmp_name']) ? $novo_nome_imagem : $dados_sala[0]['img_sala']),
        'descricao'            =>  $_POST['descricao'],
        'horarios'    =>  $dias_funcionamentoJson,
        'id_check'     =>  $_POST['checklist']
    ]);
    
    
    
    
    header("Location: ./listar_salas.php");
}

require("../includes/header/header.php");
require("../includes/main/main_editar_sala.php");
?>