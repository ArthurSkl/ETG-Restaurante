<?php
session_start();
//CADASTRAR NAO CONFORMIDADE

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Mailer;
use App\Entity\Usuario;
use App\Entity\Sala;
use App\Entity\NaoConformidade;
use App\Entity\ResponderChecklist;




function convert_base64_png($img) {
    //LOGICA DA IMAGEM
    list($type, $data) = explode(';', $img);
    list(, $data) = explode(',', $data); 
    $img_decodificada = base64_decode($data); 
    $nome = uniqid().'_nao_conformidade.png'; 
    $caminho_salvar = '../../storage/n_conformidade/'.$nome;
    file_put_contents($caminho_salvar, $img_decodificada);
    return $nome;
}


$obMailer = new Mailer();
$dadosDocente = Usuario::getDadosById($_GET['id_docente'])[0];
$dadosLogistica = Usuario::getDadosById($_SESSION['id_user'])[0];
$dadosSala = Sala::getDadosById($_GET['id_sala'])[0];

Sala::setStatusSala($_GET['id_sala'], 'L');
 

$id_realiza = $_GET["id_realizacao"];
ResponderChecklist::setConfLogis($id_realiza, "p");
$email = $_GET["email"];
$dadosNC = json_decode(file_get_contents('php://input'), true); 
$response = ["status" => false];


if (count($dadosNC) > 0) {
    
    try {
        //code...
        $dados_nao_conformidade = [];
        foreach ($dadosNC as $nc) {
            $img1 = isset($nc["imagens"][0]) ? convert_base64_png($nc["imagens"][0]) : "";
            $img2 = isset($nc["imagens"][1]) ? convert_base64_png($nc["imagens"][1]) : "";
            $img3 = isset($nc["imagens"][2]) ? convert_base64_png($nc["imagens"][2]) : "";
    
    
            $dados_nao_conformidade = ["id_realiza" => $id_realiza,
            "id_user" => $_SESSION['id_user'],
            "id_pergu" => $nc["id_pergunta"],
            "descricao_NC" => $nc["descricao_n_conformidade"],
            "img1" => $img1,
            "img2" => $img2,
            "img3" => $img3                           
        ];
        
    
        NaoConformidade::cadastrar($dados_nao_conformidade);
        
        ResponderChecklist::setConfLogis($id_realiza, "p");
    
        }
        $response = ["status" => true];
    } catch (\Throwable $th) {
        throw $th;
        $response = ["status" => false, "erro" => $th->getMessage()];
    }

}


if ($email == "true") {

    $hratual = date('H:i:s');
    foreach($dadosNC as $nConformidade){
 
        $contentEmail = "Nova não conformidade registrada na sala ".$dadosSala['nome'] ." às ". $hratual . " por " . $dadosLogistica['nome'] . " (".$dadosLogistica['email'].").";
        $obMailer -> sendEmailNConformidade($dadosDocente["email"] ,$contentEmail, $dadosLogistica, $dadosDocente, $nConformidade['imagens'], $nConformidade['descricao_n_conformidade']);
 
    }

}

Sala::setStatusSala($_GET['id_sala'], 'L');

echo(json_encode($dadosNC));