<?php
namespace SendEmail;

require 'Libraries/phpmailer/PHPMailerAutoload.php';

/**
 * Importante: Logue o no Gmail e entre no Link
 *
 * https://myaccount.google.com/u/1/security
 *
 * Vá em "Acesso a app menos seguro" e Ative a opção
 */

class SendGmail
{
    public function send($title, $msg)
    {
        $mail = new \PHPMailer();
        try {
            $mail->SetLanguage('br'); // Traduzir para pt-BR

            $mail->isSMTP(); // Seta para usar SMTP
            $mail->SMTPAuth = true; // Libera a autenticação
            $mail->SMTPDebug = 0; // Debug

            $mail->SMTPSecure = 'tls'; // Acesso com TLS exigido pelo Gmail
            $mail->Host = 'smtp.gmail.com'; // SMTP Server
            $mail->Username = 'free.games.suport@gmail.com'; // Usuário SMTP
            $mail->Password = 'Uu123456'; // Senha do usuário
            $mail->Port = 587; // Porta do SMTP

            $mail->setFrom('free.games.suport@gmail.com', 'Free Games'); // Email e nome de quem enviara o e-mail
            //$mail->addReplyTo('mauro.ribeiro2000@gmail.com', 'Mauro Ribeiro'); // E-mail e nome de quem responderá o e-mail
            //$mail->addAddress('mauro.ribeiro2000@gmail.com', 'Mauro Ribeiro'); // Email e nome do destino
            $mail->AddBCC('mauro.ribeiro2000@gmail.com', 'Mauro Ribeiro');
            $mail->AddBCC('thiago.jose.bechtold@gmail.com', 'Thiago Bechtold');

            $mail->isHTML(true); // Seta o envio em HTML
            $mail->CharSet = 'UTF-8'; // Charset da mensagem
            $mail->Subject = $title; // Título da mensagem
            $mail->Body = $msg; // Mensagem

            $mail->send(); // Envia e-mail
        } catch(Exception $e) {

        }
    }
}
