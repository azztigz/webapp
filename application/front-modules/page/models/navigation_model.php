<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
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
