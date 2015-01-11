<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
		$this->load->model('admin_model');
	}

	public function index(){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
		

		$this->lists();

		//loadBackLayout('administrator_view',$data);
	}

	function lists(){

		$config['full_tag_open'] = '<ul class="pagination margin-top">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li  class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['prev_link'] = 'Prev';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '<li>';
		$config['next_link'] = 'Next';
		$config['next_tag_open'] = '<li class="next">';
		$config['next_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config["base_url"] = base_url() . "administrator/lists";
		
		$config["num_links"] = 3;
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		
		$offset = (int)$this->uri->segment(3) ?: 0;
		
		$admins = $this->admin_model->getAdmins($offset, $config["per_page"]);
		$data['admins'] = $admins->result(); 
		
		$total = $this->admin_model->getAdmins();
		$config["total_rows"] = $total->num_rows();

		$this->pagination->initialize($config);
		
		$data['from'] = $offset+1;
		$data['to'] = $offset + count($data['admins']);
		$data['total'] = $config["total_rows"];

		loadBackLayout('administrator_view', $data);

	}

	function saveAdmin(){
	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim|is_unique[app_admin_users.admin_email]');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
	    $this->form_validation->set_rules('fname', 'Firstname', 'required');
	    $this->form_validation->set_rules('lname', 'Lastname', 'required');
	    
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array("email" => form_error('email'),
		                             "password" => form_error('password'),
		                             "fname" => form_error('fname'),
		                             "lname" => form_error('lname'),
		                             "stats"     => 1
		            ));
		    }else{
		      $admin = array('admin_email' 		=> $this->input->post("email"),
		                     'admin_fname' 		=> $this->input->post("fname"),
		                     'admin_lname' 		=> $this->input->post("lname"),
		                     'admin_password' 	=> $this->input->post("password"),
		                     'created_by'  		=> $this->session->userdata('user_id'),
		                     );

		      $admin_id = $this->admin_model->saveAdmin($admin);

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>New Admin successfully saved!</div>');
		      echo json_encode(array("stats" => 0));
		    }
	  }else{
	    redirect(base_url("administrator"));
	  }
	 }

	 function editAdmin(){
	 	if($this->input->post('id')){
	 		$data['admin'] = $this->admin_model->getAdminUser($this->input->post('id'));
	 		$this->load->view('edit_view',$data);
	 	}else{
	 		redirect(base_url("administrator"));
	 	}
	 }

	 function updateAdmin(){
	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    //$this->form_validation->set_rules('email', 'Email', 'required|xss_clean|trim');
	    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]');
	    $this->form_validation->set_rules('fname', 'Firstname', 'required');
	    $this->form_validation->set_rules('lname', 'Lastname', 'required');
	    
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array(//"email" => form_error('email'),
		                             "password" => form_error('password'),
		                             "fname" => form_error('fname'),
		                             "lname" => form_error('lname'),
		                             "stats"     => 1
		            ));
		    }else{
		      $admin = array(//'admin_email' 		=> $this->input->post("email"),
		                     'admin_fname' 		=> $this->input->post("fname"),
		                     'admin_lname' 		=> $this->input->post("lname"),
		                     'admin_password' 	=> $this->input->post("password"),
		                     'created_by'  		=> $this->session->userdata('user_id'),
		                     );

		      $admin_id = $this->admin_model->updateAdmin($admin,$this->input->post("admin_id"));

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Admin successfully updated!</div>');
		      echo json_encode(array("stats" => 0));
		    }
	  }else{
	    redirect(base_url("administrator"));
	  }
	 }

	 function removeAdmin(){
	  if($this->input->post()){

	      $admin_id = $this->admin_model->removeAdmin($this->input->post("id"));

	      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Admin successfully remove!</div>');
	      echo json_encode(array("stats" => 1));

	  }else{
	    redirect(base_url("administrator"));
	  }
	 }


}
