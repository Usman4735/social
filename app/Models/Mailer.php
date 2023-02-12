<?php

namespace App\Models;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Illuminate\Database\Eloquent\Model;

class Mailer extends Model
{
    public static function Send($subject, $message, $to)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            $smtp = Smtp::first();
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->SMTPDebug = 0; //Enable verbose debug output
            $mail->isSMTP(); //Send using SMTP
            $mail->Host = $smtp->host; //Set the SMTP server to send through
            $mail->SMTPAuth = true; //Enable SMTP authentication
            $mail->Username = $smtp->username; //SMTP username
            $mail->Password = $smtp->password; //SMTP password
            $mail->SMTPSecure = $smtp->encryption == 'TLS' ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
            //Enable implicit TLS encryption
            $mail->Port = $smtp->port; //TCP port to connect to; use 587 if you have set `SMTPSecure =PHPMailer::ENCRYPTION_STARTTLS

            //Recipients
            $mail->setFrom($smtp->from_email, $smtp->from_name);
            $mail->addAddress($to); //Add a recipient

            //Content
            $mail->isHTML(true); //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = strip_tags($message);

            if($smtp->status == 1){
                $mail->send();
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
