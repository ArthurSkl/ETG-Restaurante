<?php
session_start();
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Redefinir Senha';
require("../includes/header/header.php");
$obj_email = new App\Entity\Mailer;

use App\Entity\Usuario;
$objUsuario = new Usuario();


if (isset($_POST['email'], $_POST['btn_submit'])){
    if ($objUsuario -> emailValidate($_POST['email']))
    {
        if ($obj_email::sendEmail($_POST['email']))
        {
            $_SESSION['email_to_redef_secret'] = $_POST['email'];
            header("Location: relembrar_senha_2.php");
        }
        else
        {
            die('algo deu errado com a classe ou algo relacionado');
        }
        
        
        
    }
    else
    {
        
        header('location: relembrar_senha_1.php');
        
    }
}
//die('AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA');

require("../includes/main/main_relembrar_senha_1.php");
require("../includes/footer/footer.php");
?>