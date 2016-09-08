<div class="container">

  <div class="row">
    <div class="col-xs-12 text-center">
      <h2 style="margin-bottom:20px;">Welcome to Reyner's God Page</h2>
    </div>
  </div>    
  
  <div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
      <h2 class="text-center">Current Settings</h2>
      <div class="row text-center">
        
        <div class="col-lg-4">
          <h3>Background</h3>
          
          <a href="<?php echo base_url().$configuration->background ?>" class="fancybox"><img src="<?php echo base_url().$configuration->background ?>" width="100" alt=""></a>
          <!-- <a href="#" data-toggle="modal" data-target="#background"><img src="<?php echo base_url().$configuration->background ?>" width="100" alt=""></a> -->
          <?php echo form_open_multipart('',array('id' => 'editBackground')) ?>
            <input type="file" class="form-control" onchange="edit_background()" id="photo" name="photo">
          <?php echo form_close() ?>
    
        </div>

        <div class="col-lg-4">
          <h3>Primary Color</h3>
          <div class="color" style="height:100px; width:100px; margin:auto; border-radius: 50%; background-color: <?php echo $configuration->primary_color ?>;">
          </div>

          <input type="color" onchange="show_value()" id="color" name="color" class="form-control">
        </div>

        <div class="col-lg-4">
          <h3>Service Fare</h3>
        </div>
      
      </div>

    </div>
    <div class="col-lg-2"></div>
  </div>
  
  <div class="row text-center" style="margin-top:5%;">
      
    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/drivers/0') ?>">Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></a>
        </div>
      </div>

      <?php foreach($unapproved_drivers as $driver): ?>
        <div class="row">
          <div class="col-xs-6" style="text-align:left;"">
            <?php echo $driver->firstname.' '.$driver->lastname ?>
          </div>
          <div class="col-xs-6">
              <a href="<?php echo base_url('admin/approve_driver/'.$driver->id);?>">
              <span onclick="verify('driver')" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span></a>
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $driver->id?>" data-account="driver" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/clients/0') ?>">Unapproved Clients <span class="badge"> <?php echo count($unapproved_clients) ?></span></a>
        </div>
      </div>

      <?php foreach($unapproved_clients as $client): ?>
        <div class="row">

          <div class="col-xs-6" style="text-align:left;">
            <?php echo $client->name ?>
          </div>
          <div class="col-xs-6">
              <a href="<?php echo base_url('admin/approve_client/'.$client->id);?>">
              <span onclick="verify('client')" data-id="<?php echo $client->id?>" data-account="client" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span></a>
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $client->id?>" data-account="client" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="col-lg-4 col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <a href="<?php echo base_url('admin/drivers/0') ?>">Unverified Users <span class="badge"> <?php echo count($unapproved_users) ?></span></a>
        </div>
      </div>
      <?php foreach($unapproved_users as $user): ?>
        <div class="row">
          <div class="col-xs-6" style="text-align:left;">
            <?php echo $user->firstname.' '.$user->lastname ?>
          </div>
          <div class="col-xs-6">
              <!-- <a href="<?php echo base_url('admin/approve_user/'.$user->id);?>">
              <span onclick="verify_client()" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
              </span></a> -->
              <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $user->id?>" data-account="user" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
              </span></div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</div>

<!-- Modal delete user -->
<div id="disapprove" class="modal fade" role="dialog">
  <div class="modal-dialog">
<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Disapprove Account</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('admin/delete'); ?>
      <p>By doing so, user will be deleted from database. Proceed?</p>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="id" value="">
        <input type="hidden" name="account">
        <input type="submit" name="delete" value="Confirm" class="btn btn-danger">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close() ?>
      </div>
    </div>
  </div>
</div><!-- Modal delete user end -->

<script>

function edit_background(){

    var file = document.getElementById("photo");   
    /* Create a FormData instance */
    var formData = new FormData();
    /* Add the file */ 
    formData.append("photo", file.files[0]);

    $.ajax({
      url: "<?php echo base_url(); ?>" + 'admin/edit_background/',
      type: 'post',
      data: formData,
      processData: false,
          contentType: false,
      success: function(data) 
      {
        if(data == 'success'){
          swal("Upload Success!", "You have succesfully Upload a photo.", "success");
          setTimeout(function(){ location.reload(); }, 1000);
        }else{
          
          swal({title: "Upload Failed!",
               text: data,   
               timer: 2000,   
               showConfirmButton: false,
               type: "error" });
        }
      },
    });
  }

</script>

<script>
$('#disapprove').on('show.bs.modal', function(e) {

    //get data-id attribute of the clicked element

    var id = $(e.relatedTarget).data('id');
    var account=$(e.relatedTarget).data('account');

    //populate the textbox
    $(e.currentTarget).find('input[name="id"]').val(id);
    $(e.currentTarget).find('input[name="account"]').val(account);

});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".fancybox").fancybox();

  });
</script>


<script>


  function verify(type){

    if(type == 'driver'){
      id = <?php echo $driver->id ?>
    }else if(type == 'client'){
      id = <?php echo $client->id ?>
    }

    $.ajax({
      url: "<?php echo base_url()?>" + "admin/approve_" + type + "/" + id,
      type: 'POST',
      cache : false,
      success: function(result){
        setTimeout(function(){ location.reload(); }, 1000);
        // if(result == 'success'){
        //   swal("Login Success!", "You have succesfully logged in.", "success");
        //   setTimeout(function(){ location.reload(); }, 1000);
        // }else if(result == 'failed'){
        //   swal("Login Failed!", "Your username or password is incorrect", "error");
        //   swal({title: "Login Failed!",
        //        text: "Your username or password is incorrect",   
        //        timer: 1000,   
        //        showConfirmButton: false,
        //        type: "error" });
        // }
       
        
      }
      
    });
  }
  
</script>