<?php
require __DIR__."/../../vendor/autoload.php";
use App\Entity\Sala;
use App\Entity\CadastroChecklist;
use App\Entity\Imagens;


$objCadastroChecklist = new CadastroChecklist();
$dados = $objCadastroChecklist -> getDados();
$dados_sala = Sala::getDadosById($_GET['id_sala']);

$options = '';
foreach ($dados as $row_check ){
    $options .= '<option  class="ops" value="'.$row_check['id'].'"> '.$row_check['nome'].' </option>';
}

$newimg = false;
if(isset($_POST['status']))
{
    $status = 'L';

}
else{
    $status = 'D'; 

    
}



if (!empty($_FILES['img_sala']['name']))
{
    $antigo_nome_imagem = '../../storage/salas/'.$dados_sala[0]['img_sala'];
    unlink($antigo_nome_imagem);
    $novo_nome_imagem = Imagens::storeImgAction($_FILES['img_sala']['name']);
    $newimg = true;
}


//CADASTRANDO OS OUTROS DADOS
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
$dias_funcionamentoJson = json_encode($dias_funcionamento);
$obj_sala = new Sala();
$obj_sala -> setDados($_GET['id_sala'], ['nome' => $_POST['nome'],
                                        'codigo' => $_POST['codigo'],
                                        'cor_itens' => $_POST['cor_itens'],
                                        'img_sala' => ($newimg) ? $novo_nome_imagem : $dados_sala[0]['img_sala'],
                                        'descricao' => $_POST['descricao'],
                                        'status' => $status,
                                        'horarios' => $dias_funcionamentoJson, //horarios
                                        'id_check' => $_POST['checklist']                                     
]);
echo(json_encode(True));



?>