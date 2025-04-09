<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta;

echo(json_encode(Pergunta::getPerguntasByChecklist($_GET['id_checklist'])))




?>