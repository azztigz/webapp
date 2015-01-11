<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function getAdmins($offset = null, $limit = null){

		$this->db->select('app_admin_users.admin_idPK');
		$this->db->select('app_admin_users.admin_email');
		$this->db->select("CONCAT(app_admin_users.admin_fname,' ',app_admin_users.admin_lname) as name", FALSE);
		$this->db->select('app_admin_users.admin_fname');
		$this->db->select('app_admin_users.admin_lname');
		$this->db->select('app_admin_users.admin_date_added');

		$res = $this->db->get('app_admin_users', $limit, $offset);
		
		return $res;
	}

	function saveAdmin($data){
		$this->db->insert('app_admin_users', $data);
	}	

	function getAdminUser($id){
		$this->db->where('app_admin_users.admin_idPK', $id);
		$res = $this->db->get('app_admin_users'); 
		return $res->row();
	}

	function updateAdmin($data, $id){
		$this->db->where('admin_idPK', $id);
		$this->db->update('app_admin_users', $data); 
	}	

	function removeAdmin($id){
		$this->db->delete('app_admin_users', array('admin_idPK' => $id));
	}

}
