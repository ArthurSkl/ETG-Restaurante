<?php
session_start();
$titulo_page = "Não Conformidade Salas";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php"); 
if(!$ifreaac){
    header("Location: ./listar_recados.php");
}
use App\Entity\Relatorio;
use App\Entity\Usuario;
use App\Entity\Sala;



$relatorio = new Relatorio();
$usuario = new Usuario();
$sala = new Sala();

$dadosRelatorio = $relatorio -> getAll();
$dadosUsuario = $usuario::getDados();
$dadosSala = $sala::getDados();

// foreach($dadosSala as $row) {
//     var_dump($row["nome"]);
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";
//     echo "<br>";    

// }exit;
// var_dump($dados);exit;
require("../includes/main/main_nao_conformidade_salas.php");