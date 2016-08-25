
<div id="main">
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2"></div>
        <div class="col-xs-8">
            <div class="cards">
                <h3 align="center">We Accept </h3>
            </div>
            <?php echo form_open('user/topup', array('class' => 'inline')) ?>
                <table class="table table-bordered">
                    <tr>
                        <td>Amount</td>
                        <td>
                            <div class="input-group">
                              <div class="input-group-addon">$</div>
                              <input type="number" name="amount" id="amount" class="form-control" placeholder="amount" required>
                              <div class="input-group-addon">.00</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                           <script
                              src="https://checkout.stripe.com/checkout.js" class="stripe-button pull-right"
                              data-key="pk_test_WHJeocUki4v9PeEmVbhYedqV"
                              data-email="<?php echo $user_email ?>"
                              data-name="EZPZ Food Delivery"
                              data-description="Wallet Top Up"
                              data-locale="auto">
                            </script>
                        </td>
                    </tr>
                </table>
            <?php echo form_close() ?>
        </div>
        <div class="col-xs-2"></div>
    </div>
</div>
</div>
