<?php
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco;


class Sala
{
    private $nome,
            $codigo,
            $cor_itens,
            $img_sala,
            $descricao,
            $status,
            $horarios,
            $id_check,
            $ativo_desativo
            ;
    public function __construct(
                                $nome = null,
                                $codigo = null,
                                $cor_itens = null,
                                $img_sala = null,
                                $descricao = null,
                                $status = null,
                                $horarios = null,
                                $id_check = null,
                                $ativo_desativo = null
                                )
    {
        $this -> nome                       = $nome;
        $this -> codigo                 = $codigo;
        $this -> cor_itens              = $cor_itens;
        $this -> img_sala                  = $img_sala;
        $this -> descricao              = $descricao;
        $this -> status                 = $status;
        $this -> horarios                 = $horarios;
        $this -> id_check                    = $id_check;
        $this -> ativo_desativo            = $ativo_desativo;

    }


    //CREATE
    public function cadastrar() : bool
    {
        $objBanco = new Banco('cadastro_sala');
        $objBanco -> insert([
                            'nome'                  => ucfirst(strtolower($this -> nome)),
                            'codigo'                  => ucfirst(strtolower($this -> codigo)),
                            'cor_itens'              => ucfirst(strtolower($this -> cor_itens)),
                            'img_sala'                 => $this -> img_sala,
                            'descricao'                    => ucfirst(strtolower($this -> descricao)),
                            'status'                     => $this -> status,
                            'horarios'                    => $this -> horarios,
                            'id_check'                   => $this -> id_check
                            ]);
        return true;
    }

    public static function setStatusSala($id_sala, $status){

        try{
            $objSala = new Banco('cadastro_sala');
            $dados = [
                'status'=> $status
            ];
    
            $objSala -> update('id = "'.$id_sala.'"  ', $dados);

            return true;
        }catch(PDOException $e){ 
            return $e->getMessage(); 
        } 

    }

    

    


    //READ
    public static function getDados($col = '*', $where = null)
    {
        $obj_banco = new Banco('quem_abriu');

        $salas = $obj_banco -> select(order:"status ASC, id asc",campos: $col,where: $where) -> fetchAll(PDO::FETCH_ASSOC);

        return $salas;
    }

    // public static function getSalaAberta()
    // {
    //     $obj_banco = new Banco('quem_abriu');

    //     $salas = $obj_banco -> select() -> fetch(PDO::FETCH_ASSOC);

    //     return $salas;
    // }


    //READ
    public static function getDadosById($id_sala)
    {
        $objBanco = new Banco('cadastro_sala');
        $dados = $objBanco -> select("id = ".$id_sala) -> fetchAll(PDO::FETCH_ASSOC);
        return $dados;
    }


    //UPDATE
    public function setDados($id = null, $dados = []) : bool
    {
        // echo(json_encode($dados));exit;
        $obj_banco = new Banco('cadastro_sala');

        $obj_banco -> update('id = "'.$id.'"', [
                                                        'nome'              =>  $dados['nome'],
                                                        'codigo'             =>  $dados['codigo'],
                                                        'cor_itens'         =>  $dados['cor_itens'],
                                                        'img_sala'         =>  $dados['img_sala'],
                                                        'descricao'            =>  $dados['descricao'],
                                                        'status'            => $dados['status'],
                                                        'horarios'    =>  $dados['horarios'],
                                                        'id_check'     =>  $dados['id_check']
                                                            ]);
        return true;
    }
}
