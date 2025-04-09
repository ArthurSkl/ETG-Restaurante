<?php 
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco; 

class Notificacao
{

    public  $id_notificacao,
            $id_remetente,
            $id_destinatario,
            $descricao;
            
    public function __construct(
            $id_notificacao = null,
            $id_remetente = null,
            $id_destinatario = null ,
            $descricao = null
            )        

        {
            $this -> id_notificacao     = $id_notificacao;
            $this -> id_remetente       = $id_remetente;
            $this -> id_destinatario    = $id_destinatario;
            $this -> descricao          = $descricao;
        }


    //CREATE
    public static function cadastrar($id_remetente, $id_destinatario, $texto)
    {
        $obj_banco = new Banco ('notificacao');

        $obj_banco -> insert([
                                'id_remetente'      => $id_remetente,
                                'id_destinatario'   => $id_destinatario,
                                'texto'             => $texto
                            ]);
        return true;

    } 

    //READ
    public static function getNotificacao($id_user)
    {
    $obj_banco = new Banco ('notificacao');

    $dados = $obj_banco -> select(order:'marcado ASC',where:"id_destinatario = '".$id_user."'") -> fetchAll(PDO::FETCH_ASSOC); 

    return $dados;
    }
 
    public static function getDados()
    {
    $obj_banco = new Banco ('notificacao');

    $dados = $obj_banco -> select() -> fetchAll(PDO::FETCH_ASSOC);

    return $dados;
    }


    public function getDadosById($id)
    {
    $obj_banco = new Banco ('notificacao');

    $dados = $obj_banco -> select('id = '.$id) -> fetchAll(PDO::FETCH_ASSOC);

    return $dados;
    }


    //UPDATE
    public static function setVisualizar($id){

        $banco = new Banco ('notificacao');
        $dados = [
            'visualizado' => 1 ,
            'marcado'=> 1
        ];
        if($banco->update('id = "'.$id.'"',$dados)){

            return true;
        }else{
            return false;
        }
    }

    public static function setDesmarcarNotificacao($id){

        $banco = new Banco ('notificacao');
        $dados = [
            
            'marcado'=> 0
        ];
        if($banco->update('id = "'.$id.'"',$dados)){

            return true;
        }else{
            return false;
        }
    }

}
?>