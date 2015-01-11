<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MX_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index(){
		$this->login();
	}

	public function login(){
		$data['error'] = "";
		if($this->input->post()){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|max_length[12]');

			if($this->form_validation->run() == FALSE){
				loadLoginLayout('login_view', $data);
			}else{
				$res = $this->login_model->login($this->input->post('email'),$this->input->post('password'));
				if($res > 0){
					$userinfo = array(
						'user_id'  		=> $this->login_model->userinfo->admin_id,
						'user_email'	=> $this->login_model->userinfo->admin_email,
						'user_fname'	=> $this->login_model->userinfo->admin_fname,
						'user_lname'	=> $this->login_model->userinfo->admin_lname,
						'logged_in' 	=> TRUE
					);

					$this->session->set_userdata($userinfo);
					redirect(base_url('user/administrator'));
				}else{
					$data['error'] = '<div class="error center">Please check Email and Password...</div>';
					loadLoginLayout('login_view', $data);
				}
			}

		}else{

			loadLoginLayout('login_view', $data);
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('user/login'));
	}

}
