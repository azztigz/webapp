<?php 
	function pr($str){
		echo "<pre>";
			print_r($str);
		echo "</pre>";		
	}

	function loadLoginLayout($view, $data=false){
		$ci =& get_instance();
		$ci->load->view('login/header_view', $data);
		$ci->load->view($view, $data);
		$ci->load->view('login/footer_view', $data);
	}

	function loadBackLayout($view, $data=false){
		$ci =& get_instance();
		$ci->load->view('backend/header_view', $data);
		$ci->load->view($view, $data);
		$ci->load->view('backend/footer_view', $data);
	}
	
	function assets_url(){
		echo base_url().'assets/';
	}

	function elfinder_url(){
		echo base_url().'elfinder/';
	}

	function isLoggedIn(){
		$ci =& get_instance();
		if($ci->session->userdata('logged_in') != TRUE){
			redirect(base_url('login'));
	 	}
	}

	function menuActive(){
		$ci =& get_instance();
		$segment = $ci->uri->segment(1);

		$menu = array('dashboard' 		=> array('active'	=> '',
													'title'	=> 'Dashboard',
													'link' 	=> base_url('dashboard'),
													'icon'	=> '<span class="glyphicon glyphicon-stats"></span>',
													'sub' => 0),
					  'administrator' 	=> array('active'	=> '',
													'title'	=> 'Administrator',
													'link' 	=> base_url('administrator'),
													'icon'	=> '<span class="glyphicon glyphicon-user"></span>',
													'sub' => 0),
					  'customers'		=> array('active'	=> '',
					  								'title'	=> 'Customers',
													'link' 	=> base_url('customers'),
													'icon'	=> '<i class="fa fa-users"></i>',
													'sub' => 0),
					  'navigations'		=> array('active'	=> '',
					  								'title'	=> 'Navigations',
													'link' 	=> base_url('navigations'),
													'icon'	=> '<span class="glyphicon glyphicon-tasks"></span>',
													'sub' => 0),
					  'pages'			=> array('active'	=> '',
					  								'title'	=> 'Pages',
													'link' 	=> base_url('pages'),
													'icon'	=> '<i class="fa fa-file-text"></i>',
													'sub' => 0),
					  'blog'			=> array('active'	=> '',
					  								'title'	=> 'Blog',
													'link' 	=> base_url('blog'),
													'icon'	=> '<span class="glyphicon glyphicon-bullhorn"></span>',
													'sub' => 0,
													/*'submenu' => array('posts' => array('title' => 'Posts',
																						'link' 	=> base_url('blog'),
																						'icon'	=> '<i class="fa fa-list"></i>'),
																		'newpost' => array('title' => 'New Posts',
																						'link' 	=> base_url('blog/newPost'),
																						'icon'	=> '<i class="fa fa-envelope fa-fw"></i>'),
																		'categories' => array('title' => 'Categories',
																						'link' 	=> base_url('blog/categories'),
																						'icon'	=> '<i class="fa fa-bars"></i>'),
													)*/),
					  'gallery'			=> array('active'	=> '',
					  								'title'	=> 'Gallery',
													'link' 	=> base_url('gallery'),
													'icon'	=> '<span class="glyphicon glyphicon-picture"></span>',
													'sub' => 0),
					  'filemanager'		=> array('active'	=> '',
					  								'title'	=> 'File Manager',
													'link' 	=> base_url('filemanager'),
													'icon'	=> '<span class="glyphicon glyphicon-hdd"></span>',
													'sub' => 0),
					  'widget'			=> array('active'	=> '',
					  								'title'	=> 'Widget',
													'link' 	=> base_url('widget'),
													'icon'	=> '<span class="glyphicon glyphicon-tags"></span>',
													'sub' => 0)
				);
		
		if(array_key_exists($segment, $menu)){
			$menu[$segment]['active'] = 'active';
		}

		

		return $menu;
	}

	function messages(){
		$ci =& get_instance();
		if($ci->session->flashdata('message')){
			$message = $ci->session->flashdata('message');
			?>
				<script>	
					$(function(){
					      $('.messages').fadeIn('slow');
					});
				</script>
			<?php
			echo '<div class="col-xs-12 messages" style="display:none;">'.$message.'</div>';
		}
	}

	function panelColor(){
		echo "default";
	}

	/*function adminMainNav(){
		$ci =& get_instance();
		$ci->load->model('navigation_model');
		$mainmenu = $ci->navigation_model->getNavigationsOrder();
		$menu = json_decode($mainmenu->nav_order);
		$navs = $ci->navigation_model->getNavigations();

		foreach($navs as $key=>$nav){
			$n[$nav->nav_idPK] = $navs[$key]; 
		}

		$info = array('menu' => $menu,
					  'navs' => $n
					 );
		return $info;
	}*/
	

?>