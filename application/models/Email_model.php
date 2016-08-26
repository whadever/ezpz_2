<?php 

class Email_model extends CI_Model{

	public function verification_email($email, $data){
		
		$to = $email;
		$subject = "Your to Your New EZPZ Account!";

		$message = file_get_contents(APPPATH . 'views/email_templates/verification_email.html');

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
		$message = <<<EOD
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

					<table style="width:100%; height:100%;">
						<tr>
							<td style="background:#34495e; padding:2em 1em 1em 1em;">
								<p align="center"><img src="http://ezpztest.gethassee.com/assets/logo.png" style="height:100px;"></p>
							</td>
						</tr>
						<tr>
							<td style="padding:2em">
								<h1>Hello!</h1><br>
								<p>Here is your reseted password :
									New Password : <p style="color: #16a085">$data</p>
								</p>
								<p>PFor Safety Please Quickly Change Your Password!</p>
							</td>
						</tr>
						<tr>
							<td style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
								<div class="row text-center" style="padding: 10px;">
							      <img src="http://ezpztest.gethassee.com/images/logo.png" style="margin-right:1em; height:50px;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation
							    </div>
							</td>
						</tr>
					</table>
EOD;

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
		$name = $data->name;
		$address = $data->address;
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<table style="width:100%; height:100%;">
			<tr>
				<td style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpztest.gethassee.com/assets/logo.png" style="height:100px;"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>Here is the order detail, to accept this order please login into the website.
							<br><br>
								 Restaurant :<p style="color: #16a085">$name</p>
							<br><br>
								Address : <p style="color: #16a085">$address</p>
							<br>
					</p>
					<p>Please Enjoy Our Services!</p>
				</td>
			</tr>
			<tr>
				<td style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row text-center" style="padding: 10px;">
				      <img src="http://ezpztest.gethassee.com/images/logo.png" style="margin-right:1em; height:50px;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation
				    </div>
				</td>
			</tr>
		</table>
EOD;

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