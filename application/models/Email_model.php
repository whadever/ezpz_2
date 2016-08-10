<?php 

class Email_model extends CI_Model{

	public function verification_email($email, $data){
		
		$to = $email;
		$subject = "Your to Your New EZPZ Account!";
		$message = "Hello!
					Here is your link for account verification\n";
					
		$message .=	'<a href=' . '"' . $data . '">Click Here to Verify.</a>';
					
		$message .=	" Please Enjoy Our Services!";

		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: noreply@ezpz.com' . "\r\n" .
					'Reply-To: irvan@gethassee.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		if(!mail($to, $subject, $message, $headers))
		{	
			return false;
		}
		
	}

	public function email(){
		
		$to = 'setyawansusanto99@gmail.com';
		$subject = "Your to Your New EZPZ Account!";
		$message = "Hello!
					Here is your link for account verification\n";
					
		$message .=	'<a href=' . '"' . '">Click Here to Verify.</a>';
					
		$message .=	" Please Enjoy Our Services!";

		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: noreply@ezpz.com' . "\r\n" .
					'Reply-To: irvan@gethassee.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		if(!mail($to, $subject, $message, $headers))
		{	
			return false;
		}
		
	}

	public function password_reset($email,$data){

		$to = $email;
		$subject = "Your Reseted Password";
		$message = "Hello!
					Here is your reseted password\n
					
					Password :" . $data . "\n
					
					For Safety Please Quickly Change Your Password!";

		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: noreply@ezpz.com' . "\r\n" .
					'Reply-To: jonathan.hosea@gethassee.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		if(!mail($to, $subject, $message, $headers))
		{
			return false;
		}

	}

		

}

 ?>