<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}	

	public function getPages($id=null,$limit=null,$offset=null){
		
		if(is_numeric($id) && $id > 0) {
			$this->db->where('page_idPK', $id);
		}elseif(is_array($id)) {
			$this->db->where_in('page_idPK', $id);
		}

		return $this->db->get('app_pages');
	}

	function savePage($data){
		$this->db->insert('app_pages', $data);
	}

	function updatePage($data, $id){
		$this->db->where('page_idPK', $id);
		$this->db->update('app_pages', $data);
	}

	function deletePage($id){
		$this->db->where('page_idPK', $id);
		$this->db->delete('app_pages'); 
	}

}

/* End of file pages.php */
/* Location: ./application/models/pages.php */