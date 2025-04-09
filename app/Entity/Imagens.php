<?php
namespace App\Entity;

class Imagens
{
    // return STRING
    static function storeImg($param_nome_arquivo) 
    {
        $nome_arquivo = $param_nome_arquivo;
        $nova_string = uniqid();
        //se o arquivo que o usuario inserir for valido (jpg, jpeg, png, gif)
        if (preg_match('/\.(png|jpe?g|gif)$/i', $nome_arquivo, $matches))
        { 
        // if (preg_match('/\.(png|jpe?g|gif)$/i', $nome_arquivo, $matches))
        // { 
            // $matches =  array(2) { [0]=> string(4) ".jpg" [1]=> string(3) "jpg" }
            // ela armazena a extensao da imagem 
            $extensao_encontrada = $matches[0]; // jpg, jpeg, png
            $aleatorizador = $nova_string.$extensao_encontrada;
            $novo_nome_arquivo = str_replace($extensao_encontrada,
                                            $aleatorizador,
                                            $nome_arquivo); //nome_da_imagem 
            // $extensao_encontrada = $matches[0]; // jpg, jpeg, png
            // var_dump($nome_arquivo);exit;
            $nova_string = uniqid();
            $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
            $aleatorizador = $nova_string . '.' . $extensao;
            $novo_nome_arquivo = str_replace($extensao, $aleatorizador, $nome_arquivo);

            
            $from = $_FILES['img_sala']['tmp_name'];
            $to = '../../storage/salas/';
            //echo $from . '<br>' . $to . '<br>' . $novo_nome_arquivo;exit;
            // echo $from . <br>' . $to . '<br>' . $novo_nome_arquivo;exit;
            move_uploaded_file($from, $to.$novo_nome_arquivo); //movendo o arquivo para pasta

            return $novo_nome_arquivo;
        }
        // }
    }


    static function storeImgAction($param_nome_arquivo) 
    {
        $nome_arquivo = $param_nome_arquivo;
        //se o arquivo que o usuario inserir for valido (jpg, jpeg, png, gif)
        // if (preg_match('/\.(png|jpe?g|gif)$/i', $nome_arquivo, $matches))
        // { 
            // $matches =  array(2) { [0]=> string(4) ".jpg" [1]=> string(3) "jpg" }
            // ela armazena a extensao da imagem 
            // $extensao_encontrada = $matches[0]; // jpg, jpeg, png
            // var_dump($nome_arquivo);exit;
            $nova_string = uniqid();
            $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
            $aleatorizador = $nova_string . '.' . $extensao;
            $novo_nome_arquivo = str_replace($extensao, $aleatorizador, $nome_arquivo);

            
            $from = $_FILES['img_sala']['tmp_name'];
            $to = '../../storage/salas/';
            // echo $from . <br>' . $to . '<br>' . $novo_nome_arquivo;exit;
            move_uploaded_file($from, $to.$novo_nome_arquivo); //movendo o arquivo para pasta

            return $novo_nome_arquivo;
        // }
    }
}


