<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_Model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}	

	function getGallery($offset, $limit){
		$qry = "SELECT 	
						id,
						name,
						size,
						type,
						url,
						medium,
						thumbnail
					FROM 
						app_gallery";
		
		$res = $this->db->query($qry);
		$this->total_images = $res->num_rows();
		
		$qry .=	" ORDER BY date_created ASC LIMIT ?,?";
		$res = $this->db->query($qry, array($offset, $limit));
		return $res->result();
	}

	function delImage($id){
		$qry = "SELECT 	
						id,
						name,
						size,
						type,
						url,
						medium,
						thumbnail
					FROM 
						app_gallery 
					WHERE 
						id = $id";
		
		$res = $this->db->query($qry);
		$image = $res->result()[0];

		return $image;
	}

	function removeImage($id){
		$this->db->delete('app_gallery', array('id' => $id));
	}

}
