<div class="container">
	
	<div class="row" style="padding:5%;">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<h2>Your registration is almost finished</h2>
			<p>
				We have sent you a verification email to activate your account. If you have not received any email, click the button below
			</p>
			<button class="btn btn-primary" onclick="resend()">Resend Verification Email</button>
		</div>
		<div class="col-lg-2"></div>
		
	</div>
</div>

<script>
	function resend(){

		$.ajax({
	      url: "<?php echo base_url('login/resend_email/'.$user->username)?>",
	      type: 'POST',
	      cache : false,
	      success: function(result){
	      	if(result == 'success'){
	      		swal({title: "Sent",
	        	     text: "A verification email has been sent to your email",   
	        	     timer: 1000,   
	        	     showConfirmButton: false,
	        	     type: "success" });
	        	// setTimeout(function(){ location.reload(); }, 1000);
	      	}else{
	      		swal({title: "Failed to send email",
	        	     text: "A verification email has been sent to your email",   
	        	     timer: 1000,   
	        	     showConfirmButton: false,
	        	     type: "error" });
	      	}
	      
	      }
	      
	    });
	}
</script>