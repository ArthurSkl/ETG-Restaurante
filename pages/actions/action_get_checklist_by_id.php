<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Checklist;


// echo(json_encode($_GET['id_checklist']));
$id_checklist = filter_input(INPUT_GET, 'id_checklist', FILTER_SANITIZE_NUMBER_INT);

echo(json_encode(Checklist::getChecklistById($id_checklist)));


 

 
?>