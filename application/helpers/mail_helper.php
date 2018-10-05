<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;   
    if ( ! function_exists('sendEmails')){

	function sendEmails($subject,$email,$view,$data)
	{
		$CI = &get_instance();		
		$mail = new PHPMailer;
		//Enable SMTP debugging. 
		//$mail->SMTPDebug = 2;                               
		$mail->SMTPDebug = 0;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();        
		//Set SMTP host name                       
		$mail->Host = "ssl://smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                  
		//Provide username and password

		$mail->Username = "bilalahmadue@gmail.com";                 
		$mail->Password = "duzcrisqmgnzqzga";                           
		
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to 
		//$mail->Port = 587;                           
		$mail->Port = 465;                              

		$mail->From = "noreply@tsonar.com";
		$mail->FromName = "TSONAR";

		$mail->addAddress($email, $data['firstname']);
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$data['data'] = $data;
		$body = $CI->load->view('emails/'.$view,$data,TRUE);
		$mail->Body = $body;
		$mail->AltBody = $body;

		if(!$mail->send())
		{
			//echo "Mailer Error: " . $mail->ErrorInfo;
			return false;
		} 
		else 
		{
			//echo "Message has been sent successfully";
			return true;
		}
	}
    }