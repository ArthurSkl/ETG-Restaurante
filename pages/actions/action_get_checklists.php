<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Checklist;

echo(json_encode(Checklist::getChecklist()))

 
?>