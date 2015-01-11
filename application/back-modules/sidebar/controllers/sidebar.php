<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sidebar extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('sidebar_view');
	}	

}
