<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('admin_model');
	}

	public function check_login($password){
		$uemail = $this->input->post('uemail');
		$result = $this->admin_model->login($uemail, $password);
		if($result){
			$this->session->set_userdata('loggedIn',$result);
		  	return true;
		}else{
		  $this->form_validation->set_message('check_login', 'Invalid username or email or password.');
		  return false;
		}
	}
    
    public function index()
	{
		if($this->session->userdata('loggedIn')){
			redirect('dashboard');
		}
		$this->form_validation->set_rules('uemail', 'uemail', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required|callback_check_login');
		if($this->form_validation->run() == FALSE){
			$this->load->view('login');
		}else{
			redirect('dashboard');
		}
	}

	function logout()
	{
		$this->session->unset_userdata('loggedIn');
		redirect();
	}
}
