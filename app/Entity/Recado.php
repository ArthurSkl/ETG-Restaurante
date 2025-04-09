<?php

namespace App\Entity;
use \App\Db\Banco;

use PDO;

class Recado{

    private $id_autor,$descricao;
    public function __construct($id_autor,$descricao){

        $this->id_autor = $id_autor;
        $this->descricao = $descricao; 
        
    }
    public function update($id_recado){

        $obBanco = new Banco('recados');
        $dados = $obBanco->select('id = "'.$id_recado.'" ');
        if($dados->rowCount() > 0){

            $values = [
                'id_autor'=>$this->id_autor,
                'texto'=>$this->descricao,
            ];
            return $obBanco->update('id = "'.$id_recado.'" ',$values);

        }else{
            return false;
        }

    }    

    public function cadastrar(){

         
        $obBanco = new Banco('recados');
        $dados = [
            
            'id_autor'=>$this->id_autor,
            'texto'=>$this->descricao,

        ];
        $obBanco->insert($dados);

    }

    public static function deleteById($id_recado){

        $obBanco = new Banco('recados');
        $row_recado = $obBanco->select('id = '.$id_recado);
        if($row_recado->rowCount() > 0){

            $obBanco->delete($id_recado,'id');

            return true;

        }else{
            return false;
        }

    }

    public static function getDados(){

        $obBanco = new Banco("recados");
        
        $dados = $obBanco->select(null , ' id DESC ');
        if($dados->rowCount() > 0){

            return $dados;

        }else{

            return false;

        }
    }
    public static function getDadosById($id){

        $obBanco = new Banco("recados");
        
        $dados = $obBanco->select('id = "'.$id.'" ' , ' id DESC ');
        if($dados->rowCount() > 0){
            
            return $dados;

        }else{

            return false;

        }

    }
}