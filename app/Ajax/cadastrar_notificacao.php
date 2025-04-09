<?php
namespace App\Entity;
require "../../vendor/autoload.php";
use App\Entity\Usuario;

// Adicione esta verificação no início do seu código PHP

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Credentials: true");



$jsonArray = Usuario::getDados();

echo json_encode($jsonArray);
