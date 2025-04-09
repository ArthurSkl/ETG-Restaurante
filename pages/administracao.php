<?php
session_start();
$titulo_page = "Administração";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php"); 
$titulo_page = 'Administracao';
require("../includes/header/header.php");
require("../includes/main/main_administracao.php");




use App\Entity\Sala;

$dados = Sala::getSalas();
$tr = "";

foreach($dados as $sala){

    $tr .= '<tr class="conteudo_tabela">
    
    <td>
    <div class="area_card_sala">
            <div class="border_card_sala" style="
            border: 2px solid '.$sala['cor'].'"></div>
            <img class="img_card_sala" src="../storage/salas/'.$sala['imagem'].'">
            <p class="nome_sala">'.$sala['nome'].'</p>
        </div>
        
        </td>
        
        
        <td>
        <div class="status_progresso_sala">

        <div class="content_status">

        <div class="area_status">
                    <div class="bola_status_sala red"></div><p class="titulo_area_status">Em atraso</p>
                </div>
                
                <p class="text_about_status">Atualização de Status esta atualizada de maneira tal que esta atualmente atualizada mesmo parecendo estar desatualizada</p>
                
                

                </div>
                
                </div>
                </td>
                
                
                <td>
                <div class="datas_sala">
                15/02/2003
                </div>
                </td>
                
                
                <td>
                <div class="intervencao_sala">

            <div class="barra_progressao"></div>
            <p>Aguardando Logística</p>
            
            </div>
            </td>
            
            
    <td>
    <div class="docente_sala">
            <p class="nome_docente">Dr. Paulo Muzy teste </p>
            </div>
    </td>
    
</tr>';


}
require("../includes/footer/footer.php");
?>