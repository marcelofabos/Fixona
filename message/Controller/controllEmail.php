<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



class mainController{
    private $subje;
    private $ema ;
    private $message;

    public function __construct()
    {
        
    }
   /* public function __construct($sub,$em,$me)
    {
        $this->subje = $sub;
        $this->ema = $em;
        $this->message = $me;
    }*/
    public static function funcionName($subject,$email, $message){
        /*date_default_timezone_set('America/Lima');
        $mail = new PHPMailer;
        $mail->CharSet = 'utf-8';
        $mail->isMail();
        $mail->UseSendmailOptions = 0;
        $mail->setFrom("noreply@tudominio.com", "Antony");
        $mail->Subject = $subject;
        $mail->addAddress($email);
        $mail->msgHTML($message);
        $send = $mail->send();
        
        if(!$send){
            return $mail->ErrorInfo;
        }else{
            return "ok";
        }*/
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = 0;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com'; //tipo de servicio o cuenta de hosting                    //Set the SMTP server to send through
            $mail->CharSet = 'utf-8';
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'digi.mediamkt@gmail.com';                     //SMTP username
            $mail->Password   = 'bjgcnkfhrulmvsjt';                               //SMTP password
            $mail->SMTPSecure = 'tsl';            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom('digi.mediamkt@gmail.com', 'Digimedia');
            $mail->addAddress($email);     //Add a recipient       
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $message;
            $mail->send();
            echo 'correcto';
        } catch (Exception $e) {
            echo "Erro al enviar: {$mail->ErrorInfo}";
        } 
        /*if (preg_match('/@gmail.com/', $email)) {
            $value = 'gmail';
        } else if(preg_match('/@outlook.com/', $email)){
            $value = 'outlook';
        }else if(preg_match('/@outlook.com/', $email)){
            $value = 'outlook';
        }
        if($value==='gmail'){
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();
                $mail->CharSet = 'utf-8';                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com'; //tipo de servicio o cuenta de hosting                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = '3456antony@gmail.com';                     //SMTP username
                $mail->Password   = 'fbuvnxcezvycywny';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('3456antony@gmail.com', 'Antony');
                $mail->addAddress($email);     //Add a recipient       
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $mail->send();
                echo 'correcto';
            } catch (Exception $e) {
                echo "Erro al enviar: {$mail->ErrorInfo}";
            } 
        }else if($value === 'outlook'){
            try {
                //Server settings
                $mail->SMTPDebug = 0;                      //Enable verbose debug output
                $mail->isSMTP();
                $mail->CharSet = 'utf-8';                                            //Send using SMTP
                $mail->Host       = 'smtp-mail.outlook.com'; //tipo de servicio o cuenta de hosting                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'a.aranda_quilca@outlook.com';                     //SMTP username
                $mail->Password   = 'LARAvel$aq20004OsoLan$001';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                //Recipients
                $mail->setFrom('a.aranda_quilca@outlook.com', 'Antony');
                $mail->addAddress($email);     //Add a recipient       
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body    = $message;
                $imagen = '../img/a_minosi.png';
                //$mail->addAttachment($imagen);
                //$mail->send();
                echo 'correcto';
            } catch (Exception $e) {
                echo "Erro al enviar: {$mail->ErrorInfo}";
            } 
        }*/
        
    }
}