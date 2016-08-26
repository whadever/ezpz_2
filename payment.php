<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Williams Corporation Community</title>
    <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico" type="image/gif">
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-select.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>bootstrap/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url(); ?>css/wp_styles.css" rel="stylesheet" type="text/css"/>

    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-filestyle.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-select.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/js/bootstrap-modalmanager.js"></script>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <script>
        window.BaseUrl = "<?php echo base_url(); ?>";
    </script>


    <style>
        body {
            color: <?php echo $colour_one; ?> !important;
        }

        .header {
            border-bottom: 2px solid <?php echo $colour_two; ?> !important;
        }

        .title-inner {
            border: 2px solid <?php echo $colour_two; ?> !important;
        }

        .main-page {
            border: 2px solid <?php echo $colour_two; ?> !important;
        }

        .client-list table thead {
            background: <?php echo $colour_two; ?> !important;
        }
        .title {
            margin-bottom: 30px;
        }
        .title-inner {
            border: 2px solid #231f20;
            border-radius: 10px;
            padding: 15px 20px;
        }
        .title-inner > p {
            font-size: 20px;
            transform: translateY(21%);
        }
        .title-inner > img {
            background-color: gray;
            border-radius: 6px;
        }

        .add img {
            background: <?php echo $colour_two; ?> !important;
            border-radius: 6px;
        }

        a {
            color: <?php echo $colour_two; ?> !important;
        }

        .footer {
            color: <?php echo $colour_two; ?> !important;
        }

        .title-inner strong {
            color: <?php echo $colour_two; ?> !important;
        }

        label {
            margin-top: 15px;
        }
        label::after {
            color: maroon;
            content: "*";
            padding-left: 2px;
        }
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border: 0;
        }
    </style>

</head>
<body>

