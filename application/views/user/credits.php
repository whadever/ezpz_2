<style type="text/css">
  .input-group-addon{
    background-color: #34495e;
    border-radius: 0px;
    border:3px solid #34495e;
    color: #fff;
  }
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        
        border-color: #34495e;
    }
  
</style>
<div id="main">
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8" style="padding:20px;">
          <div class="row">
                <h2 align="center" style="margin:30px;">Top Up Wallet</h2>
          </div>
         <?php echo form_open('user/topup', array('class' => 'inline', 'id' => 'top_up')) ?> 
          <div class="row">
            <table class="table">
            <tr>
                <th class="payhead"><strong>Current Balance</strong></th>
                <td><?php echo NZD($this->crud_model->get_by_condition('users', array('id' => $this->session->userdata('user_id')))->row('credits')) ?></td>
            </tr>
            <tr>
                  <th class="payhead" style="vertical-align: middle;"><strong>Add Balance</strong></th>
                  <td>           
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="text" name="amount" id="amount" onkeyup="format(this)" class="form-control" placeholder="amount" required>
                              <div class="input-group-addon">.00</div>
                              <input type="hidden" id="stripeToken" name="stripeToken" />
                              <input type="hidden" id="stripeEmail" name="stripeEmail" />
                            </div>
                  </td>
            </tr> 
            </table>           
          </div>
          <div class="row text-center" style="padding:20px;padding-right:5px;">                     
              <input type="button" class="btn btn-primary" id="pay" value="Pay">
          </div>        
                
            <?php echo form_close() ?>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
</div>

<script src="https://checkout.stripe.com/checkout.js"></script>

<script>

var test = [""];
<?php $i = 0; ?>

<?php foreach ($lists as $list): ?>
  test[<?php echo $i ?>] = "<?php echo $list->name ?>";
  <?php $i++; ?>
<?php endforeach; ?>

$("#restaurant-search").typeahead({

                        minLength: 0,
                        items: 4,
                        source: test,   
                    });

</script>

<script>

  function format(input)
{
    var nStr = input.value + '';
    nStr = nStr.replace( /\,/g, "");
    var x = nStr.split( '.' );
    var x1 = x[0];
    var x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while ( rgx.test(x1) ) {
        x1 = x1.replace( rgx, '$1' + ',' + '$2' );
    }
    input.value = x1 + x2;
}

var handler = StripeCheckout.configure({
    key: 'pk_test_WHJeocUki4v9PeEmVbhYedqV',
    token: function (token) {
        $("#stripeToken").val(token.id);
        $("#stripeEmail").val(token.email);
        $("#amount").val($("#amount").val() * 100);
        $("#top_up").submit();
    }
});

$('#pay').on('click', function (e) {
    var amount = $("#amount").val();
    amount = amount.replace(',','');
    amount = Number(amount) * 100;
    var displayAmount = parseFloat(Math.floor($("#amount").val() * 100) / 100).toFixed(2);
    // Open Checkout with further options
    handler.open({
        name: 'EZPZ Food Delivery',
        description: 'Wallet Top Up',
        amount: amount,
        email: '<?php echo $user_email ?>'
    });
    e.preventDefault();
});

// Close Checkout on page navigation
$(window).on('popstate', function () {
    handler.close();
});

</script>