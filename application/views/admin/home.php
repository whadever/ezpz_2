


  <div class="row">
    <div class="col-xs-12 text-center">
      <h2 style="margin-bottom:20px;">Welcome to Reyner's God Page</h2>
      <a href="<?php echo base_url('admin/create_email') ?>" class="btn btn-primary" style="margin-bottom:20px;">Create Email</a>
    </div>
  </div>    
<!--Setting Row-->  
<div class="admin-box">
  <div class="row">
    <div class="col-md-12">
          <div class="admin-box-head">
            <h3 class="text-center">Current Settings</h3>
          </div>

          <div class="col-lg-2"></div>
          <div class="col-lg-8">
            
            <div class="row text-center setting-row">
              <div class="col-lg-4">
                <h4>Background</h4>

                <a href="<?php echo base_url().$configuration->background ?>" class="fancybox"><img class="setting-content" src="<?php echo base_url().$configuration->background ?>" width="100" alt=""></a>
                <!-- <a href="#" data-toggle="modal" data-target="#background"><img src="<?php echo base_url().$configuration->background ?>" width="100" alt=""></a> -->
                <?php echo form_open_multipart('',array('id' => 'editBackground')) ?>
                  <input type="file" class="form-control" onchange="edit_background()" id="photo" name="photo">
                <?php echo form_close() ?>
          
              </div>

              <div class="col-lg-4">
                <div class="row">
                  <h4>Primary Color</h4>
                  <!-- <input type="color" onchange="edit_color()" id="color" name="color" value="<?php echo $configuration->primary_color ?>" > -->
                  <input class="jscolor" onblur="edit_color()" id="primary_color" name="primary_color" value="<?php echo $configuration->primary_color ?>">
                </div>
                <div class="row">
                  <h4>Secondary Color</h4>
                  <!-- <input type="color" onchange="edit_color()" id="color" name="color" value="<?php echo $configuration->primary_color ?>" > -->
                  <input class="jscolor" onblur="edit_color()" id="secondary_color" name="secondary_color" value="<?php echo $configuration->secondary_color ?>">
                </div>
                
                
                
              </div>

              <div class="col-lg-4">
                <h4>Service Fare</h4>
                <input type="range" class="setting-content" min="0" step="0.1" max="10" value="<?php echo $configuration->service_fare ?>" onchange="show_value()" id="fare"> 
                <p id="show_fare"><?php echo NZD($configuration->service_fare) ?></p>     
                <button type="button" class="btn btn-primary form-control" onclick="change_fare()">Change Fare</button>
              </div>
            
            </div>

          </div>
          <div class="col-lg-2"></div>
    </div>
  </div>
</div>
<!--Setting Row ENd-->
  
<div class="row text-center" style="margin-top:5%;">
      
    <div class="col-lg-4 col-xs-12">
        <div class="admin-box">

          <div class="row">
            <div class="col-xs-12">
              <div class="admin-box-head">
                <a href="<?php echo base_url('admin/drivers/0') ?>"><h4>Unapproved Drivers <span class="badge"> <?php echo count($unapproved_drivers) ?></span></h4></a>
              </div>
            </div>
          </div>

          <div class="admin-box-content">
            <?php foreach($unapproved_drivers as $driver): ?>
                <div class="col-xs-6" style="text-align:left;"">
                  <a href="<?php echo base_url('admin/loginEverywhere/'.$driver->type.'/'.$driver->id) ?>"><?php echo $driver->firstname.' '.$driver->lastname ?></a>
                </div>

                <div class="col-xs-6">
                  <div class="pull-right" id="driver_<?php echo $driver->id ?>">
                    <a onclick='verify_test("<?php echo $driver->id ?>","<?php echo $driver->type ?>" )'>
                    <span class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
                    </span></a>
                    <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $driver->id?>" data-account="driver" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
                    </span>
                  </div>
                </div>
            <?php endforeach; ?>

            <div class="row">
            <?php if(count($unapproved_drivers)>0): ?>
              <button type="button" class="btn btn-primary" data-account="drivers" data-target="#all_drivers" data-toggle="modal">Approve All Drivers</button>
            <?php else:?>
              <i>No unapproved drivers</i>
            <?php endif ?>
            </div>

          </div>

        </div>  
    </div>

    <div class="col-lg-4 col-xs-12">
        <div class="admin-box">

          <div class="row">
            <div class="col-xs-12">
              <div class="admin-box-head">
                <a href="<?php echo base_url('admin/clients/0') ?>"><h4>Unapproved Clients <span class="badge"> <?php echo count($unapproved_clients) ?></span></h4></a>
              </div>
            </div>
          </div>

          <div class="admin-box-content">
              <?php foreach($unapproved_clients as $client): ?>
                <div class="row">

                  <div class="col-xs-6" style="text-align:left;">
                    <a href="<?php echo base_url('admin/loginEverywhere/'.$client->type.'/'.$client->id) ?>"><?php echo $client->name ?></a>
                  </div>
                  <div class="col-xs-6">
                    <div class="pull-right" id="client_<?php echo $client->id ?>">
                      <a onclick='verify_test("<?php echo $client->id ?>","<?php echo $client->type ?>" )'>
                      <span data-account="client" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
                      </span></a>
                      <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $client->id?>" data-account="client" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
                      </span>
                    </div>
                  </div>
                  </div>
                <?php endforeach; ?>
              
                <div class="row">
                <?php if(count($unapproved_clients)>0): ?>
                  <button type="button" class="btn btn-primary" data-account="client" data-target="#all_clients" data-toggle="modal">Approve All Clients</button>
                <?php else:?>
                  <i>No unapproved clients</i>
                <?php endif ?>
                </div>
          </div>

        </div>
    </div>

    <div class="col-lg-4 col-xs-12">
      <div class="admin-box">

        <div class="row">
          <div class="col-xs-12">
            <div class="admin-box-head">
              <a href="<?php echo base_url('admin/drivers/0') ?>"><h4>Unverified Users <span class="badge"> <?php echo count($unapproved_users) ?></span></h4></a>
            </div>
          </div>
        </div>

        <div class="admin-box-content">
            <?php foreach($unapproved_users as $user): ?>
              <div class="row">
                <div class="col-xs-6" style="text-align:left;">
                  <a href="<?php echo base_url('admin/loginEverywhere/'.$user->type.'/'.$user->id) ?>"><?php echo $user->firstname.' '.$user->lastname ?></a>
                </div>
                <div class="col-xs-6">
                  <div class="pull-right">
                    <a href="<?php echo base_url('admin/approve_user/'.$user->id);?>">
                    <span onclick="verify_client()" class="glyphicon glyphicon-ok" style="cursor:pointer; font-size: 20px">      
                    </span></a>
                    <span href="" data-toggle="modal" data-target="#disapprove" data-id="<?php echo $user->id?>" data-account="user" class="glyphicon glyphicon-remove" style="cursor:pointer; font-size: 20px">      
                    </span></div>
                  </div>
              </div>
            <?php endforeach; ?>
            <div class="row">
            <?php if(count($unapproved_users)>0): ?>
              <button type="button" class="btn btn-primary" data-account="user" data-toggle="modal" data-target="#all_users">Delete All Users</button>
            <?php else:?>
              <i>No unapproved drivers</i>
            <?php endif?>
            </div>
        </div>

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

