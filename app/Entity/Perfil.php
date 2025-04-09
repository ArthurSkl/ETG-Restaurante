<?php
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco;


class Perfil
{
    private 
    $nome,
    $gerenciar_perguntas,
    $gerenciar_salas,
    $realizar_acao_corretiva,
    $realizar_checklist,
    $gerenciar_checklist,
    $gerenciar_recados,
    $gerenciar_notificacoes,
    $gerenciar_perfis,
    $gerenciar_usuarios;
    // $administrador;

    public function __construct($nome = null,
                                $gerenciar_perguntas = null,
                                $gerenciar_salas = null,
                                $realizar_acao_corretiva = null,
                                $realizar_checklist = null,
                                $gerenciar_checklist = null,
                                $gerenciar_recados = null,
                                $gerenciar_notificacoes = null,
                                $gerenciar_perfis = null,
                                $gerenciar_usuarios = null,
                                // $administrador = null
                                )
    {
        $this -> nome                = $nome;
        $this -> gerenciar_perguntas             = $gerenciar_perguntas;
        $this -> gerenciar_salas                = $gerenciar_salas;
        $this -> realizar_acao_corretiva               = $realizar_acao_corretiva;
        $this -> realizar_checklist     = $realizar_checklist;
        $this -> gerenciar_checklist     = $gerenciar_checklist;
        $this -> gerenciar_recados      = $gerenciar_recados;
        $this -> gerenciar_notificacoes      = $gerenciar_notificacoes;
        $this -> gerenciar_perfis      = $gerenciar_perfis;
        $this -> gerenciar_usuarios      = $gerenciar_usuarios;
        // $this -> administrador      = $administrador;
        

    }

    //CREATE
    public function cadastrar($dados = []) : bool
    {
        $obj_banco = new Banco('cadastro_perfil');
        
        // $verificacao = $obj_banco -> select('nome = "'.$this -> nome.'"') -> fetchAll(PDO::FETCH_ASSOC);

        // var_dump($dados);exit;
        $obj_banco -> insert($dados);           
        return true;

    }

    //READ
    public function getDados()
    {
        $obj_banco = new Banco('cadastro_perfil');
        
        $dados = $obj_banco -> select() -> fetchAll(PDO::FETCH_ASSOC);
        
        return $dados;
    }

    //READ
    public function getDadosById($id)
    {
        $obj_banco = new Banco('cadastro_perfil');        
        
        $dados = $obj_banco -> select('id = '.$id) -> fetchAll(PDO::FETCH_ASSOC);
        //die('teste');
        //var_dump($dados);exit;
        return $dados;
    }


    //UPDATE
    public function setDados($id, $dados)
    {
        //var_dump($dados);exit;
        $obj_banco = new Banco('cadastro_perfil');

        $obj_banco -> update('id = '. $id, $dados);
        
        return true;
    }

    //DELETE
    public function deleteById($id)
    {

        // if ($this->checkForeignKey($id)) {
        //  var_dump('teste');exit;
        //     return false;
        // }
        
        $obj_banco = new Banco('cadastro_perfil');

        $row_perfil = $obj_banco -> select('id = '.$id);

        if($row_perfil -> rowCount() > 0)
        {
            $obj_banco -> delete($id,'id');

            return true;
        }
        else
        {
            return false;
        }
        
    }

    public static function getDadosJoinUser ($id)
    {
        $obj_banco = new Banco('cadastro_usuario');
        
        $dados = $obj_banco -> select() -> fetchAll(PDO::FETCH_ASSOC);
        
        return $dados;
    }

    //Verifica se o perfil possui alguma FOREIGN KEY
    public static function checkForeignKey($id)
    {
        $obj_banco = new Banco('cadastro_usuario');

        $row_perfil = $obj_banco->select('id_perfil = '.$id);
        
        if ($row_perfil->rowCount() > 0)
        {
            return true;
        } else
        {
            return false;
        }
    }
}


?>