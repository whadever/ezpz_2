
<?php 

class Admin_login extends CI_Controller{

	public function index(){

		$this->load->view('admin/login');

	}

	public function login ()
	{
		if($this->input->post())
		{
			$username = $this->input->post('username');
			$password = hash_password($this->input->post('password'));

			$data_user = $this->admin_model->check_admin($username,$password);
			
			if($data_user)
			{

				$session_user = array (

					'admin_isLogged'		=> True,
					'admin_username'		=> $username

					);

				$this->session->set_userdata($session_user);

				redirect('admin/');
			}else
			{
				
				$this->session->set_flashdata('error', 'Username or Password is Wrong');
				redirect('admin/');
				
			}

		}else
		{
			redirect('admin/');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('admin');
	}

}
?>
