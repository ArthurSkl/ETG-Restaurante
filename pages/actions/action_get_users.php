<?php 
require __DIR__."/../../vendor/autoload.php";
use App\Entity\Usuario;

$dados = Usuario::getDados();
echo(json_encode($dados));

?>