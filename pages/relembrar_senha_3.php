<?php
session_start();
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Redefinir Senha';
require("../includes/header/header.php");

use App\Entity\Usuario;
$obj_user = new Usuario();

if (isset($_POST['btn_submit']) /* && isset($_SESSION['email_to_redef_secret']) */)
{
    if ($_POST['senha'] == $_POST['senha_confirma'])
    {
        //var_dump($_POST); echo '<br>'; var_dump($_SESSION);
        $email = $_SESSION['email_to_redef_secret'];
        $obj_user -> setPasswordByEmail($email, $_POST['senha']);
        unset($_SESSION['email_to_redef_secret']);
        header('location: ../');
    }
    else
    {
        header('location: relembrar_senha_3.php');
    }
}



require("../includes/main/main_relembrar_senha_3.php");
require("../includes/footer/footer.php");
?>