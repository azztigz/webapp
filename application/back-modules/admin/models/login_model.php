<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $userinfo;
	
	function __construct(){
		parent::__construct();
	}	

	function login($email, $pass){
		$query = $this->db->query('SELECT * FROM admin_users WHERE admin_email ="'.$email.'" AND admin_password = "'.$pass.'"');
		$this->userinfo = $query->num_rows() > 0 ? $query->result()[0] : '';
		return $query->num_rows();
	}

}
