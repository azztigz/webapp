<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function saveTheme($data){
		$this->db->insert('themes', $data);
	}

	function checkExist($theme){
		//$query = $this->db->query("SELECT * FROM app_themes WHERE theme_name = '" . $theme . "'");

		$this->db->where('theme_name', $theme);
		
		$query = $this->db->get('app_themes');

		return $query->result();
	}

	function getNavigation($id = null){
		if($id){
			$this->db->where('nav_idPK', $id);
		}
		$query = $this->db->get('app_navigations');
		return $query;
	}

	function getNavigationsOrder(){
		$this->db->where('order_idPK', 1);
		
		$query = $this->db->get('app_navigations_order');
		return $query->row();
	}
}
