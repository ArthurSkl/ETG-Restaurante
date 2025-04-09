<?php

use App\Entity\Checklist;
use App\Entity\Sala;

session_start();
$titulo_page = "Listar Checklist";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php");
// $titulo_page = 'Validar checklist';
$objSala = new Sala();
$objChecklist = new Checklist();
$checklistData = $objChecklist::getData();
foreach ($checklistData as $row) {
    // var_dump($row);
    // echo('<br>');

    $idSala = $row['id_sala'];
    $dadosSala = $objSala -> getDadosById($idSala);
    $nomeSala = $dadosSala[0]['nome'];
    
    $idChecklist = $row['id'];
    
    $imprimirChecklist .= '<a href="validar_checklist.php?id_checklist='.$idChecklist.'" class="link_card">
                                <div class="div_card_perfil">
                                    <div class="titulo_gp">
                                        <div class="card_perfil">
                                            <div class="imagem_card">
                                                <img src="https://s2-techtudo.glbimg.com/L9wb1xt7tjjL-Ocvos-Ju0tVmfc=/0x0:1200x800/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_08fbf48bc0524877943fe86e43087e7a/internal_photos/bs/2023/q/l/TIdfl2SA6J16XZAy56Mw/canvaai.png" alt="">
                                            </div>
                                            <div class="card_nome">
                                                <h2 class="tipo_perfil">Sala: '.$nomeSala.'</h2>
                                                <h2 class="tipo_perfil">Abertura: '.$row['data_abertura'].'</h2>
                                                <h2 class="tipo_perfil">Fechamento: '.$row['data_fechamento'].'</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>';
}
// exit;



require("../includes/main/main_listar_checklist.php");
require("../includes/footer/footer.php");
?>
