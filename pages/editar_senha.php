<?php
session_start();
$titulo_page = "Editar Senha";
require __DIR__."/../vendor/autoload.php";
include_once("../includes/menu.php"); 
$titulo_page = 'Editar Senha';
require("../includes/header/header.php");
require("../includes/main/main_editar_senha.php");


use App\Entity\Usuario;

$objUsuario = new Usuario();
$logado = false;
$erro = false;




if (isset($_POST['email'],$_POST['senhaantiga'],$_POST['novasenha'],$_POST['confirmarnovasenha'],$_POST['btn_submit'])){
    if ($objUsuario -> emailValidate($_POST['email']))
    {
        if ($objUsuario -> senhaValidate($_POST['senhaantiga'], $_POST['email']))
        {
            //var_dump($_POST);exit;
            if ($_POST['novasenha'] == $_POST['confirmarnovasenha'])
            {
                
                $objUsuario -> setDados($_POST['email'] ,$_POST['novasenha']);
                
                $logado = true;
                
            }
            else
            {
                
                $erro = true;

            }
            
        } 
        else
        {
            $erro = true;
            
            
        }
    }
    else
    {

        $erro = true;

        
    }
  
}

require("../includes/footer/footer.php");
?>