<div id="wrapper">
    <div class="header" style="border-bottom: 1px solid black; padding-bottom: 20px;">
        <div class="container1" style="text-align: center">
            <img src="<?php echo site_url('images/Williams-Platform-Logo.png'); ?>" width="200">
        </div>
    </div>
    <div class="container-fluid main-body">
        <div class="content">

            <div class="main-content">
                <div id="user-page" class="content-inner">

                    <div class="row">
                        <div class="title col-xs-8 col-sm-8 col-md-8">
                            <div class="title-inner">
                                <img width="40" src="<?php echo site_url('images/add_user_1.png'); ?>">
                                <p><strong>One step ahead for a Better Business!</strong></p>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div id="infoMessage">
                                <?php if($this->session->flashdata('warning-message')){ ?>

                                    <div class="alert alert-warning" id="warning-alert">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>Error </strong>
                                        <?php echo $this->session->flashdata('warning-message');?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--<div class="col-md-4" style="">
                            <h2 id="total" style="font-weight: bold">Amount: FREE<sup>*</sup></h2>
                            <p style="font-size: 0.85em; font-weight: bold;">
                                *NZD0.01 will be charged to determine that the card is valid and not on hold or stolen card list and that it has the correct details.
                            </p>
                            <p style="font-size: 0.85em; font-weight: bold;">
                                It will be refunded after 7 business days.
                            </p>
                            <p style="font-size: 0.85em; font-weight: bold;">
                                After 30 days, you will be charged NZD<?php /*echo number_format($total_price,2); */?> for your subscription unless you cancel beforehand.
                            </p>
                        </div>-->
                        <div class="col-md-4 col-md-offset-2">
                            <img src="<?php echo site_url('images/master.png'); ?>" style="height: 24px; float: right;">
                            <img src="<?php echo site_url('images/visa.png'); ?>" style="height: 24px; float: right;">
                            <img src="<?php echo site_url('images/payment_express.gif'); ?>" style="height: 24px; float: right;">
                            <div id="payment_box">
                                <div class="box" style="clear: both">
                                    <div class="box-body">
                                        <form id="frmPayment" action="<?php echo site_url('user/payment_submit'); ?>" method="post">
                                            <label for="name_on_card">Name on Card</label><br>
                                            <input class="form-control" type="text" name="CardName" value="" placeholder="" id="name_on_card">
                                            <label for="card_no">Card Number</label><br>
                                            <input id="card_no" class="form-control" type="text" maxlength="16" name="CardNum" value="" placeholder="">
                                            <label for="expiration">Expiration Date</label><br>
                                            <select name="ExMnth" size="1" class="form-control" id="expiration" style="float: left; width: 50%;">
                                                <?php
                                                for ($m = 1; $m < 13; $m++) {
                                                    $mm = sprintf("%02d", $m);
                                                    echo "<option value=\"$mm\"";
                                                    if ($mm == set_value('ExMnth')) {
                                                        echo " selected";
                                                    }
                                                    echo ">$mm\n";
                                                }
                                                ?>
                                            </select>
<input type="hidden" id="total_price" name="total_price" value="18.75">
                                            <input name="ExYear" maxlength="2" class="form-control" placeholder="year" style="float: left; width: 50%;" />

                                            <label for="cvc">Card Verification Number</label><br>

                                            <input id="cvc" class="form-control" type="text" maxlength="16" name="cvc" value="" placeholder="">
                                            <button class="btn btn-info" style="margin-top: 20px">Confirm</button>
                                            <a class="btn btn-default" href="<?php echo site_url('user/register'); ?>" style="margin-top: 20px">Back</a>
                                            
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3 style="margin-top: 0; font-weight: bold ">Your subscription</h3>
                            <table style="width: 100%; font-size: 1.1em; font-weight: bold;" class="table table-bordered">
                                <tr style="background-color: rgb(241, 211, 123); font-weight: bold; font-size: 1.2em;">
                                    <td style="width: 55%">PLAN CHOSEN:</td>
                                    <td style="text-align: right"><?php echo $plan; ?></td>
                                </tr>
                                <tr style="border-top: 1px solid gray;border-bottom: 1px solid gray">
                                    <td colspan="2">Systems</td>
                                </tr>

                                <?php foreach($application_prices as $app): ?>
                                <tr>
                                    <td><input type="checkbox" name="plan[]" onchange="calc(this)" data-price="<?php echo $app->price ?>" value="<?php echo $app->id ?>" <?php if($app->app == 'Contact System' || $app->app == '') echo "checked='1' disabled"; ?>   ><?php echo ($app->app)?$app->app:"Platform access"; ?></td>
                                    
                                    <td style="text-align: right">
                                        <?php if($app->price !=0): ?>
                                        NZD <?php echo number_format($app->price,2); ?>
                                        <?php else: ?>
                                        FREE
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <tr style="border-top: 1px solid gray">
                                    <td></td>
                                    <!--<td style="text-align: right; font-weight: bold; font-size: 1.4em;">Total: FREE<sup>*</sup></td>-->
                                    <td style="text-align: right; font-weight: bold; font-size: 1.4em;">Total: NZD <strong id="total">18.75</strong></td>
                                </tr>
                                <?php //$company_info = $this->session->userdata('company_info'); ?>
                                <tr>
                                    <td>URL</td>
                                    <td style=""><?php echo $company_info->url;?></td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td style=""><?php echo $company_info->country;?></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td style=""><?php echo $company_info->address;?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td style=""><?php echo $company_info->phone_number;?></td>
                                </tr>
                                <!--<tr>
                                    <td colspan="2" style="text-align: right;font-size: 0.8em">
                                        * NZD 0.01 will be refunded after 7 working days to validate your card <br>
                                        * NZD <?php /*echo number_format($total_price,2); */?> will be charged after 30 days free trial
                                    </td>
                                </tr>-->
                            </table>
                        </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" style="border-top: 1px solid black; padding-top: 20px;">
        <div class="container1">
            <p align="center" style="color:#000000;margin:0 0 10px;">User Management System</p>

            <p align="center" style="color:#000000;margin:0;">&copy; Williams Platform 2015</p>

            <p align="center">
                <a target="_BLANK" href="https://www.williamsbusiness.co.nz/"><img border="0" width="163" src="<?php echo base_url(); ?>images/PoweredByLogo.png"/></a>
            </p>
            <br/>
        </div>
    </div>
</div>


<script>
        function calc(el){
                $(el).attr('disabled', 'disabled');

                document.body.style.pointerEvents= "none";

                var price = $(el).data('price');
                
               
                before_total = $('#total').html();
                before_total = before_total.replace(/,/g,'');

                if($(el).is(':checked')){
                    subtotal_val = Number(before_total) + Number(price);
                }else{
                    subtotal_val = Number(before_total) - Number(price);
                }
                subtotal = Number(subtotal_val).toLocaleString('en');
                $('#total').empty();
                

                 $.ajax({

                    type: 'POST', //method
                    url : '<?php echo site_url('user/calc_total/'); ?>', //action
                    data : {subtotal : subtotal }, //name
                    success: function(response){ //response
document.body.style.pointerEvents= "auto";
                        $(el).removeAttr('disabled');
                        $('#total_price').val(response);
                        $('#total').html(response);
                    }

                });    
        }

    </script>

</body>
</html>


