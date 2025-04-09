<?php
session_start();
$titulo_page = "Detalhes Relatório";
error_reporting(0);
ini_set('display_errors', 0);
require __DIR__ . "/../vendor/autoload.php";

use App\Entity\Checklist;

$objCheck = new Checklist();
if (isset($_GET['id_usuario']) && $_GET['id_checklist']) {
    $id_usuario = $_GET['id_usuario'];
    $id_checklist = $_GET['id_checklist'];
}
$busca = Checklist::getDetalhes($id_usuario, $id_checklist);
// var_dump($busca);

$dados_responsavel = '';
$dados_responsavel .= '<div class="dados_responsavel">       
<div class="esquerda"><p class="nome">Nome: ' . $busca[0]["nome_usuario"] . '
<p class="nome">Checklist: ' . $busca[0]["nome_checklist"] . '</p>

</div>  

</div>';
$nao_conformidade = '';
foreach ($busca as $sala) {
    $img1 = strlen($sala["img1"]) > 0 ? '<img class="imagem_nao_conformidade imagem_preview" src="../storage/n_conformidade/' . $sala["img1"] . '" alt="">' : "";
    $img2 = strlen($sala["img2"]) > 0 ? '<img class="imagem_nao_conformidade imagem_preview" src="../storage/n_conformidade/' . $sala["img2"] . '" alt="">' : "";
    $img3 = strlen($sala["img3"]) > 0 ? '<img class="imagem_nao_conformidade imagem_preview" src="../storage/n_conformidade/' . $sala["img3"] . '" alt="">' : "";

    $nao_conformidade .= '<div class="nao_conformidade">
    <div class="direita">
    
    <p>Sala: ' . $busca[0]["nome_sala"] . ' </p>
    <p class="data_abertura">Abertura: ' . $sala["data_abertura"] . '</p>
    <p>Fechamento: ' . $sala["data_fechamento"] . '</p>
    </div>
    
    <p class="texto_nao_conformidade">' . $sala["descricao_NC"] . '</p>
    
    <div class="area_imagens">
         ' . $img1 . '
         ' . $img2 . '
         ' . $img3 . '       
    </div>
</div>';
}

include_once("../includes/menu.php");
require("../includes/main/main_detalhes_relatorio.php");
// require("../includes/footer/footer.php");
