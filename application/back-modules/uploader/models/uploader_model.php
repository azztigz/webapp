<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function insertImage($data){
		$this->db->insert('app_gallery', $data); 
	}

	function deleteImageFromDB($filename){
        $this->db->delete('app_gallery', array('name' => $filename));
    }
}
