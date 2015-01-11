<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect(base_url('login'));
	}

	
}
