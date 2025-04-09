<?php


require __DIR__."/../../vendor/autoload.php";


use App\Entity\Recado;
 
 
$dados = json_decode(file_get_contents('php://input'), true);

$result = Recado::getDadosById($dados['id'])->fetchAll(PDO::FETCH_ASSOC)[0];
 
$listaJson = json_encode($result);
echo($listaJson);
 

