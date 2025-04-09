<?php
namespace App\Entity;
use PDOException;
use App\Db\Banco;
use Exception;

class AcaoCorretiva 
{
    
    private $id;
    private $id_nao_conformidade;
    private $id_usuario;
    private $descricao;
    private $img_1;
    private $img_2;
    private $img_3;
    private Banco $conn;


    public function __construct() {
        $this->conn = new Banco("reg_correcao");
    }
    
    public function save() {
        try {
            $dados = [
                "reg_NC_id" => $this->id_nao_conformidade,
                "id_usuario" => $this->id_usuario,
                "descricao" => $this->descricao,
                "img1" => $this->img_1,
                "img2" => $this->img_2,
                "img3" => $this->img_3
            ];
            $this->conn->insert($dados);
            return true;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        } 
        catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function setIdNaoConformidade(String $id_nao_conformidade) {
        $this->id_nao_conformidade = $id_nao_conformidade;
    }


    public function setIdUsuario( $id_usuario) {
            $this->id_usuario = $id_usuario;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setImg_1($img) {
        $this->img_1 = $img;
    }

    public function setImg_2($img) {
        $this->img_2 = $img;
    }

    public function setImg_3($img) {
        $this->img_3 = $img;
    }



}