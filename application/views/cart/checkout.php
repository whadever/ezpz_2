<style>
      #map {
        height: 400px;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }
    </style>



<div class="container" id="cart-info" style="margin-bottom:20px; margin-top:20px;">
        
       <!--  <?php if($this->session->flashdata('success')): ?>
                
                <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success') ?>
                </div>
        

        <?php elseif($this->session->flashdata('failed')): ?>

                <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('failed') ?>
                </div>

        <?php endif; ?> -->
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h1 class="text-center" >Confirm Delivery Order</h1>
        <h3 style="margin-top:0px;margin-left:0px;">Order Detail</h3>
        <table cellpadding="6" cellspacing="1" style="width:100%" border="0" class="table table-bordered  ">

        <tr>    

                <th>No.</th>
                <th>Item Name</th>
                <th>Qty</th>
                <th style="text-align:right">Item Price</th>
                <th style="text-align:right">Sub-Total</th>
        </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>

                <?php echo form_hidden('rowid[]', $items['rowid']); ?>

                <tr>
                        
                        <td><?php echo $i ?></td>
                        <td><?php echo $items['name']; ?> </td>
                        <td><?php echo $items['qty']; ?></td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right">$<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>

        <?php $i++; ?>
        <?php endforeach; ?>

        <tr>
                <td colspan="3"> </td>
                <td class="right"><strong>Total</strong></td>
                <td class="text-right">$<?php echo $this->cart->format_number($this->cart->total()); ?></td>
        </tr>

        </table>
    
        <h3 style="margin-top:0px;margin-left:0px;">Delivery Destination Address</h3>
        <?php echo form_open('order/payment',array('id' => 'checkoutForm','name' => 'checkout_form','onsubmit' => "return form_validation()")); ?>
        <div class="checkbox">
          <label><input type="checkbox" id="myAddress" onchange='my_address(this)' value="">Use my registered address</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" id="newAddress" onchange='new_address(this)' value="">Deliver to new address</label>
        </div>

        <div class="form-group" id="mapBody">
                <label for="">Location</label>
                <input id="pac-input" class="controls" type="text" placeholder="Enter a location" style="display:none">
                <div id="map"></div>
        </div>

        <div class="form-group">
            <label for="">Address:</label>
            <textarea id="address_show" name="address_show" disabled="1" class="form-control" required="1" ></textarea>
            <input type="hidden" id="address" name="address">
        </div>

        <input type="hidden" name="lat" id="lat" value="">
        <input type="hidden" name="lng" id="lng" value="">       

        <p>
          
            <input type="submit" class="btn btn-primary" name="submit" value="Go to Payment" >
        </p>
        <?php echo form_close() ?>
    </div>
    <div class="col-md-2"></div>
  </div>
</div>



<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -43.53520544 , lng: 172.6362254},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var options = {
          
          componentRestrictions: {country: 'id'}
        };

      
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
       

        var autocomplete = new google.maps.places.Autocomplete(input,options);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("Place not found");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          $('#lat').val(place.geometry.location.lat());
          $('#lng').val(place.geometry.location.lng());
          $('#address').val(place.formatted_address);
          $('#address_show').val(place.formatted_address);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        
      }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5r3Vc2ohLE1naIZaaYLjfAifThGzAHwc&libraries=places&callback=initMap" async defer></script>

<script>
  function form_validation(){


    var address = document.forms["checkout_form"]["address_show"].value;

    if(address == null || address == ""){
      alert("Address must be filled");
      return false;
    }

  }
</script>

<script>
  function my_address(el){
    if($(el).is(":checked") ){
      $('#newAddress').removeAttr('checked');
      $('#pac-input').hide();
      $('#pac-input').val('');
      
      $('#lat').val(<?php echo $user->latitude ?>);

      $('#lng').val(<?php echo $user->longitude ?>);
      $('#address').val("<?php echo $user->address ?>");
      $('#address_show').val("<?php echo $user->address ?>");
      
    }else{
      $('#lat').val('');
      $('#lng').val('');
      $('#address').val('');
      $('#address_show').val('');
    }
  }

  function new_address(el){
    if($(el).is(":checked") ){
      $('#myAddress').removeAttr('checked');
      $('#pac-input').show();
      $('#lat').val('');
      $('#lng').val('');
      $('#address').val('');
      $('#address_show').val('');
    }else{
      $('#pac-input').hide();
      $('#lat').val('');
      $('#lng').val('');
      $('#address').val('');
      $('#address_show').val('');
      $('#pac-input').val('');
    }
  }
</script>