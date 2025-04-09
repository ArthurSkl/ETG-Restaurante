<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta;

echo(json_encode(Pergunta::getPerguntas()))

 
?>