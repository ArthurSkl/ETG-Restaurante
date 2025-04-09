<?php
namespace App\Entity;

use App\Db\Banco;
use App\Entity\NaoConformidade;
use DateTimeZone;
use PDOException;
use PDO ;

class ResponderChecklist
{

    public static function os_300_espartanos($id_realiza) {
        //xerxes solado apenas leonidas pica dura demais 
        $banco = new Banco("responder_check");

        return $banco->os_300_solam_absolutamento_todo_mundo($id_realiza)->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public static function setConfLogis($id_realiza, $campo = "n") {
        // adicionar valor na data de fechamento do checklist respondido  
        $obj_banco = new Banco('responder_check'); 

        $dados_update  =  [
            'conf_logis' => $campo
        ];

        $obj_banco -> update('id = "'.$id_realiza.'"',$dados_update);
        
   
    }

    public static function cadastrar($dadosResp = [], $id_sala = 1, $id_check)
    {          

        
        try{ 
            $responder_check = [
                'id_usuario'     => $_SESSION['id_user'],
                'id_sala'        => $id_sala,
                'id_checklist'   => $id_check,
                'observacao'     =>  $dadosResp["observacao"],//EU TAMBÉM NÃO SEI PQ É 30 PARCEIRO, SE VIRA AI
                'data_fechamento' => null
            ];
            $obj_banco = new Banco('responder_check');
            try{
                // CADASTRAR NO BANCO QUE RESPONDEU 
                $last_id = $obj_banco -> insertRecoverId($responder_check);
                // return $obj_banco -> insertRecoverId($responder_check);
            }catch(PDOException $e){
                echo(json_encode($e->getMessage()));
            }
            
             
            foreach ($dadosResp as $dataResp)
            {
                if (is_string($dataResp)) { 
                    continue;
                }
                // se for uma não conformidade  
                if($dataResp['status'] == false){ 
    
                    $imgs_nc = [];
                    
                    foreach($dataResp['imgs'] as $img_64){
                        
                        //LOGICA DA IMAGEM
                        list($type, $data) = explode(';', $img_64);
                        list(, $data) = explode(',', $data); 
                        $img2decodificada = base64_decode($data); 
                        $nome2 = uniqid().'_nc.png'; 
                        $caminho_salvar = '../../storage/n_conformidade/'.$nome2;
                        file_put_contents($caminho_salvar, $img2decodificada);
                        
                        array_push($imgs_nc,$nome2);
                   }
     
                   $nao_conformidade = [
                       'id_realiza' =>  $last_id,
                       'id_user' => $_SESSION['id_user'],
                       'id_pergu' => $dataResp['id_pergunta'],
                       'descricao_NC' => $dataResp['descricao'],
                       'img1' => (isset($imgs_nc[0])) ? $imgs_nc[0] : '',
                       'img2' => (isset($imgs_nc[1])) ? $imgs_nc[1] : '',
                       'img3' => (isset($imgs_nc[2])) ? $imgs_nc[2] : '',
                       
                    ];
                    // echo(json_encode($nao_conformidade));
    
                    NaoConformidade::cadastrar(dados : $nao_conformidade);
    
                    return true; 
                }
            } 
        }catch(PDOException $e){ 
            return $e->getMessage();

        }
         
    }


    public static function cadastrarPos($id_last_insert, $dadosResp = [])
    {   
        try{ 

            // adicionar valor na data de fechamento do checklist respondido  
            $obj_banco = new Banco('responder_check'); 

            $observacao = $dadosResp["observacao"];
            
            $data_hoje = new \DateTime("now");
            $zona = new \DateTimeZone("America/Manaus");

            $data_hoje->setTimezone($zona);
            $data_hoje = $data_hoje->format('Y-m-d H:i:s');
            
            
            $dados_update  =  [
                'data_fechamento' => $data_hoje,
                'observacao_pos' => $observacao
            ];

            $obj_banco -> update('id = "'.$id_last_insert.'"',$dados_update);
            
 
            
            foreach ($dadosResp as $dataResp)
            {
                if (is_string($dataResp)) {
                    continue;
                }
                // se for uma não conformidade  
                if($dataResp['status'] == false){ 
    
                    $imgs_nc = [];
                    
                    foreach($dataResp['imgs'] as $img_64){
                        
                        //LOGICA DA IMAGEM
                        list($type, $data) = explode(';', $img_64);
                        list(, $data) = explode(',', $data); 
                        $img2decodificada = base64_decode($data); 
                        $nome2 = uniqid().'_nc.png'; 
                        $caminho_salvar = '../../storage/n_conformidade/'.$nome2;
                        file_put_contents($caminho_salvar, $img2decodificada);
                        
                        array_push($imgs_nc,$nome2);
                   }
     
                   $nao_conformidade = [
                       'id_realiza' =>  $id_last_insert,
                       'id_user' => $_SESSION['id_user'],
                       'id_pergu' => $dataResp['id_pergunta'],
                       'descricao_NC' => $dataResp['descricao'],
                       'img1' => (isset($imgs_nc[0])) ? $imgs_nc[0] : '',
                       'img2' => (isset($imgs_nc[1])) ? $imgs_nc[1] : '',
                       'img3' => (isset($imgs_nc[2])) ? $imgs_nc[2] : '',
                       
                    ];
                    // echo(json_encode($nao_conformidade));
    
                    NaoConformidade::cadastrar(dados : $nao_conformidade);
                }

            } 

            return true;
        }catch(PDOException $e){ 
            return $e->getMessage();

        }
         
    }


    public static function cadastrar_pos($dados = [], $id_last_insert = 1)
    {   

        // adicionar valor na data de fechamento do checklist respondido  
        $obj_banco = new Banco('responder_check'); 

        $dados_update  =  [
            'data_fechamento' => date('Y-m-d H:i:s')
        ];

        $obj_banco -> update('id = "'.$id_last_insert.'"',$dados_update);
         

        foreach ($dados as $pergunta)
        {
            $img1_64  = $pergunta['img1'];
            $img2_64  = $pergunta['img2'];
            $img3_64  = $pergunta['img3'];
            $nome1 = null;
            $nome2 = null;
            $nome3 = null;

            
            //LOGICA DA IMAGEM
            if (isset($img1_64))
            {
                //primeira imagem
                list($type, $data) = explode(';', $img1_64);
                list(, $data) = explode(',', $data);
                $img1decodificada = base64_decode($data);
                $data = '';
                $nome1 = uniqid().'_nc.png';
                $caminho_salvar = '../../storage/n_conformidade/'.$nome1;
                file_put_contents($caminho_salvar, $img1decodificada);
            }
            if (isset($img2_64))
            {
                //segunda imagem
                list($type, $data) = explode(';', $img2_64);
                list(, $data) = explode(',', $data);
                $img2decodificada = base64_decode($data);
                $data = '';
                $nome2 = uniqid().'_nc.png';
                $caminho_salvar = '../../storage/n_conformidade/'.$nome2;
                file_put_contents($caminho_salvar, $img2decodificada);
            }
            if (isset($img3_64))
            {
                //terceira imagem
                list($type, $data) = explode(';', $img3_64);
                list(, $data) = explode(',', $data);
                $img3decodificada = base64_decode($data);
                $data = '';
                $nome3 = uniqid().'_nc.png';
                $caminho_salvar = '../../storage/n_conformidade/'.$nome3;
                file_put_contents($caminho_salvar, $img3decodificada);
            }

            unset($img1_64);
            unset($img2_64);
            unset($img3_64);

            
            $nao_conformidade = [
                'id_realiza' =>  $id_last_insert,
                'id_user' => $_SESSION['id_user'],
                'id_pergu' => $pergunta['id_pergu'],
                'descricao_NC' => $pergunta['descricao_NC'],
                'img1' => (isset($nome1)) ? $nome1 : '',
                'img2' => (isset($nome2)) ? $nome2 : '',
                'img3' => (isset($nome3)) ? $nome3 : '',
            ];
            NaoConformidade::cadastrar(dados : $nao_conformidade);
        }

        
    }

    public static function setConf_logis($id_responder_checklist) {
        $obj_banco = new Banco('responder_check');
        $dados = ["conf_logis" => "s"];
        $obj_banco -> update('id = "'.$id_responder_checklist.'"', $dados);
    }

    public static function getObservacao($id_realiza) {
        $obj_banco = new Banco('responder_check');
        $pre = $obj_banco->select("id = ".$id_realiza)->fetchAll(PDO::FETCH_ASSOC)[0]["observacao"];
        $pos = $obj_banco->select("id = ".$id_realiza)->fetchAll(PDO::FETCH_ASSOC)[0]["observacao_pos"];
        return [$pre, $pos];
    }

    public static function getUserRealiza($id_realiza) {
        $obj_banco = new Banco('responder_check');
        $id = $obj_banco->select("id = ".$id_realiza)->fetchAll(PDO::FETCH_ASSOC)[0]["id_usuario"];
        return $id;
    }
}