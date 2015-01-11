<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filemanager extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
		$this->load->helper('path');
	}

	public function index(){
		loadBackLayout('filemanager_view');
	}

	function elfinder_init(){
	  	$opts = array(
			//'debug' => true,
			'bind' => array(
		        'duplicate' => 'mySimpleCallback'
		    ),
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',      // driver for accessing file system (REQUIRED)
					'path'          => set_realpath('files'),  // path to files (REQUIRED)
					'URL'           => base_url('files').'/',      // URL to files (REQUIRED)
					'alias'			=> 'Files',
					'accessControl' => 'access'                // disable and hide dot starting files (OPTIONAL)
				),
				array(
		            'driver'        => 'LocalFileSystem',
		            'path'          => set_realpath('files2'),  
					'URL'           => base_url('files2').'/',
					'alias'			=> 'Files',
		            'alias'         => 'Second files',
		            'accessControl' => 'access' 
		        ),
		        array(
		            'driver'        => 'LocalFileSystem',
		            'path'          => set_realpath('files3'), 
					'URL'           => base_url('files3').'/',
					'alias'			=> 'Files',
		            'alias'         => 'Third files',
		            'accessControl' => 'access' 
		        ),
			)
		);

		  $this->load->library('Elfinder_lib', $opts);
	}

}
