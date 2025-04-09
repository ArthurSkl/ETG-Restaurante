<?php


require __DIR__."/../../vendor/autoload.php";
use App\Entity\Usuario;
$objUsuario = new Usuario();

$nome = $_POST['nome'];
$email = $_POST['email'];
$num_matricula = $_POST['num_matricula'];
$senha = $_POST['senha'];
$id_perfil = $_POST['id_perfil'];

// echo json_encode('rafgdgbf');wc
$result = $objUsuario->cadastrar($nome, $email, $num_matricula, $senha, $id_perfil);
if($result[0]){
    $arr = ["status" => "OK"];
}else{
    $arr = ["status" => $result[1]];
}

echo json_encode($arr);


?>