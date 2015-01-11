<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Navigations extends MX_Controller {

	function __construct(){
		parent::__construct();
		isLoggedIn();
		$this->load->model('navigation_model');
	}

	/*public function index(){
		//pr($this->session->userdata('user_id'));
		//pr($this->session->all_userdata());
		//$data['pages'] = $this->navigation_model->getPages();
		//$data['navigations'] = $this->navigation_model->getNavigations();
		//loadBackLayout('navigations_view', $data);

		$this->editnav($id = null);
	}*/

	function saveNavigation(){
		/*pr($this->input->post());
		exit();*/
	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    $this->form_validation->set_rules('nav_title', 'Title', 'required|xss_clean|trim|is_unique[app_navigations.nav_title]');
	    $this->form_validation->set_rules('nav_slug', 'Slug', 'required|xss_clean|trim|is_unique[app_navigations.nav_slug]');
	    $this->form_validation->set_rules('nav_page', 'Page', 'required');
	    
	    $this->form_validation->set_message('is_unique', '%s already used.');
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array("nav_title" 	=> form_error('nav_title'),
		                             "nav_slug" 	=> form_error('nav_slug'),
		                             "nav_page" 	=> form_error('nav_page'),
		                             "stats"    	=> 1
		            ));
		    }else{
		      $navigation = array('nav_title' 		=> $this->input->post("nav_title"),
			                     'nav_slug' 		=> $this->input->post("nav_slug"),
			                     'page_idFK' 		=> $this->input->post("nav_page"),
			                     'created_by'  		=> $this->session->userdata('user_id'),
			                     'nav_active'  		=> $this->input->post("nav_active")
			                     );

		      $nav_id = $this->navigation_model->saveNavigation($navigation);

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Navigation successfully saved!</div>');
		      echo json_encode(array("stats" => 0,
		      						 "id" => $nav_id));
		    }
	  }else{
	    redirect(base_url("navigations"));
	  }
	}

	function updateNavigation(){
	  if($this->input->post()){
	    $this->form_validation->set_error_delimiters('<p class="alert alert-danger">', '</p>');
	    
	    $this->form_validation->set_rules('edit_nav_title', 'Title', 'required|xss_clean|trim');
	    $this->form_validation->set_rules('edit_nav_slug', 'Slug', 'required|xss_clean|trim');
	    $this->form_validation->set_rules('edit_nav_page', 'Page', 'required');
	    
	    $this->form_validation->set_message('required', '%s is required');

		    if ($this->form_validation->run() == FALSE){
		      echo json_encode(array("edit_nav_title" 	=> form_error('edit_nav_title'),
		                             "edit_nav_slug" 	=> form_error('edit_nav_slug'),
		                             "edit_nav_page" 	=> form_error('edit_nav_page'),
		                             "stats"    	=> 1
		            ));
		    }else{
		      $navigation = array('nav_title' 		=> $this->input->post("edit_nav_title"),
			                     'nav_slug' 		=> $this->input->post("edit_nav_slug"),
			                     'page_idFK' 		=> $this->input->post("edit_nav_page"),
			                     'nav_active'  		=> $this->input->post("edit_nav_active")
			                     );
		      $nav_id = $this->input->post('edit_nav_id');
		      $this->navigation_model->updateNavigation($nav_id, $navigation);

		      $this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Navigation successfully updated!</div>');
		      echo json_encode(array("nav_title" => $this->input->post("edit_nav_title"),
		      						 "nav_slug"	 => $this->input->post("edit_nav_slug"),
		      						 "stats" => 0, 
		      						 "link" => $nav_id
		      						 )
		      				  );
		    }
	  }else{
	    redirect(base_url("navigations"));
	  }
	 }

	function sort(){
		if($this->input->post()){
			$menu = json_decode($this->input->post('string'));

				switch($this->input->post('type')){
					case 'create':
							$menu[] = array('id' => $this->input->post('nav_id'));
						break;
					case 'delete':
							$search = $this->input->post('nav_id');

							foreach($menu as $k=>$main){
								
							    if($main->id == $search){
						        	unset($menu[$k]);
						        	$this->navigation_model->deleteNav($search);
						    	}
						    		if(isset($main->children)){
							    		foreach($main->children as $c=>$child){
										    if($child->id == $search){
									        	unset($menu[$k]->children[$c]);
									        	if(count($main->children) == 0){
									        		unset($menu[$k]->children);
									        	}
									        	$this->navigation_model->deleteNav($search);
									    	}
										}
									}
							}
							$this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Navigation successfully deleted!</div>');
						break;
					default:
						$this->session->set_flashdata('message', '<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>Navigation successfully saved!</div>');
						break;
				}

			$menus = json_encode($menu);

			$data = array('nav_order' => $menus);

			$this->navigation_model->saveNavigationOrder($data);
		}else{
			redirect(base_url("navigations"));
		}
	}

	function editnav($id = null){
		if($id){
			$na = $this->navigation_model->getNavigation($id);
			$data['navs'] = $na->row();
		}else{
			$data['navs'] = 0;
		}

		$data['menu'] = $this->getMenu();
		$data['pages'] = $this->navigation_model->getPages();
		$data['navigations'] = $this->navigation_model->getNavigation()->row();
		loadBackLayout('navigations_view', $data);
	}

	function getMenu(){
		$mainmenu = $this->navigation_model->getNavigationsOrder();
		$menu = json_decode($mainmenu->nav_order);
		$navs = $this->navigation_model->getNavigation()->result();

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

}
