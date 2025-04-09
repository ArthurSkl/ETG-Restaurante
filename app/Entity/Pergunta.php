<?php
namespace App\Entity; 
use \App\Db\Banco;
use Exception;
use PDO;

class Pergunta
{
    
    private $descricao;
    
    public function __construct($descricao = null)
    {
        $this -> descricao = $descricao;
    }

    //CREATE
    public function cadastrar($tipo)
    {   
        try{


            $obj_banco = new Banco('cadastro_pergunta');
            $dados = [
                        'descricao' => $this -> descricao,
                        'tipo' => $tipo
                     ];
     
            // atualmente retonando true or false  
            if($obj_banco -> insert($dados))
            {
                return true;
            }
            else
            {
                return false;
            }

        }catch(Exception $e){

            echo(json_encode($e->getMessage()));

        }
        
    }

    //READ
    public static function getDados($id_sala)
{        $obj_banco = new Banco('perguntas_da_sala');

        $dados = $obj_banco -> select(where:'id_sala = '.$id_sala.'');

        if($dados -> rowCount() > 0){ 
            return $dados -> fetchall(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        }


    }

    //READ
    //de GetPerguntasById para GetDadosById
    public static function getDadosById($id)
    {
        $obj_banco = new Banco('cadastro_pergunta');

        $dados = $obj_banco->select('id_cadastro_pergunta = '.$id);

        if($dados -> rowCount() > 0)
        {
            return $dados;
        }
        else
        {
            return false;
        } 
    }

    public static function getPerguntas()
    {
        $obj_banco = new Banco('cadastro_pergunta');
        $dados = $obj_banco->select(order:"id DESC");
        if($dados)
        {
            return $dados->fetchAll(PDO::FETCH_ASSOC);
        }
        else
        {
            return false;
        } 
    }

    public static function getPerguntasByChecklist($id_checklist)
    {
        $ids_pergunta = [];
        $obj_banco = new Banco('relacao_pergunta_checklist');
        $dados = $obj_banco->select(where:"id_check = '".$id_checklist."'" , order:"id DESC");
        
        if($dados->rowCount() > 0){ 
            
            $data = $dados->fetchAll(PDO::FETCH_ASSOC);
            
            foreach($data as $relacao){
                 
                array_push($ids_pergunta,$relacao['id_pergunta']);
            }
            
            // print_r($ids_pergunta);
            $obPergunta = new Banco('cadastro_pergunta');

            $sql_in = "'".implode("', '",$ids_pergunta)."'";
             
            return $obPergunta->select(where:"id IN (".$sql_in.")" )->fetchAll(PDO::FETCH_ASSOC) ;

        }
        else
        {
            return false;
        } 
        // return $ids_pergunta;
    }
    // public static function updateChecklistRelacao($id_checklist, $ids_pergunta){

    //     $obBanco = new Banco(`relacao_pergunta_checklist`); 
    //     $obBanco->delete($id_checklist,'id_check'); 

    // }

    public static function filter($nome)
    {
        $obj_banco = new Banco('cadastro_pergunta');
        $dados = $obj_banco -> select('descricao LIKE "%' . $nome . '%"');
        return $dados -> fetchAll(PDO::FETCH_ASSOC);
        # SELECT * FROM pergunta WHERE descricao LIKE '%os equipamentos%';
    }

    public static function excluirPergunta($id){

        try{
            
            $obBanco = new Banco('relacao_pergunta_checklist');
 
 
            $perguntas = $obBanco->select('id_pergunta = "'.$id.'"'); 
            if($perguntas->rowCount() == 0){

                $obj_banco = new Banco('cadastro_pergunta');
                $obj_banco->delete($id,'id')->fetchAll(PDO::FETCH_ASSOC);
                return true;

            }else{
                return false;
            }

            

        }catch(Exception $e){

            echo($e->getMessage());
            return ($e->getMessage());
        }


    }
    public static function updatePergunta($id,$tipo,$descricao){


        try{

            $dados_update = [
                'descricao' => $descricao,
                'tipo'=> $tipo
                
            ];
            
            $obj_banco = new Banco('cadastro_pergunta');

            $obj_banco->update('id = "'.$id.'"',$dados_update );

            return true;

        }catch(Exception $e){

            echo($e->getMessage());
            return ($e->getMessage());
        }

    }
}