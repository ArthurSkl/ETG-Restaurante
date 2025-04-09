<?php
// echo(json_encode('JDSJAJKSDAJKDAJKDSA'));
require __DIR__."/../../vendor/autoload.php";
use App\Entity\Perfil;

$obj_perfil = new Perfil();
$obj_perfil -> deleteById($_GET['id_perfil']);


$response = true;
echo(json_encode($response))
?>