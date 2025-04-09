<?php
namespace App\Entity;

require __DIR__."/../../PHPMailer/src/Exception.php";
require __DIR__."/../../PHPMailer/src/PHPMailer.php";
require __DIR__."/../../PHPMailer/src/SMTP.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public $email;

    static function sendEmail($emailparam)
    {
    
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = "smtp.gmail.com";
        $email->SMTPAuth = "true";
        $email->SMTPSecure = "tls";
        $email->Port ="587";
        $email->Username = "fabrica.hub.academy@gmail.com";
        $email->Password = "ciaiabsuzjimabht";

        $email->Subject = "Codigo Redefinicao Senac";
        $email->setFrom("fabrica.hub.academy@gmail.com");
        $email->addStringAttachment(file_get_contents("https://miro.medium.com/v2/resize:fit:1400/1*m0H6-tUbW6grMlezlb52yw.png"), "qr.jpg");
        
        $codigo = rand(100000, 999999);
        session_start();
        $_SESSION['cod_redef_senha'] = $codigo;
        $codigo = json_encode($codigo);

        $email->Body = 'O codigo e: '.$codigo;
        $email->addAddress($emailparam);
        
        
        if($email->Send())
        {
            $email->smtpClose();
            return true;
        }
        else
        {
            $email->smtpClose();
            return false;
        }
    } 

    public function sendEmailNotificacao($emailparam, $content, $remetente, $destinatario )
    {
        
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = "smtp.gmail.com";
        $email->SMTPAuth = "true";
        $email->SMTPSecure = "tls";
        $email->Port ="587";
        $email->Username = "fabrica.hub.academy@gmail.com";
        $email->Password = "ciaiabsuzjimabht";
        $email->CharSet = 'UTF-8';
        $email->Subject = "=?UTF-8?B?".base64_encode("Notificação enviada por ".$remetente['nome'])."?=";
        $email->setFrom("fabrica.hub.academy@gmail.com","=?UTF-8?B?".base64_encode("Fábrica de Software")."?="); 

        $email->Body = $this->createEmbedMail('Notificação Recebida', $destinatario['nome'], $content, 'Ver Notificação', '#007bff');
        $email->addAddress($emailparam); 
        $email->isHTML(true);

        
        if($email->Send())
        {
            $email->smtpClose();
            return true;
        }
        else
        {
            $email->smtpClose();
            return false;
        }
    } 


    public function sendEmailNConformidade($emailparam, $content, $remetente, $destinatario, $imgs, $textNConformidade )
    {
        
        $email = new PHPMailer();
        $email->isSMTP();
        $email->Host = "smtp.gmail.com";
        $email->SMTPAuth = "true";
        $email->SMTPSecure = "tls";
        $email->Port ="587";
        $email->Username = "fabrica.hub.academy@gmail.com";
        
        $email->Password = "ciaiabsuzjimabht";

        $email->CharSet = 'UTF-8'; // Definir a codificação para UTF-8

        $email->Subject = "=?UTF-8?B?".base64_encode("Não Conformidade Registrada")."?=";
        $email->setFrom("fabrica.hub.academy@gmail.com","=?UTF-8?B?".base64_encode("Fábrica de Software")."?="); 

        $email->Body = $this->createEmbedMail('Não Conformidade', $destinatario['nome'], $content, 'Ver Não Conformidade', '#ff5050',$imgs, textNConformidade: $textNConformidade);
        $email->addAddress($emailparam); 
        $email->addAddress('logisticatur@ms.senac.br '); 
        $email->addAddress('simone.demenciano@ms.senac.br');
        $email->isHTML(true);

        foreach($imgs as $img){
          
            $resource = base64_decode(str_replace(" ", "+", substr($img, strpos($img, ","))));
            $email->addStringAttachment($resource, "Filename.png");

        }



        if($email->Send())
        {
            $email->smtpClose();
            return true;
        }
        else
        {
            $email->smtpClose();
            return false;
        }
    } 

    private function createEmbedMail($titulo, $nome_destinatario, $descricao,$nome_btn, $cor_btn, $imgs = null, $textNConformidade = null){
        
        $textNC = $textNConformidade != null ? '<h3 class="textNC">"'.$textNConformidade.'"</h3>' : '';

         
        $embed = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Email</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f2f2f2;
                    padding: 20px;
                }
                .container {
                    max-width: 600px;
                    margin: auto;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                h1 {
                    color: #333;
                }
                p {
                    color: #666;
                }
                .btn {
                    display: inline-block;
                    background-color: '.$cor_btn.';
                    color: #fff;
                    text-decoration: none;
                    padding: 10px 20px;
                    border-radius: 5px;
                    margin-top: 20px;
                }
                .footer {
                    margin-top: 30px;
                    text-align: center;
                    color: #999;
                }
                .textNC{
                    font-weight: 900;
                    font-style: italic;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h1>'.$titulo.'</h1>
                <p>Olá, '.$nome_destinatario.'</p>
                <p>'.$descricao.'</p>
                '.$textNC.'
                <a style="color:white;" href="http://192.168.22.9/etg_escola" class="btn">'.$nome_btn.'</a>
                
            </div>
            <div class="footer">
                <p>Feito por Fábrica de Software 276 ;)</p>
            </div>
        </body>
        </html>
        ';

        return $embed;

    }





}