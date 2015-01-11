<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
	}

	public function index(){
		loadBackLayout('settings_view');
	}

}
