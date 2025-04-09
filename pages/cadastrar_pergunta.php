<?php
session_start();
$titulo_page = "Cadastrar Pergunta";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php"); 
if(!$ifgenperg){
    header("Location: ./listar_recados.php");
}
$titulo_page = 'Cadastrar Pergunta';
require("../includes/header/header.php");

    

require("../includes/main/main_cadastrar_pergunta.php");
require("../includes/footer/footer.php");
?>