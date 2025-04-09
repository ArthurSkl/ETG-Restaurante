<?php  
session_start();
$titulo_page = "Cadastrar Checklist POS";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Cadastrar Checklist Pre Aula';
require("../includes/header/header.php");
include_once("../includes/menu.php");
if(!$ifreacheck){
    header("Location: ./listar_recados.php");
}
use App\Entity\Checklist;
use App\Entity\Pergunta;
use App\Entity\Sala;
// $cond = Sala::getDados('responsavel, status','id = '.$_GET['id_sala']);
// if(($_SESSION['id_user'] != $cond[0]['responsavel'] && !$ifreaac) || $cond[0]['status'] != 'A'){
//     header("Location: ./listar_recados.php");
// }
$obj_checklist = new Checklist();
$obj_pergunta = new Pergunta();
$dados_imprimir = "";
$obj_sala = new Sala();

//REGRAS DE NEGOCIO ABAIXO
$id_sala = $_GET["id_sala"]; //do metodo GET	
$id_usuario = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : ""; //do metodo GET
$data_fechamento = null;

$dados_pergunta = $obj_pergunta::getDados($id_sala); 
$dados_sala = $obj_sala::getDadosById($id_sala);
// var_dump($dados_pergunta);exit;

$perguntaPos = [];


if ($dados_pergunta)
{
    
    foreach ($dados_pergunta as $linha)
    { 
        if ($linha["tipo"] == "1" || $linha['tipo'] == '2')
        {

            array_push($perguntaPos, $linha);

            $dados_imprimir .= '
            <div class="input_checklist">

                <label class="label_checklist" for="data">'.$linha["pergunta"].'</label>
    
                <div class="row">
                    <div class="checkmark" id="btn_x'.$linha['id_pergunta'].'" onclick="atualizarValor('.$linha['id_pergunta'].',false)">
                        <i id="red'.$linha['id_pergunta'].'" class="bi bi-x"></i>
                    </div>
    
                    <div class="checkmark" onclick="atualizarValor('.$linha['id_pergunta'].',true)">
                        <i id="green'.$linha['id_pergunta'].'" class="bi bi-check"></i>
                    </div>
                </div>              
            </div>';
            $observacao_card = '<div class="observacao"><textarea maxlength="200" name="nova_observacao" id="nova_observacao"  class="nova_observacao" placeholder= "Escreva a observação, caso necessário."cols="30" rows="10" autocomplete= "off"></textarea></div>';
        }  
    }
}


$dados_imprimir .= '
<input type="hidden" id="valor_booleano" name="valor_booleano" value="0">';

// $dados = json_decode(file_get_contents('php://input'), true);


$idsPergPos = [];
foreach($perguntaPos as $perguntaOb ){

    array_push($idsPergPos, $perguntaOb['id_pergunta']);
}

echo('  <script>
            let id_checklist = '.$dados_sala[0]['id_check'].'
            let perguntasPos = '.json_encode($idsPergPos).'
            let dadosPerguntas = '.json_encode($dados_pergunta).'

        </script>');



echo('<script>
var respondidas = {}
    </script>');

//FIM DAS REGRAS DE NEGOCIO
require("../includes/main/main_cadastrar_checklist_posaula.php");

foreach ($dados_pergunta as $linha)
{
    if ($linha["tipo"] == "1" || $linha['tipo'] == '2')
    {
        echo('<script>
        respondidas['.$linha['id_pergunta'].'] = null
        </script>');
    }
}
require("../includes/footer/footer.php");




?>