<?php
session_start();
$titulo_page = "Não Conformidade";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php"); 
if(!$ifreacheck){
    header("Location: ./listar_recados.php");
}


$titulo_page = 'cadastrar nao conformidade';
require("../includes/header/header.php");
require("../includes/main/main_cadastrar_nao_conformidade.php");
//REGRAS DE NEGOCIO ABAIXO



//FIM DAS REGRAS DE NEGOCIO
require("../includes/footer/footer.php");

?>
