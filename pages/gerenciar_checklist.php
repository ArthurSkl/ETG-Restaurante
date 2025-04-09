<?php
session_start();
$titulo_page = "Gerenciar Checklist";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Editar Sala';
include_once("../includes/menu.php");
if(!$ifgencheck){
    header("Location: ../pages/listar_recados.php");
}

use App\Entity\Checklist;
$obPergunta = new Checklist();

$dados = $obPergunta->getChecklist(); 
$divs = ""; 
foreach ($dados as $item) {

    $divs .= '  <div class="question1">
                    <p name="question_text" id="question_text">'.$item['nome'].'</p>
                    <div class="icons-question1">
                        <a href="../pages/editar_checklist.php"> <button class="editar" onclick=""><i class="bi bi-pencil-square"></i></button></a>
                        <button class="excluir" onclick="openPopup3()"><i class="bi bi-trash"></i></button>
                    </div>
                </div>';

}



require("../includes/header/header.php");
require("../includes/main/main_gerenciar_checklist.php");
?>