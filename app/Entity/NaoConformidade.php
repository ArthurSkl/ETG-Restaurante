<?php
namespace App\Entity;
use PDO;
use PDOException;
use App\Db\Banco;
use App\Entity\ResponderChecklist;


class NaoConformidade
{
    public static function cadastrar($dados = [])
    { 
        $obj_banco = new Banco('reg_nc');
        $obj_banco -> insert($dados);
    }

    public static function getNaoConfByIdPerguntaAndIdRealiza($idPergunta, $idRealiza) {
        
        $objBanco = new Banco('reg_nc');
        $dados = $objBanco -> select("id_pergu = ".$idPergunta . " AND id_realiza = " .$idRealiza);
        
        if ($dados -> rowCount()) {

            $dados = $dados-> fetchAll(PDO::FETCH_ASSOC)[0];
            // var_dump($dados);exit;

            return array(true, $dados);
        } else {
            return false;
        } 
    }

    public static function saveAndGetLastId(array $dados) {
        $obj_banco = new Banco('reg_nc');
        return $obj_banco -> insertRecoverId($dados);
    }



    public static function getNCLogistica($id_prof = '', $id_checklist = '', $datas = []){

        $filterIdUser = '';
        $filterIdChecklist = '';
        if(strlen($id_prof) > 0 && strlen($id_checklist) > 0){

            $filterIdUser = ' id_user = "'.$id_prof.'" ' ;
            $filterIdChecklist = ' AND id_checklist = "'.$id_checklist.'" ' ;
        }
        if(strlen($id_prof) > 0  && strlen($id_checklist) == 0){
            $filterIdUser = ' id_user = "'.$id_prof.'" ' ;
            $filterIdChecklist = '';

        }
        if(strlen($id_prof) == 0  && strlen($id_checklist) > 0){

            $filterIdUser = '' ;
            $filterIdChecklist = ' id_checklist = "'.$id_checklist.'" ' ;

        }
        
        $whereFilter = $filterIdUser . $filterIdChecklist;
        


        $obBanco = new Banco('quantidade_nc_user');
        try{
            
            if(strlen($whereFilter) > 0){
                if(count($datas) > 0 ){

                    $nc_user = $obBanco->select(' '.$whereFilter.' AND data_fechamento BETWEEN "'.$datas[0].'" AND "'.$datas[1].'" ') ;
                    
                }else{  
                    $nc_user = $obBanco->select(' '.$whereFilter.' ') ;
                }

            }else{
                if(count($datas) > 0 ){

                    $nc_user = $obBanco->select(' data_fechamento BETWEEN "'.$datas[0].'" AND "'.$datas[1].'" ') ; 
                }
                else{

                    $nc_user = $obBanco->select() ; 
                }
            }


            
            if($nc_user->rowCount() > 0){

                $nc_user = $nc_user -> fetchAll(PDO::FETCH_ASSOC) ;
                
                $countNC = 0;
                $countC = 0;
                // FALTA CONTAR CORREÇÃO
                $countCorrecao = 0;
                
                foreach($nc_user as $row){

                    $row['qnt_nc'] > 0  ? $countNC += 1 : $countC += 1; 
                    $row['qnt_c'] > 0 ? $countCorrecao += 1 : $countCorrecao+= 0;
                  

                }
                return [$nc_user, ['countNC' => $countNC, 'countC' => $countC, 'countCorrecao' => $countCorrecao]];
            }else{
                return [[], ['countNC' => 0, 'countC' => 0, 'countCorrecao' => 0]];
            } 
            
        } 
        catch(PDOException $e){
            var_dump($e->getMessage()); 
        }

        return $nc_user;
       

    }

}