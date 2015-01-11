<?php 
	/*function cms_css($file=null){
		$url = base_url().'application/views/'.cms_get_theme().'/assets/css/'.$file;
		return $url;
	}

	function cms_js($file=null){
		$url = base_url().'application/views/'.cms_get_theme().'/assets/js/'.$file;
		return $url;
	}

	function cms_img($file=null){
		$url = base_url().'application/views/'.cms_get_theme().'/assets/img/'.$file;
		return $url;
	}

	function cms_get_theme(){
		$CI =& get_instance();
		$CI->load->model('cms_themes_model');
		$thm = $CI->cms_themes_model->read(cms_settings('site_theme'))->row_array();
		return $thm['thm_slug'];
	}
	
	function loadFrontLoginLayout($view, $data=false){
		$ci =& get_instance();
		$ci->load->view('login/header_view', $data);
		$ci->load->view($view, $data);
		$ci->load->view('login/footer_view', $data);
	}
*/	
	function getThemeFolder(){
		$ci =& get_instance();
		$ci->load->model('theme_model');
		$theme = $ci->theme_model->getTheme();
		return 'themes/'.$theme->theme_name;
	}

	function getThemeFolderPath(){
		return base_url().'application/views/'.getThemeFolder().'/';
	}

	function theme_assets_url(){
		return getThemeFolderPath().'assets/';
	}

	function loadFrontLayout($view, $data=false){
		$ci =& get_instance();
		$ci->load->view(getThemeFolder().'/header_view', $data);
		$ci->load->view($view, $data);
		$ci->load->view(getThemeFolder().'/footer_view', $data);
	}
	
	function isFrontLoggedIn(){
		$ci =& get_instance();
		if($ci->session->userdata('user_in') != 1){
			redirect(base_url('user'));
	 	}
	}

?>