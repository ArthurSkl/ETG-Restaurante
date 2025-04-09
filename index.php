<?php
session_start();
 

require "./vendor/autoload.php";
require("includes/main/main_index.php");

use App\Entity\Usuario;

 
if(isset($_SESSION['id_user'])){
    header("Location: pages/listar_recados.php");
}
    

// usuario clicou no botao de login?
if(isset($_POST['btn_sub'])){
    // pegando email, matricula e senha 
    if(isset($_POST['email'],$_POST['matricula'],$_POST['senha'])){
        // esta setado 
        $objUser = new Usuario($_POST['matricula'],$_POST['email'],$_POST['senha']);
        if($objUser->logar()){
            $_SESSION['msg'] = 'logado com sucesso!';
            header("Location: pages/listar_recados.php");
        }else{
            // mensagem de usuario ou senha invalidos
            header("Location: index.php?erro=credenciais_incorretas");
            exit();
        }   
    }else{
        // nao esta setado -> modal ou pop up, notificando que nao esta setado!
    }
}

require("includes/footer/footer.php");
?>


