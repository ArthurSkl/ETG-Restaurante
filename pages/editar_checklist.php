<?php
session_start();
$titulo_page = "Editar Checklist";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php");
if(!$ifgencheck){
    header('Location: ./listar_recados.php');
}

require("../includes/main/main_editar_checklist.php");
require("../includes/footer/footer.php");
?>