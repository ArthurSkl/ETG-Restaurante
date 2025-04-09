<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Entity\Checklist;


echo(json_encode(Checklist::checklistResp($_GET['id_checklist'])));



?>