<!--Modal All Client-->
<div id="all_clients" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Approve All Clients</h4>
      </div>
      <div class="modal-body">
      <p>All clients will be accepted and listed. Proceed?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('admin/approve_all_client'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Proceed</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Modal All User-->
<div id="all_users" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete All Users</h4>
      </div>
      <div class="modal-body">
      <p>By doing so, all users will be deleted from database. Proceed?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('admin/disapprove_all_user'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Proceed</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Modal All Driver-->
<div id="all_drivers" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Approve All Drivers</h4>
      </div>
      <div class="modal-body">
      <p>By doing so, user will be deleted from database. Proceed?</p>
      </div>
      <div class="modal-footer">
        <a href="<?php echo base_url('admin/approve_all_driver'); ?>"><button type="button" class="btn btn-primary" value="Check Out">Proceed</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>


  function verify_test(id,type){

    $.ajax({
      url: "<?php echo base_url()?>" + "admin/approve_" + type + "/" + id,
      type: 'POST',
      cache : false,
      success: function(result){
        // setTimeout(function(){ location.reload(); }, 1000);
        if(result == 'success'){
          // swal("Login Success!", "You have succesfully logged in.", "success");
          // setTimeout(function(){ location.reload(); }, 1000);
          $('#'+type+'_'+id).empty();
          $('#'+type+'_'+id).append('Accepted <span class="glyphicon glyphicon-ok"></span>');
        }
        }
    });
  }
  
</script>

<script>

function show_value(){
  fare = $('#fare').val();
  fare = Number(fare);
  fare = fare.toFixed(2);
  document.getElementById("show_fare").innerHTML = "$ "+fare;
}

function change_fare(){
  
  fare = $('#fare').val();
  fare = Number(fare);
  fare = fare.toFixed(2);

  swal({   title: "You are about to change the service fare into $ "+$('#fare').val(),   text: "Click OK to Change",   type: "info",   showCancelButton: true,   closeOnConfirm: false,   showLoaderOnConfirm: true, }, function(){ 

      $.ajax({

          url: "<?php echo base_url(); ?>" + 'admin/edit_fare/',
          type: 'post',
          data: {fare:fare},
          success: function(data) 
          {
            if(data == 'success'){
              swal("Success!", "Service fare is succesfully changed .", "success");
              setTimeout(function(){ location.reload(); }, 1000);
            }else{
              
              swal({title: "Failed!",
                   text: data,   
                   timer: 2000,   
                   showConfirmButton: false,
                   type: "error" });
            }
          },
        });

  });
}

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

  function edit_color(){
     
     primary_color = $('#primary_color').val();
     secondary_color = $('#secondary_color').val();

     $.ajax({

      url: "<?php echo base_url(); ?>" + 'admin/edit_color/',
      type: 'post',
      data: {primary_color:primary_color,secondary_color:secondary_color},
      success: function(data) 
      {
        if(data == 'success'){
          swal("Color Change Success!", "Color succesfully changed.", "success");
          setTimeout(function(){ location.reload(); }, 1000);
        }else{
          
          swal({title: "Color Change Failed!",
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


