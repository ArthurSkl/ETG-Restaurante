<?php
session_start();
$titulo_page = "Cadastrar Perfil";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Cadastrar Perfil';
require("../includes/header/header.php");
include_once("../includes/menu.php");
if(!$ifperfil){
    header('Location: ./listar_recados.php');
}
use App\Entity\Perfil;

if (isset($_POST['botao_salvar'], $_POST['nome']))
{
    // var_dump($_POST);exit;
    $objPerfil = new Perfil();
    $objPerfil -> cadastrar(['nome' => $_POST['nome'],
                            'gerenciar_checklist' => (isset($_POST['gerenciar_checklists']) ? 1 : 0),
                            'gerenciar_salas' => (isset($_POST['gerenciar_salas']) ? 1 : 0),
                            'gerenciar_usuarios' => (isset($_POST['gerenciar_usuarios']) ? 1 : 0),
                            'gerenciar_perfis' => (isset($_POST['gerenciar_perfis']) ? 1 : 0),
                            'gerenciar_notificacoes' => (isset($_POST['gerenciar_notificacoes']) ? 1 : 0),
                            'gerenciar_recados' => (isset($_POST['gerenciar_recados']) ? 1 : 0),
                            'realizar_acao_corretiva' => (isset($_POST['realizar_nao_conformidade']) ? 1 : 0),
                            'realizar_checklist' => (isset($_POST['realizar_checklist']) ? 1 : 0),
                            'gerenciar_perguntas' => (isset($_POST['gerenciar_perguntas']) ? 1 : 0),
                            'ver_relatorios' => (isset($_POST['ver_relatorios']) ? 1 : 0)]
); 
        
    header("Location: listar_perfis.php");
     

}
 
require("../includes/main/main_cadastrar_perfil.php");
require("../includes/footer/footer.php");
?>