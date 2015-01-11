<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function getTheme(){
		$this->db->where('theme_active', 1);
		
		$query = $this->db->get('app_themes');
		return $query->row();
	}


}
