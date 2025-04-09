<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Checklist;
$response = [];
$dados = '';
 

if(isset($_GET['id_user'])){
    $dados = Checklist::getRespostasChecklist($_GET['id_user']); 
}else{
    $dados = Checklist::getRespostasChecklist(); 
}

echo(json_encode($dados));
