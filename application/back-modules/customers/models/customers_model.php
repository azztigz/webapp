<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customers_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function getCustomers($offset = null, $limit = null){

		$this->db->select('app_users.user_id');
		$this->db->select('app_users.user_email');
		$this->db->select("CONCAT(app_users.user_fname,' ',app_users.user_lname) as name", FALSE);
		$this->db->select('app_users.user_fname');
		$this->db->select('app_users.user_lname');
		$this->db->select('app_users.user_date_added');
		$this->db->select('app_users.user_bdate');
		$this->db->select('app_users.user_phone');
		$this->db->select('app_users.user_address');

		$res = $this->db->get('app_users', $limit, $offset);
		
		return $res;
	}

	function saveCustomer($data){
		$this->db->insert('app_users', $data);
	}	

	function getCustomerUser($id){
		$this->db->where('app_users.user_id', $id);
		$res = $this->db->get('app_users'); 
		return $res->row();
	}

	function updateCustomer($data, $id){
		$this->db->where('user_id', $id);
		$this->db->update('app_users', $data); 
	}	

	function removeCustomer($id){
		$this->db->delete('app_users', array('user_id' => $id));
	}

}
