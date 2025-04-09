<?php

// Supondo que os dados sejam enviados via método POST
$result = false;
if (isset($_POST['nome_checklist']) && isset($_POST['perguntas'])) {
    $nome_checklist = $_POST['nome_checklist'];
    $perguntas = $_POST['perguntas'];

    // Verifica se ambos os campos não estão vazios
    if (!empty($nome_checklist) && !empty($perguntas)) {
        // Ambos os campos estão preenchidos
        $result=true;
    } else {
        // Pelo menos um dos campos está vazio
        $result=false;
    }
} else {
    // Campos não estão definidos
    $result=false;
}
echo(json_encode($result));

?>
