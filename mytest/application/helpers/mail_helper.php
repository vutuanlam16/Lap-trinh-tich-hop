<?php 
include "public/mail/class.smtp.php";
include "public/mail/class.phpmailer.php";


function sendmail($title,$bodyHtml,$emailRecieve,$nameRecieve,$body=""){
	$mail = new PHPMailer;

	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->CharSet 	= "utf-8";
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->Username = "vanlinh2961996@gmail.com";
	$mail->Password = "Vanlinh456";
	$mail->setFrom('vanlinh2961996@gmail.com', 'E-shopper');
	$mail->AddReplyTo('eshopper@gmail.com', 'E-shopper');

	$mail->addAddress($emailRecieve, $nameRecieve);
	$mail->Subject  = $title;
	$mail->Body     = $body;
	$mail->MsgHTML($bodyHtml);

	if(!$mail->send()) {
		echo 'Message was not sent.';
		echo 'Mailer error: ' . $mail->ErrorInfo;
	} else {
		// echo 'Message has been sent.';
		return TRUE;
	}

}

?>