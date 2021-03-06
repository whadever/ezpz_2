<?php 

class Email_model extends CI_Model{

	public function verification_email($email, $data){
		
		$to = $email;
		$subject = "Your New EZPZ Account!";
		$url = base_url('login/email_verify').'/'.$data;

		// $message = file_get_contents(APPPATH . 'views/email_templates/verification_email.html');

		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<table style="width:100%; height:100%;">
			<tr>
				<td style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80" ></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Please Verify Your Email</h1><br>
					<p>Hello!<br>Here is your link for account verification</p>
					<h3><a href="$url">Click Here to Verify</a></h3><br>
					<p>Please Enjoy Our Services!</p>
				</td>
			</tr>
			<tr>
				<td style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; text-align:center">
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
				    </div>
				</td>
			</tr>
		</table>

EOD;

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
		$subject = "Your New EZPZ Password";
		$message = <<<EOD
					<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

					<table style="width:100%; height:100%;">
						<tr>
							<td style="background:#34495e; padding:2em 1em 1em 1em;">
								<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p></p>
							</td>
						</tr>
						<tr>
							<td style="padding:2em">
								<h1>Hello!</h1><br>
								<p>Here is your reseted password :
									New Password : <p style="color: #16a085">$data</p>
								</p>
								<p>For Safety Please Quickly Change Your Password!</p>
							</td>
						</tr>
						<tr>
							<td style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
								<div class="row" style="padding: 10px; text-align:center">
							      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
							      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
							      </center>
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
		$subject = "New Food Order [EZPZ]";
		$name = $data->name;
		$address = $data->address;
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<table style="width:100%; height:100%;">
			<tr>
				<td style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>Here is the order detail, to accept this order please login into the website.<a href="base_url()">Click Here</a>
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
					<div class="row" style="padding: 10px; text-align:center">
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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


	public function order_receipt($email, $data)
	{	
		$to = $email;
		$subject = "EZPZ Order Receipt";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
			<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<center><h1>Your Order Receipt</h1></center>

				</td>
			</tr>
			<tr>
				<td colspan="5">
					<h3>Order #{$data['order_code']} </h3>
				</td>
			</tr>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Sub Total</th>
			</tr>
						
EOD;
	$i=1;
	foreach ($data['order_detail'] as $detail) {
		$message .= '<tr>';
		$message .= '<td style="text-align:center">'.$i.'</td>';
		$message .= '<td style="text-align:center">'.$detail->name.'</td>';
		$message .= '<td style="text-align:center">'.$detail->qty.'</td>';
		$message .= '<td style="text-align:center">'.NZD($detail->price).'</td>';
		$message .= '<td style="text-align:center">'.NZD($detail->sub_total).'</td>';
		$message .= '</tr>';
		$i++;
	}

	$delivery_cost = NZD($data['delivery_cost']);
	$total_cost = NZD($data['total_price'] + $data['delivery_cost']);

	$message.= <<<EOD
			<tr style="margin-top:20px">
				<td colspan="5">
					<h4>Delivery Detail</h4>
				</td>
			</tr>
			<tr>
				<td colspan="2"><b>Restaurant</b></td>
				<td colspan="3">{$data['restaurant']->name}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Driver</b></td>
				<td colspan="3">{$data['driver']->firstname}&nbsp;{$data['driver']->lastname}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Distance</b></td>
				<td colspan="3">{$data['distance']}km</td>
			</tr>
			<tr>
				<td colspan="2"><b>Delivery Cost</b></td>
				<td colspan="3">{$delivery_cost}</td>
			</tr>
			<tr>
				<td colspan="2"><b>Total Cost</b></td>
				<td colspan="3">{$total_cost}</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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


	public function test_mail()
	{
		$to = 'setyawansusanto99@gmail.com';
		$subject = "Your Order Receipt";
		$name = 'irvan';
		$address = 'gading';
		$url = base_url();
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td colspan="5">
					<center><h1>Your Order Receipt</h1></center>

				</td>
			</tr>
			<tr>
				<td colspan="5">
					<h2>Order Detail</h2>
				</td>
			</tr>
			<tr>
				<th>No</th>
				<th>Name</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Sub Total</th>
			</tr>
			<tr>
				<td style="text-align:center">1.</td>
				<td style="text-align:center">Ayam Goreng</td>
				<td style="text-align:center">2</td>
				<td style="text-align:center">$ 2.00</td>
				<td style="text-align:center">$ 4.00</td>
			</tr>
			<tr style="margin-top:20px">
				<td colspan="5">
					<h2>Delivery Detail</h2>
				</td>
			</tr>
			<tr>
				<td colspan="2"><b>Distance:</b></td>
				<td colspan="3">9.4km</td>
			</tr>
			<tr>
				<td colspan="2"><b>Delivery Cost:</b></td>
				<td colspan="3">$ 5.00</td>
			</tr>
			<tr>
				<td colspan="2"><b>Total Cost:</b></td>
				<td colspan="3">$ 9.00</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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

	public function email_promotion($email,$content)
	{
		$to = $email;
		$subject = "Promotion Email";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
			{$content}
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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

	public function driver_registered($data = array()){
		$to = $data['email'];
		$subject = "Congratulations ".$data['firstname']." ".$data['lastname']." !";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>You have successfully registered to EZPZ Food Delivery drivers !</p>
					</p>
					<p>We will contact you immediately for the next process</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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
			echo'failed';
			print_r($data);
			exit();
			return false;
		}else
		{
			return true;
		}
	}

	public function restaurant_registered($data = array()){
		$to = $data['email'];
		$subject = "Congratulations ".$data['name']." !";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>You have successfully registered to EZPZ Food Delivery drivers !</p>
					</p>
					<p>We will contact you immediately for the next process</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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
			echo'failed';
			print_r($data);
			exit();
			return false;
		}else
		{
			return true;
		}
	}

	public function restaurant_password($email,$data,$password)
	{
		$to = $email;
		$subject = "Congratulations ".$data->name."!";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>Here is your password : <p style="color: #16a085">$password</p>
					</p>
					<p>For Safety Please Quickly Change Your Password!</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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

	public function restaurant_password_all($email,$password)
	{
		$to = $email;
		$subject = "Congratulations!";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Hello!</h1><br>
					<p>Here is your password : <p style="color: #16a085">$password</p>
					</p>
					<p>For Safety Please Quickly Change Your Password!</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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
			echo "failed";
			exit;
			return false;
		}else
		{
			return true;
		}
	}

	public function email_disapproval($email)
	{
		$to = $email;
		$subject = "Sorry!";
		$message = <<<EOD
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		
		<table style="width:100%; height:100%;">
			<tr>
				<td colspan="5" style="background:#34495e; padding:2em 1em 1em 1em;">
					<p align="center"><img src="http://ezpzdelivery.co.nz/assets/logo.png" width="80"></p>
				</td>
			</tr>
			<tr>
				<td style="padding:2em">
					<h1>Sorry!</h1><br>
					<p>Your application for EZPZ doesn't meet our standard, therefore your application has been rejected.</p>
					</p>
					<p>Best Regards,</p>
					<p>EZPZ Team</p>
				</td>
			</tr>
			<tr>
				<td colspan="5" style="background:#34495e; color:#fff; height:20%; padding:1em 0 1em 0">
					<div class="row" style="padding: 10px; " >
					 
				      <center style="overflow:hidden"><div><img src="http://ezpzdelivery.co.nz/images/logo.png" width="50" style="margin-right:1em;"></div>
				      <div style="vertical-align: middle;">&copy; Hassee 2016. All Rights Reserved under LRM Corporation</div>
				      </center>
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
			echo "failed";
			exit;
			return false;
		}else
		{
			return true;
		}
	}



		

}

 ?>