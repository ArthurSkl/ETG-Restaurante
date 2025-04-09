<?php 

require __DIR__."/../../vendor/autoload.php";
use App\Entity\Pergunta; 


$pergunta = filter_input(INPUT_POST, 'nova_pergunta', FILTER_SANITIZE_SPECIAL_CHARS);
 

$obPergunta = new Pergunta($pergunta);

if(isset($_POST['antes_da_aula'],$_POST['depois_da_aula'])){
    // ambas 
    $obPergunta->cadastrar('2');

}elseif(isset($_POST['antes_da_aula'])){
    // apenas antes 
    $obPergunta->cadastrar('0');


}elseif(isset($_POST['depois_da_aula'])){
    // apenas depois 
    $obPergunta->cadastrar('1');
}
  
echo(json_encode($_POST));

?>