<?php
require __DIR__."/../../vendor/autoload.php";
use App\Entity\Usuario;

$response = ["status" => false, "message" => "O usuário não pode ser deletado pois fez algo relacionado ao Fluxo do Checklist"];

$id_user = $_GET["id_user"];

$pode_deletar = Usuario::canDelete($id_user);
if ($pode_deletar) {
    $deleted = Usuario::deleteById($id_user);

    $response["status"] = $deleted["response"];
    $response["message"] = $deleted["message"];
}

echo json_encode($response);