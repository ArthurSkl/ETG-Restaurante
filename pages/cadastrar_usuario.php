<?php
session_start();
$titulo_page = "Cadastrar Usuário";
require __DIR__."/../vendor/autoload.php";
$titulo_page = 'Cadastrar Usuario';
require("../includes/header/header.php");
include_once("./../includes/menu.php"); 
if(!$ifuser){
    header('Location: ./listar_recados.php');
}


use App\Entity\Perfil;
$objCadastroPerfil = new Perfil();

use App\Entity\Usuario;
$objUsuario = new Usuario();


$dados = $objCadastroPerfil -> getDados();
//die("teste");

$options = '';

foreach ($dados as $row_check ){
    //var_dump($row_check);exit;
    $options .= '<option  class="ops" value="'.$row_check['id'].'"> '.$row_check['nome'].' </option>'; 
}
// }

        

//  VALUES ('$nome', '$email', '$matricula', '$senha', '$id_perfil')";
// echo($objUsuario -> cadastrar($nome,$email,$matricula,$senha,$id_perfil)); 
include_once("./../includes/main/main_cadastrar_usuario.php");
// require("./includes/footer/footer.php");
?>