<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
		$this->load->model('pages_model');
	}

	public function index(){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
	
		/*$data['pages'] = $this->pages_model->getPages();
		loadBackLayout('pages_view', $data);*/

		$this->editpage();
		
	}

	function editpage($id = false){
		if($id){
			$edit = $this->pages_model->getPages($id);
			$data['total_edit'] = $edit->num_rows();
			$data['pageinfo'] = $edit->row();
		}

		$pages = $this->pages_model->getPages();
		$data['total_pages'] = $pages->num_rows();
		$data['pages'] = $pages->result();
		
		loadBackLayout('pages_view', $data);
	 }

	function savePage(){
	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    $this->form_validation->set_rules('page_slug', 'Slug', 'required|xss_clean|trim|is_unique[app_pages.page_slug]');
	    $this->form_validation->set_rules('page_title', 'Title', 'required|xss_clean|trim|is_unique[app_pages.page_title]');
	    $this->form_validation->set_rules('page_intro', 'Introduction');
	    $this->form_validation->set_rules('page_content', 'Content', 'required');
	    $this->form_validation->set_rules('page_meta_title', 'Meta Title');
	    $this->form_validation->set_rules('page_meta_keyword', 'Meta Keywords');
	    $this->form_validation->set_rules('page_meta_desc', 'Meta Description');
	    
	    $this->form_validation->set_message('is_unique', '%s already used.');
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array("page_slug" => form_error('page_slug'),
		                             "page_title" => form_error('page_title'),
		                             "page_content" => form_error('page_content'),
		                             "stats"     => 1
		            ));
		    }else{
		      $info = array('page_slug' 			=> $this->input->post("page_slug"),
		                     'page_title' 			=> $this->input->post("page_title"),
		                     'page_content' 		=> $this->input->post("page_content"),
		                     'page_meta_title' 		=> $this->input->post("page_meta_title"),
		                     'page_meta_keyword' 	=> $this->input->post("page_meta_keyword"),
		                     'page_meta_desc' 		=> $this->input->post("page_meta_desc"),
		                     'created_by'  			=> $this->session->userdata('user_id'),
		                     'page_active'			=> $this->input->post("page_active"),
		                     );

		      $this->pages_model->savePage($info);

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>New Page successfully saved!</div>');
		      echo json_encode(array("stats" => 0));
		    }
	  }else{
	    redirect(base_url("pages"));
	  }
	 }


	 function updatePage(){

	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    $this->form_validation->set_rules('edit_page_slug', 'Slug', 'required|xss_clean|trim');
	    $this->form_validation->set_rules('edit_page_title', 'Title', 'required|xss_clean');
	    $this->form_validation->set_rules('edit_page_intro', 'Introduction');
	    $this->form_validation->set_rules('edit_page_content', 'Content', 'required');
	    $this->form_validation->set_rules('edit_page_meta_title', 'Meta Title');
	    $this->form_validation->set_rules('edit_page_meta_keyword', 'Meta Keywords');
	    $this->form_validation->set_rules('edit_page_meta_desc', 'Meta Description');
	    
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array("page_slug" => form_error('edit_page_slug'),
		                             "page_title" => form_error('edit_page_title'),
		                             "page_content" => form_error('edit_page_content'),
		                             "stats"     => 1
		            ));
		    }else{
		      $info = array('page_slug' 			=> $this->input->post("edit_page_slug"),
		                     'page_title' 			=> $this->input->post("edit_page_title"),
		                     'page_content' 		=> $this->input->post("edit_page_content"),
		                     'page_meta_title' 		=> $this->input->post("edit_page_meta_title"),
		                     'page_meta_keyword' 	=> $this->input->post("edit_page_meta_keyword"),
		                     'page_meta_desc' 		=> $this->input->post("edit_page_meta_desc"),
		                     'created_by'  			=> $this->session->userdata('user_id'),
		                     'page_active'			=> $this->input->post("edit_page_active"),
		                     );


		      $this->pages_model->updatePage($info, $this->input->post("page_idPK"));

		      //pr($this->input->post("page_idPK")); exit();

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Page successfully updated!</div>');
		      echo json_encode(array("stats" => 0, 'page' => base_url('pages/editpage/'.$this->input->post("page_idPK"))));
		    }
	  }else{
	    redirect(base_url("pages"));
	  }
	 }

	 function deletePage(){

	  if($this->input->post()){
		$this->pages_model->deletePage($this->input->post("page_idPK"));

		$this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Page successfully deleted!</div>');
		echo json_encode(array("stats" => 0));
	  }else{
	    redirect(base_url("pages"));
	  }
	 }	 

}
