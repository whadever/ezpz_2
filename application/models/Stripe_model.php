<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Stripe_model extends CI_Model 
{
    private $privateKey;
    private $publicKey;

     function  __construct(){
        parent::__construct();
        include_once(APPPATH . 'libraries/stripe-php/init.php');

        $this->privateKey = "sk_test_vY4E4Bksh9MnnWZRs80b5PXv";
        $this->publicKey  = "pk_test_WHJeocUki4v9PeEmVbhYedqV";

        \Stripe\Stripe::setApiKey($this->privateKey);
     }
     
     public function pay()
     {

        if($this->input->post('amount'))
        {

            
            $topup_amount = str_replace(',', '',$this->input->post('amount') );

            $token      = $this->input->post('stripeToken');
            $amount     = (int)$topup_amount;

            try {
              $charge = \Stripe\Charge::create(array(
                "amount" => $amount * 100, // Amount in cents
                "currency" => "nzd",
                "source" => $token,
                "description" => "Example charge"
                ));

              $this->session->set_flashdata('success_topup', 'swal("Top Up Success!", "You have succesfully topped up your credits.", "success")');

              return true;
            } catch(\Stripe\Error\Card $e) {     
                $this->session->set_flashdata('error', 'Your Payment Have Been Declined, Please Choose Another Payment Option');
                redirect('user/credits');
            }
        }else
        {
            $this->session->set_flashdata('error', 'Please Insert Amount To Top Up');
            redirect('user/credits');
        }
     }
     
    
}
