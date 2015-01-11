<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
		$this->load->model('gallery_model');
	}

	public function index(){
		$this->lists();
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
		
		$config["base_url"] = base_url() . "gallery/lists";
		
		$config["num_links"] = 3;
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		
		$offset = (int)$this->uri->segment(3) ?: 0;
		
		$data['gallery'] = $this->gallery_model->getGallery($offset, $config["per_page"]);
		
		$config["total_rows"] = $this->gallery_model->total_images;
		$this->pagination->initialize($config);
		//pr($data['gallery']);
		$data['from'] = $offset+1;
		$data['to'] = $offset + count($data['gallery']);
		$data['total'] = $config["total_rows"];

		loadBackLayout('gallery_view', $data);

	}

	function removeImage(){
	  if($this->input->post()){

	      $user_id = $this->gallery_model->delImage($this->input->post("id"));
	      
	      unlink(ltrim(parse_url($user_id->url)['path'],'/')); 
	      unlink(ltrim(parse_url($user_id->medium)['path'],'/')); 
	      unlink(ltrim(parse_url($user_id->thumbnail)['path'],'/')); 

	      $this->gallery_model->removeImage($this->input->post("id"));

	      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Image successfully remove!</div>');

	  }else{
	    redirect(base_url("gallery"));
	  }
	 }

}
