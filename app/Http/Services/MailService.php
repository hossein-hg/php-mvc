<?php


namespace App\Http\Services;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use System\Config\Config;

class MailService
{
    public function send($emailAddress,$subject,$body)
    {

        $mail = new PHPMailer();

        try {
            $mail->CharSet = 'UTF-8';
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host = 'smtp.mailtrap.io';                    //Set the SMTP server to send through
            $mail->SMTPAuth   = Config::get('mail.SMTP.SMTPAuth');                                   //Enable SMTP authentication
            $mail->Username   = 'b18f9762c24ef1';                     //SMTP username
            $mail->Password   = 'ef7a74ed4cb9a2';                               //SMTP password
            $mail->SMTPSecure = false;            //Enable implicit TLS encryption
            $mail->Port       = 2525;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(Config::get('mail.SMTP.setFrom.mail'), Config::get('mail.SMTP.setFrom.name'));
            $mail->addAddress($emailAddress);     //Add a recipient
                         //Name is optional


            //Attachments

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;


            $result = $mail->send();
            return $result;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}