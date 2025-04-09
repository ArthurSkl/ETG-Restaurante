<?php
session_start();
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Redefinir Senha';
require("../includes/header/header.php");
if (isset($_POST['btn_submit']) && isset($_SESSION['cod_redef_senha']))
{
    var_dump($_POST);
    var_dump($_SESSION);
    if (intval($_POST['email']) == $_SESSION['cod_redef_senha'])
    {
        unset($_SESSION['cod_redef_senha']);
        header("Location: relembrar_senha_3.php");
    }
    else
    {
        header('location: relembrar_senha_2.php');
    }
}

if (isset($_POST['btn_resend']))
{
    App\Entity\Mailer::sendEmail($_SESSION['email_to_redef_secret']);
}
require("../includes/main/main_relembrar_senha_2.php");
require("../includes/footer/footer.php");
?>