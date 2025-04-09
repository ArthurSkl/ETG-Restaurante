<?php
session_start();
$titulo_page = 'Notificacoes';
include_once("../includes/menu.php"); 

require __DIR__."/../vendor/autoload.php";
require("../includes/header/header.php");




use App\Entity\Notificacao;
$notificacao = new Notificacao();
//die('teste');

$dados = $notificacao::getNotificacao($_SESSION["id_user"]);


date_default_timezone_set('America/Sao_paulo');

$dataBanco = isset(Notificacao::getNotificacao($_SESSION["id_user"])[0]['data_envio'])?Notificacao::getNotificacao($_SESSION["id_user"])[0]['data_envio'] : "";

$primeiraData = new DateTime($dataBanco);

$segundaData = new DateTime(date('Y-m-d H:i:s'));


$diferenca = $segundaData->getTimestamp() - $primeiraData->getTimestamp();




$todas_notificacao = '';

foreach ($dados as $contador){
    
    $dataBanco = $contador['data_envio'];
    
    
    $primeiraData = new DateTime($dataBanco);
    
    $segundaData = new DateTime(date('Y-m-d H:i:s'));
    $unidadeTempo = "";
    
    $diferenca = $segundaData->getTimestamp() - $primeiraData->getTimestamp();
    
    $minutes = round($diferenca/60);
    $hours = round($diferenca/60/60);
    $days = round($diferenca/60/60/24);
    
    // $tempoAtras = "";  
    if($diferenca < 60){
        
        $tempoAtras = $diferenca." Segundos";
        
    }
    else if(($diferenca/60) > 59 and $diferenca/60/60 < 24){
        if($hours == 1){
            $tempoAtras = "Há ".$hours." Hora";
            
        }
        else{
            // $diferenca = ($diferenca /60)/60;
            // $unidadeTempo = ' Horas ';
            
            $tempoAtras = $hours." Horas";
            // echo($hours);
        }    
    }
    else if(($diferenca/60) < 60 and $diferenca/60/60 < 59){
        
        // $diferenca = $diferenca /60;
        // $unidadeTempo = " Minutos ";
        
        $tempoAtras = $minutes." Minutos";
        
    }
    else if($diferenca/60/60 > 59){
        
        $tempoAtras = $days." Dias";

    }
    
    $diferenca = round($diferenca);
    
    
    
    
    // var_dump($contador["id"]) . var_dump($contador["texto"]) . print($tempoAtras) . var_dump($contador["visualizado"]);
    // echo("<br>");
    if($contador['marcado'] == 1)
    
    {
        
            $todas_notificacao .='
            <div class="notificacao_individual" id="card_notificacao'.$contador['id'].'" onclick="desmarcar('.$contador['id'].')"> 
            <p class="texto_notificacao">'.$contador['texto'].' </p>
            
            <div class="area_temp_coracao">
            
                <div class="tempo">'.$tempoAtras.'</div>
            
                
               
                    <div class="coracao active" id="coracaoVazio'.$contador['id'].'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
                    </div> 
                                                                
                <div class="coracaov2 active" id="coracaoPreenchido'.$contador['id'].'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </div>
                                                                        
                </div>    

            </div>';
        
        }

        // coracaov2 active = coracao preenchido
        else
        {
            
                $todas_notificacao .='
                <div class="notificacao_individual" id="card_notificacao'.$contador['id'].'" onclick="trocar_coracao('.$contador['id'].')">
                    <p class="texto_notificacao">'.$contador['texto'].'</p>
                    <div class="area_temp_coracao">
            
                        <div class="tempo"> '.$tempoAtras.'</div>
                    
                    
                        <div class="coracao" id="coracaoVazio'.$contador['id'].'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </div> 
                                                                           
                        <div class="coracaov2" id="coracaoPreenchido'.$contador['id'].'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                        </div>



                    </div>                             
                </div>';
    }
}

require("../includes/main/main_listar_notificacoes.php");
require("../includes/footer/footer.php");
?>
