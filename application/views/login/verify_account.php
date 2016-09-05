<div class="container">
	
	<div class="row" style="padding:5%;">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<h2>Your registration has almost finished</h2>
			<p>
				We have sent you a verification email to activate your account. If you have not received any email, click the button below
			</p>
			<button class="btn btn-primary" onclick="resend()" href="<?php echo base_url('login/resend_email/'.$user->username) ?>">Resend Verification Email</button>
		</div>
		<div class="col-lg-2"></div>
		
	</div>
</div>

<script>
	function resend(){
		$.ajax({
	      url: "<?php echo base_url('login/sign_in')?>",
	      data: data,
	      type: 'POST',
	      cache : false,
	      success: function(result){
	      	if(result == 'success'){
	      		swal("Login Success!", "you have succesfully logged in.", "success");
	        	setTimeout(function(){ location.reload(); }, 1000);
	      	}else if(result == 'failed'){
	      		swal("Login Failed!", "your username or password is incorrect", "error");
	        	swal({title: "Login Failed!",
	        	     text: "your username or password is incorrect",   
	        	     timer: 1000,   
	        	     showConfirmButton: false,
	        	     type: "error" });
	      	}
	       
	        
	      }
	      
	    });
	}
</script>