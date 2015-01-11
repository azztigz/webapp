<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigation_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function getPages(){
		$this->db->where('page_active', 1);
		
		$query = $this->db->get('app_pages');
		return $query->result();
	}

	function saveNavigation($data){
		$this->db->insert('app_navigations', $data);
		return $this->db->insert_id();
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

	function saveNavigationOrder($data){
		$this->db->where('order_idPK', 1);
		$this->db->update('app_navigations_order', $data);
	}

	function updateNavigation($id, $data){
		$this->db->where('nav_idPK', $id);
		$this->db->update('app_navigations', $data);
	}

	function deleteNav($id){
		$this->db->where('nav_idPK', $id);
		$this->db->delete('app_navigations'); 
	}
}
