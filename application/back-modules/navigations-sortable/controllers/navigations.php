<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigations extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
	}

	public function index(){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
		loadBackLayout('navigations_view');
	}

	function sort(){
		$test = json_decode($this->input->post('string'));
		$test[] = array('id' => 21, 'children' => array(array('id'=>33)));
		$tests = json_encode($test);
		//pr(json_decode($this->input->post('string')));
		pr($tests);
		pr(json_decode($tests));
	}
}
