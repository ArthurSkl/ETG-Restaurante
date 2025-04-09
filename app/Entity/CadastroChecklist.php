<?php
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco;
use App\Entity\Funcoes;

class CadastroChecklist
{
    public 
    $id_cadastro_checklist,
    $nome;
 
    public function __construct($id_cadastro_checklist = null,
                                $nome = null
                                )
    {
        $this -> id_cadastro_checklist = $id_cadastro_checklist;
        $this -> nome                  = $nome;
    }


    //CREATE
    public function cadastrar($dados) //: null
    {

        $obj_banco = new Banco('cadastro_checklist');

        $ultimoId = $obj_banco -> insertRecoverId(['nome' => $this -> nome]);
        $this -> cadastrarPergunta(dados: $dados, idCheck: $ultimoId);

    }

    //CREATE
    public static function cadastrarPergunta($dados, $idCheck, $update = false) {
        try{
            if($update == false){
                $dados = explode(',', $dados);
            }
             
            $obBanco = new Banco("relacao_pergunta_checklist");
            $pergJaCad = [];
            
            // receber as perguntas que ja estão cadastrados
            $dadosIdPergunta = $obBanco->select('id_check = "'.$idCheck.'"',campos:'id_pergunta')->fetchAll(PDO::FETCH_ASSOC); 
            
            foreach($dadosIdPergunta as $idPerguntaJaCad){ 
                array_push($pergJaCad,$idPerguntaJaCad['id_pergunta']); 
            }
            
            foreach($dados as $idPergunta){
                $idLista = [
                    'id_pergunta' => $idPergunta,
                    'id_check' => $idCheck
                ];
                 
                if(!(in_array($idPergunta,$pergJaCad))){ 
                    $obBanco -> insert($idLista); 
                    array_push($pergJaCad,$idPergunta);             
                }
            }       

        }catch(PDOException $e){

            return $e->getMessage();

        }
    }
    
    //READ
    public function getDados() : array
    {
        $obj_banco = new Banco('cadastro_checklist');
        
        $dados = $obj_banco -> select() -> fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }
    
}


