<?php
session_start();
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Listar Salas';
include_once("../includes/menu.php"); 
require("../includes/header/header.php");

use App\Entity\Sala;


$salas = "";
$dados = Sala::getDados();
// var_dump($dados);exit;
$count = 0;
if($ifgensala){
    foreach($dados as $sala){
        // var_dump($dados);exit;
        
        
        $img_sala = '';
        if($sala['img_sala'] == ''){

            $img_sala = 'https://iili.io/JI1SMfR.png';

        }else{

            $img_sala = "../storage/salas/".$sala['img_sala'];

        }
         
        $style='';
        $link_view_sala = '';
        $status = [
            'D' => 'Desativada',
            'L' => 'Livre',
            'A' => 'Em uso',
            'B' => 'Bloqueada'
        ];
        $classes = [
            'D' => 'desativado',
            'L' => 'livre',
            'A' => 'em-uso',
            'B' => 'block'
        ];
        $classes2 = [
            'D' => 'desativado2',
            'L' => 'livre2',
            'A' => 'em-uso2',
            'B' => 'block2'
        ];
        if($sala['status']=='A'){
            if($sala['responsavel'] ==$_SESSION['id_user'] || $ifreaac){
                $link_view_sala = 'href="visualizar_sala.php?id_sala='.$sala['id'].'"';
            }
            else{
                continue;
            }
        }
        if($sala['status'] == "D"){

            $style = "filter: grayscale(1);"; 
        }
        elseif($sala['status'] == "L"){ 

            $link_view_sala = 'href="visualizar_sala.php?id_sala='.$sala['id'].'"';

        }
        
        if($count == 0){
            
            
            
            $salas .= '<div class="card_sala move" animation="right">
            
                            <div class="border_card_sala" style=" border: 2px solid '.$sala['cor_itens'].'; '.$style.'"> <p class="'.$classes[$sala['status']].'">'.$status[$sala['status']].'</p> </div>
                            <a class="click_sala" '. $link_view_sala .'><img style="'.$style.'" class="img_card_sala" src="../storage/salas/'.$sala['img_sala'].'" alt=""><h3 class="cod_sala">'.$sala['codigo'].'</h3></a>
                            <a href="editar_sala.php?id_sala='.$sala['id'].'"><img  class="icon_editar_sala" src="../assets/imgs/icons/btn_editar.png" alt=""></a>
                            <div class="area_title_sala">
                                <h1 class="title_sala darkModeEdit">'.$sala['nome'].'</h1>
                            </div>
                            
                        </div>';
                            
                            $count = 1;
        }
        
        else    
        {
            $salas .= '<div class="card_sala move" animation="left">
            
                            <div class="border_card_sala2" style=" border: 2px solid '.$sala['cor_itens'].'; '.$style.'"> <p class="'.$classes2[$sala['status']].'">'.$status[$sala['status']].'</p> </div>
                            <a class="click_sala" '. $link_view_sala .' ><img style="'.$style.'" class="img_card_sala" src="../storage/salas/'.$sala['img_sala'].'" alt=""><h3 class="cod_sala">'.$sala['codigo'].'</h3></a>
                            <a href="editar_sala.php?id_sala='.$sala['id'].'"><img  class="icon_editar_sala" src="../assets/imgs/icons/btn_editar.png" alt=""></a>
                            <div class="area_title_sala2">
                                <h1 class="title_sala2 darkModeEdit">'.$sala['nome'].'</h1>
                            </div>
                            
                        </div>';
                            $count = 0;
        }
        
        
    }
}
else
{
    
    foreach($dados as $sala){
        $link_view_sala = '';
        
        if($sala['responsavel'] == $_SESSION['id_user']){

            $link_view_sala = 'href="visualizar_sala.php?id_sala='.$sala['id'].'"';

        }    
        $img_sala = '';
        if($sala['img_sala'] == ''){

            $img_sala = 'https://iili.io/JI1SMfR.png';

        }else{

            $img_sala = "../storage/salas/".$sala['img_sala'];

        }
         
        $style='';
        
        $status = [
            'D' => 'Desativada',
            'L' => 'Livre',
            'A' => 'Em uso',
            'B' => 'Bloqueada'
        ];
        $classes = [
            'D' => 'desativado',
            'L' => 'livre',
            'A' => 'em-uso',
            'B' => 'block'
        ];
        $classes2 = [
            'D' => 'desativado2',
            'L' => 'livre2',
            'A' => 'em-uso2',
            'B' => 'block2'
        ];
        
        if($sala['status'] == "D"){ 
            $style = "filter: grayscale(1);"; 
        }
        elseif($sala['status'] == "L"){ 

            $link_view_sala = 'href="visualizar_sala.php?id_sala='.$sala['id'].'"';

        }
        
        
        if($count == 0){
            
            
            
            $salas .= '<div class="card_sala move" animation="right">
            
                            <div class="border_card_sala" style=" border: 2px solid '.$sala['cor_itens'].'; '.$style.'"> <p class="'.$classes[$sala['status']].'">'.$status[$sala['status']].'</p> </div>
                            <a class="click_sala" '. $link_view_sala .'><img style="'.$style.'" class="img_card_sala" src="../storage/salas/'.$sala['img_sala'].'" alt=""><h3 class="cod_sala">'.$sala['codigo'].'</h3></a>
                           
                            <div class="area_title_sala">
                                <h1 class="title_sala darkModeEdit">'.$sala['nome'].'</h1>
                            </div>
                            
                        </div>';
                            
                            $count = 1;
        }
        
        else    
        {
            $salas .= '<div class="card_sala move" animation="left">
            
                            <div class="border_card_sala2" style=" border: 2px solid '.$sala['cor_itens'].'; '.$style.'"> <p class="'.$classes2[$sala['status']].'">'.$status[$sala['status']].'</p> </div>
                            <a class="click_sala" '. $link_view_sala .' ><img style="'.$style.'" class="img_card_sala" src="../storage/salas/'.$sala['img_sala'].'" alt=""><h3 class="cod_sala">'.$sala['codigo'].'</h3></a>
                            
                            <div class="area_title_sala2">
                                <h1 class="title_sala2 darkModeEdit">'.$sala['nome'].'</h1>
                            </div>
                            
                        </div>';
                            $count = 0;
        }
        
        
    }
}

    

require("../includes/main/main_listar_salas.php");
require("../includes/footer/footer.php");
?>