<?php
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco;
use App\Entity\ResponderChecklist;
use App\Entity\Checklist;


class ValidarChecklist
{
    public function getIdSala($idResponderCheck)  {
        $data = Checklist::getDataById(id: $idResponderCheck);
        return $data[0];
    }

    public function getPerguntas($idSala) : array {

        
        return Pergunta::getDados(id_sala: $idSala);
    }

    public function hasNaoConf($idPergunta, $idRealiza) {
        return NaoConformidade::getNaoConfByIdPerguntaAndIdRealiza(idPergunta: $idPergunta, idRealiza: $idRealiza); 
    }
}
