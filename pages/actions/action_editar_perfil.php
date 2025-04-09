<?php
require __DIR__."/../../vendor/autoload.php";
use App\Entity\Perfil;


$obj_perfil = new Perfil();

$id = $_GET['id'];

$dados = [
        'nome' => $_POST['nome'],
        'gerenciar_perguntas' => (isset($_POST['gerenciar_perguntas']) ? 1 : 0),
        'gerenciar_salas' => (isset($_POST['gerenciar_salas']) ? 1 : 0),
        'realizar_acao_corretiva' => (isset($_POST['realizar_nao_conformidade']) ? 1 : 0),
        'realizar_checklist' => (isset($_POST['realizar_checklist']) ? 1 : 0),
        'gerenciar_checklist' => (isset($_POST['gerenciar_checklists']) ? 1 : 0),
        'gerenciar_recados' => (isset($_POST['gerenciar_recados']) ? 1 : 0),
        'gerenciar_notificacoes' => (isset($_POST['gerenciar_notificacoes']) ? 1 : 0),
        'gerenciar_usuarios' => (isset($_POST['gerenciar_usuarios']) ? 1 : 0),
        'gerenciar_perfis' => (isset($_POST['gerenciar_perfis']) ? 1 : 0),
        'ver_relatorios' => (isset($_POST['ver_relatorios']) ? 1 : 0)
        ];




$obj_perfil -> setDados(id: $id, dados: $dados);
$response = true;
echo(json_encode($response));
?>