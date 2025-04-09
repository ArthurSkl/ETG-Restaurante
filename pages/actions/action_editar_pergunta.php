<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta;

// echo(json_encode($_GET));

if(isset($_POST['antes_da_aula']) || isset($_POST['depois_da_aula'])){
    

    if(isset($_POST['antes_da_aula'],$_POST['depois_da_aula'])){

        $nova_pergunta = filter_input(INPUT_POST,'nova_pergunta',FILTER_SANITIZE_SPECIAL_CHARS);
        Pergunta::updatePergunta($_GET['id_pergunta'],'2',$nova_pergunta);

    }else{

        if(isset($_POST['antes_da_aula'])){

            $nova_pergunta = filter_input(INPUT_POST,'nova_pergunta',FILTER_SANITIZE_SPECIAL_CHARS);
            Pergunta::updatePergunta($_GET['id_pergunta'],'0',$nova_pergunta);
    
        }
    
        if(isset($_POST['depois_da_aula'])){
    
            $nova_pergunta = filter_input(INPUT_POST,'nova_pergunta',FILTER_SANITIZE_SPECIAL_CHARS);
            Pergunta::updatePergunta($_GET['id_pergunta'],'1',$nova_pergunta);
    
        }

    } 
    
    $return = [
        'status'=>true

    ];
    
    echo(json_encode($return));



    
}



?>