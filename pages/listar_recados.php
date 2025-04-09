<?php
session_start();
$titulo_page = 'Mural Recados'; 
include_once("../includes/menu.php");
 



// require autoload = 0 bugs 
require "../vendor/autoload.php";

 

use App\Entity\Recado;
 
if(isset($_POST['btn_confirmar_submit'])){

    if(isset($_POST['descricao_sala'])){
      
        $obRecado = new Recado($_SESSION['id_user'],$_POST['descricao_sala']);
        $obRecado->cadastrar();
        header("Refresh: 0");
       
    }

}
 
 

// pegando informações dos recados 

$recados = Recado::getDados()  ?  Recado::getDados(): "";

$cards_recados = '';

if (is_array($recados) || is_object($recados)) {

foreach($recados as $row_recados){

    $cards_recados .= '<div class="card">
                            <p class="msg_aviso">'.htmlspecialchars($row_recados['texto']).'</p>
                            '.
                            ($ifgenrec ? '
                            <div class="area_bot">

                                <div class="bloco_bot">

                                    <img class="icon_card_recado_editar" id_recado="'.$row_recados['id'].'" src="../assets/imgs/icons/btn_editar.png">
                                    <img class="icon_card_recado_excluir" id_recado="'.$row_recados['id'].'" src="../assets/imgs/icons/icon_trash.png">

                                </div>
                            </div>':'').'
                        </div>';
                        

    }

} else {
    // Tratamento caso $recados não seja um array ou objeto
}



    $titulo_page = 'Mural Recados';
  
    
    include_once("../includes/header/header.php");
    require("../includes/main/main_listar_recados.php");

?>