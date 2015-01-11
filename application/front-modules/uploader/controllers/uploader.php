<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
		$this->load->view('uploader_view');
	}

	public function upload(){
		$this->load->helper('uploadhandler');
		$upload_handler = new UploadHandler();
	}
}
