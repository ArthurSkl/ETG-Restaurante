<?php
session_start();
$titulo_page = 'Informações Administrativas'; 
include_once("../includes/menu.php");

use App\Entity\Relatorio;

$salas = "";
$dados = Relatorio::getTudo();

// echo '<pre>';
// print_r($dados);
// echo '</pre>';
// exit;

$salas_lista = '';
foreach($dados as $sala){


    if($sala['qnt_nc'] == 0 and $sala['conf_logis'] == 's'){
    $salas_lista .='
        <tbody class="body-tabela">
            <td class="area-sala">
                <div class="div-td">
                    <img src="../storage/salas/'.$sala['img_sala'].'" alt="img" class="img-td">
                    <p>'.$sala['nome_sala'].'</p>
                </div>
            </td>
            <td>
                <div class="div-td">
                    <i class="bi bi-circle-fill-green darkModeEdit"> Em dia</i>
                </div>
            </td>
            <td>
                <div class="div-td">
                    <p class="p-data darkModeEdit">'.date('d/m/Y', strtotime($sala['data_fechamento'])).'</p>
                </div>
            </td>
            <td>
                <div class="div-td">
                    <div class="progress-bar-dia">
                        <div class="progress-dia"></div>
                    </div>
                    <p class="p-progress darkModeEdit">Sem intervenção</p>
                </div>
            </td>
            <td>
                <div class="div-td">
                <p class="p-docente darkModeEdit">'.$sala['nome'].'</p>
                </div>
            </td>
        </tbody>';
    }

    // isset($sala["tem_nao_conformidade"])
    if($sala['conf_logis'] == 'n'){
        $salas_lista .='
            <tbody class="body-tabela">
                <td class="area-sala">
                    <div class="div-td">
                        <img src="../storage/salas/'.$sala['img_sala'].'" alt="img" class="img-td">
                        <p>'.$sala['nome_sala'].'</p>
                    </div>
                </td>
                <td>
                    <div class="div-td">
                        <i class="bi bi-circle-fill darkModeEdit"> Em atraso</i>
                    </div>
                </td>
                <td>
                    <div class="div-td">
                        <p class="p-data darkModeEdit">'.date('d/m/Y', strtotime($sala['data_fechamento'])).'</p>
                    </div>
                </td>
                <td>
                <div class="div-td">
                        <div class="progress-bar">
                            <div class="progress"></div>
                        </div>
                    <p class="p-progress darkModeEdit">Aguardando Logística</p>
                </div>
                </td>
                <td>
                    <div class="div-td">
                    <p class="p-docente darkModeEdit">'.$sala['nome'].'</p>
                    </div>
                </td>
            </tbody>';
        }
        if($sala['qnt_nc'] > 0 and $sala['conf_logis'] == 's'){
            $salas_lista .='
            <tbody class="body-tabela">
                <td class="area-sala">
                    <div class="div-td">
                        <img src="../storage/salas/'.$sala['img_sala'].'" alt="img" class="img-td">
                        <p>'.$sala['nome_sala'].'</p>
                    </div>
                </td>
                <td>
                    <div class="div-td">
                        <i class="bi bi-circle-fill-yellow darkModeEdit"> Em alerta</i>
                    </div>
                </td>
                <td>
                   <div class="div-td">
                    <p class="p-data darkModeEdit">'.date('d/m/Y', strtotime($sala['data_fechamento'])).'</p>
                </div>
                </td>
                <td>
                    <div class="div-td">
                        <div class="progress-bar-alerta">
                            <div class="progress-alerta"></div>
                        </div>
                        <p class="p-progress darkModeEdit">Resolvido com intervenção</p>
                    </div>
                </td>
                <td>
                    <div class="div-td">
                <p class="p-docente darkModeEdit">'.$sala['nome'].'</p>
                </div>
                </td>
            </tbody>';
            }

}





            // <h1 class="title_sala">'.$sala['nome'].'</h1>
            
            // require autoload = 0 bugs 
            require "../vendor/autoload.php";
            
            
            
            
            $titulo_page = 'Listar Relatorios';
            
    
    include_once("../includes/header/header.php");
    require("../includes/main/main_listar_relatorio.php");

?>