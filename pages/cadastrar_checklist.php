<?php
session_start();
$titulo_page = "Cadastrar Checklist";
require __DIR__ ."/../vendor/autoload.php";
$titulo_page = 'Cadastrar Checklist';
include_once("../includes/menu.php");
if(!$ifgencheck){
    header('Location: ./listar_recados.php');
}

// use App\Entity\Pergunta;
// use App\Entity\CadastroChecklist;
// use App\Entity\Funcoes;


 

// if (isset($_POST['btn_cadastrar']) && isset($_POST['nome_checklist'])) {
//     $check = new CadastroChecklist();
//     $check->nome = $_POST['nome_checklist'];
//     $id = $check->cadastrar($_POST['perguntas']);
// }
 




require("../includes/header/header.php");
require("../includes/main/main_cadastrar_checklist.php");
