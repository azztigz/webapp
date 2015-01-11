<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notfound extends MX_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->output->set_status_header('404');
		loadBackLayout('notfound_view');
	}

}
