<?php
namespace phpmailer;
use think\Exception;
class Email {
	public static function send($to,$title,$content){
		date_default_timezone_set('PRC');//set time
		try{
//Create a new PHPMailer instance
		$mail = new Phpmailer;
//Tell PHPMailer to use SMTP
		$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
// $mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
		$mail->Debugoutput = 'html';
//Set the hostname of the mail server
		$mail->Host = "smtp.163.com";
//Set the SMTP port number - likely to be 25, 465 or 587
		$mail->Port = 25;
//Whether to use SMTP authentication
		$mail->SMTPAuth = true;
//Username to use for SMTP authentication
		$mail->Username = "13813442959@163.com";
//Password to use for SMTP authentication
		$mail->Password = "awp1995";
//Set who the message is to be sent from
		$mail->setFrom('13813442959@163.com', '星耀院长');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
		$mail->addAddress('2324040614@qq.com', '镜花水月');
//Set the subject line
		$mail->Subject = '邮箱服务测试';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
		$mail->msgHTML('真爱"狂三');
//Replace the plain text body with one created manually
//$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
		if (!$mail->send()) {
    		echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
    echo "Message sent success!";
		}
		}catch(phpmailerException $e){
			return false;
		}
	

	}
}