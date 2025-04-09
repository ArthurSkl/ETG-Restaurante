<?php
session_start();
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Listar Perfis';
include_once("../includes/menu.php"); 
if(!$ifperfil){
    header('Location: ./listar_recados.php');
}
require("../includes/header/header.php");


use App\Entity\Perfil;

//pegando dados perfil
$objPerfil = new Perfil;
$dados_perfil = $objPerfil -> getDados();


$imprimir = '';
foreach ($dados_perfil as $row_perfil)
{
    $lock = 'false';
    if (Perfil::checkForeignKey($row_perfil["id"]))
    {
        $lock = 'true';
    }

    
    $imprimir .= '
    <li>
        <div class="titulo_gp">
            <div class="card_perfil">
                <div class="card_nome">
                    <h2 class="tipo_perfil">'.$row_perfil["nome"].'</h2>
                </div>
                <div class="icons-question1">
                <a href="/ETG_Escola_homologacao/pages/editar_perfil.php?id='.$row_perfil["id"].'">
                    <i class="bi bi-pencil-square"></i>
                </a> 
                <div class="testebotao"  id="botao-excluir-id" onclick="callPopUp(this)">
                    <a class="bi bi-trash btn_excluir" lock='.$lock.'  dataid="'.$row_perfil["id"].'"></a>
                </div>
                </div>
            </div>
        </div>
    </li>';
}

require("../includes/main/main_listar_perfis.php");
require("../includes/footer/footer.php");
?>

