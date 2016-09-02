<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="top: 20%">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      	<div class="modal-body">
		<button type="button" class="close" data-dismiss="modal" >&times;</button>
			<div class="row">

				<div class="col-xs-12 text-center">
					
					<h2>Sign In</h2>
				</div>

			</div>

			<div class="row">
				<div class="col-xs-2 col-sm-3"></div>
				<div class="col-xs-8 col-sm-6">
					
					<?php echo form_open('login/sign_in',array('id' => 'loginForm')) ?>

						<div class="form-group">
							<label for="">Username:</label>
							<input type="text" id="username" autocomplete="off" name="username" class="form-control" required="1">
						</div>

						<div class="form-group">
							<label for="">Password</label>
							<input type="password" autocomplete="off" autosave="off" name="password" class="form-control" required="1">
						</div>

						<div class="form-group text-center">
							<button type="submit" onclick="alert()" class="btn btn-primary " name="login" >Login</button>
							
						</div>

					<?php echo form_close() ?>
				
				</div>
				<div class="col-xs-2 col-sm-3"></div>
			</div>

    	</div>
    	
    </div>
  </div>
</div>

<script>
function alert(){

	data = $('#loginForm').serialize();

	$.ajax({
      url: "<?php echo base_url('login/sign_in')?>",
      data: data,
      type: 'POST',
      success: function(result){
      	alert(result);
      	if(result == 'success'){
      		swal("Test!", "hellow.", "success");
      	}
        else{
        	
        	
        }
        //setTimeout(function(){ location.reload(); }, 1000);
        
      } 
    });
}

</script>

<script>
	$('#loginModal').on('shown.bs.modal', function () {
	  $('#username').focus()
	})
</script>


