<?php 

class Email_model extends CI_Model{

	public function verification_email($email, $data){
		
		$to = $email;
		$subject = "Your to Your New EZPZ Account!";
		$message = "Hello!
					Here is your link for account verification\n";
					
		$message .=	'<a href=' . '"' .base_url('login/email_verify/'). $data . '">Click Here to Verify.</a>';
					
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

	public function send_order ($email, $data)
	{
		$to = $email;
		$subject = "New Food Order";
		$message = "<h3>Hello!</h3>
					<p>
						Here is the order detail, to accept this order please login into the website.\n
					<br>
						Restaurant :" . $data->name . "\n
					<br>
						Address :" . $data->address . "\n
					<br>
					</p>";
		$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";
		$headers .= 'From: ordering@ezpzdelivery.co.nz' . "\r\n" .
					'Reply-To: contact@ezpzdelivery.co.nz' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
		
		if(!mail($to, $subject, $message, $headers))
		{
			return false;
		}else
		{
			return true;
		}
	}

		

}

 ?>