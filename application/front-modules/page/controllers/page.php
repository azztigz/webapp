<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MX_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('page_model');
	}

	public function index($page = false){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
		$data['navigation'] = $this->getMenu();
		//pr($page);
		$this->saveTheme();
		loadFrontLayout('themes/default/content_view', $data);
		
	}

	function getMenu(){
		$mainmenu = $this->page_model->getNavigationsOrder();
		$menu = json_decode($mainmenu->nav_order);
		
		$navs = $this->page_model->getNavigation()->result();

		foreach($navs as $key=>$nav){
			$n[$nav->nav_idPK] = $navs[$key]; 
		}

		foreach($menu as $key=>$men){
			$menu[$key]->info = $n[$men->id];
			if(isset($men->children)){
				foreach($men->children as $key2=>$child){
					$menu[$key]->children[$key2]->info = $n[$child->id];
				}
			}
		}

		return $menu;
	}

	function saveTheme(){
		$directory = "application/views/themes/";
		
		if (file_exists($directory)){
			$folders = scandir($directory);
			
			foreach ($folders as $ff)
			{
				
				// if ($ff != '.' && $ff != '..' AND is_dir($directory. $ff))
        	if (substr($ff, 0, 1) != '.' AND is_dir($directory. $ff))
				{
					$check = $this->page_model->checkExist($ff);
					if (count($check) == 0)
					{
						$data = array("theme_name" => $ff);
						$this->page_model->saveTheme($data);
					}
				}
			}
	
			/*$themes = $this->theme_model->getLeadpagesThemes();
			$default = $this->theme_model->getTheme($this->session->userdata('user_id'));
	
			$data = array(
				"path" => $directory,
				"themes" => $themes,
				"default" => $default["theme_id"]
			);
	
			return $data;*/
		}
		
		return FALSE;	

	}
}
