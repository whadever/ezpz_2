<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document" style="max-width:400px;">
    <div class="modal-content">
      
      	<div class="modal-body">
		<button type="button" class="close" data-dismiss="modal" >&times;</button>
			<div class="row">

				<div class="col-xs-12 text-center">
					
					<h2 style="margin-top:0px">Sign In</h2>
				</div>

			</div>

			<div class="row">
				<div class="col-xs-1 col-sm-1"></div>
				<div class="col-xs-10 col-sm-10">
					
					<form action="" method="post" id="loginForm">

						<div class="form-group">
							<label for="">Username:</label>
							<input type="text" id="username" autocomplete="off" name="username" class="form-control" required="1">
						</div>

						<div class="form-group" style="margin-bottom:0px;">
							<label for="">Password</label>
							<input type="password" id="password" autocomplete="off" autosave="off" name="password" class="form-control" required="1">
						</div>
						<a href="<?php echo base_url('login/forget')?>" style="font-size:11px;">Forgot Password</a>
						<div class="form-group text-center" style="margin-top:10px;">
							<button type="button" onclick="submitForm()" id="submit" class="btn btn-primary form-control" >Login</button>
							
						</div>

					</form>
				
				</div>
				<div class="col-xs-1 col-sm-1"></div>
			</div>

    	</div>
    	
    </div>
  </div>
</div>

<script>
	$("#password").keyup(function(event){
    	if(event.keyCode == 13){
    	 event.preventDefault();
       	 $("#submit").click();
    	}
	});
</script>

<script>
function submitForm(){

	data = $('#loginForm').serialize();
	$.ajax({
      url: "<?php echo base_url('login/sign_in')?>",
      data: data,
      type: 'POST',
      cache : false,
      success: function(result){
      	if(result == 'success'){
      		swal("Login Success!", "You have succesfully logged in.", "success");
        	setTimeout(function(){ location.replace("<?php echo base_url() ?>") }, 1000);
      	}else if(result == 'failed'){
      		swal("Login Failed!", "Your username or password is incorrect", "error");
        	swal({title: "Login Failed!",
        	     text: "Your username or password is incorrect",   
        	     timer: 1000,   
        	     showConfirmButton: false,
        	     type: "error" });
      	}
       
        
      }
      
    });
}

</script> 

<script>
	$('#loginModal').on('shown.bs.modal', function () {
	  $('#username').focus()
	})
</script>


