<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function insertImage($data){
		$this->db->insert('gallery', $data); 
	}

	function deleteImageFromDB($filename){
        $this->db->query("DELETE from gallery WHERE `name` = '".$filename."'");
    }
}
