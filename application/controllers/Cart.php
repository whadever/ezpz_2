<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Main extends CI_Controller{

		public function index(){
			
			$this->load->library('cart');


			
		}

		public function add_item($data)
		{
			$this->load->library('cart');
		}

		


	}
?>