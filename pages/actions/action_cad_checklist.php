<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\CadastroChecklist;

$check = new CadastroChecklist();
$check->nome = $_POST['nome_checklist'];
$id = $check->cadastrar($_POST['perguntas']);
echo(json_encode(true));

?>