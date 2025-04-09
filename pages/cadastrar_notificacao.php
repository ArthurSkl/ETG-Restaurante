<?php
session_start();
$titulo_page = "Cadastrar Notificação";
require "../vendor/autoload.php";
$titulo_page = 'Cadastrar Notificacao';
require("../includes/header/header.php");
include_once("../includes/menu.php");

if(!$ifgennot){
    header("Location: ./listar_recados.php");
}

use App\Entity\Notificacao;
use App\Entity\Usuario;
use App\Entity\Mailer;


if (isset($_POST['btn_submit']))
{
    $id_remetente = $_SESSION["id_user"]; //VAI PEGAR DA SESSION O ID DO USUARIO
    $email_destinatario = $_POST['email_destinatario']; //email 
    $texto = $_POST['descricao'];
    
    $usuarios = Usuario::getDadosByEmail($email_destinatario);
   
    if($usuarios)
    {
        $id_destinatario = $usuarios[0]['id'];
        Notificacao::cadastrar($id_remetente ,$id_destinatario, $texto);

        $dados_remetente = Usuario::getDadosById($id_remetente)[0];
 


        $obMail = new Mailer();
        $obMail->sendEmailNotificacao($email_destinatario, $texto, $dados_remetente, $usuarios[0]);

        $_SESSION['msg_notificacao'] = ["Notificação enviada com sucesso para ". $usuarios[0]['nome'], 'success', './listar_notificacoes.php'];

    }
    else
    {
        $_SESSION['msg_notificacao'] = ["O Email Inserido não existe.", 'error', './cadastrar_notificacao.php'];
    }
    
} 


require("../includes/main/main_cadastrar_notificacao.php");

if(isset($_SESSION['msg_notificacao'])){

    echo('
    <script>modalStatus("'.$_SESSION['msg_notificacao'][0].'","'.$_SESSION['msg_notificacao'][1].'",() => { window.location.href = "'.$_SESSION['msg_notificacao'][2].'" })</script>
    ');

    unset($_SESSION['msg_notificacao']);
}

require("../includes/footer/footer.php");
?>