<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//default
$route['default_controller'] 			= "page";

//admin login / logout
$route['login'] 						= "login";
$route['login/logout'] 					= "login/logout";

//admin
$route['dashboard'] 					= "dashboard";

//admin
$route['administrator'] 				= "administrator";
$route['administrator/lists'] 			= "administrator/lists";
$route['administrator/lists/(:num)'] 	= "administrator/lists/$1";
$route['administrator/saveAdmin'] 		= "administrator/saveAdmin";
$route['administrator/editAdmin'] 		= "administrator/editAdmin";
$route['administrator/updateAdmin'] 	= "administrator/updateAdmin";
$route['administrator/removeAdmin'] 	= "administrator/removeAdmin";

//admin customers
$route['customers'] 					= "customers";
$route['customers/lists'] 				= "customers/lists";
$route['customers/lists/(:num)'] 		= "customers/lists/$1";
$route['customers/saveCustomer'] 		= "customers/saveCustomer";
$route['customers/editCustomer'] 		= "customers/editCustomer";
$route['customers/updateCustomer'] 		= "customers/updateCustomer";
$route['customers/removeCustomer'] 		= "customers/removeCustomer";

//admin navigations
$route['navigations'] 					= "navigations/editnav";
$route['navigations/saveNavigation'] 	= "navigations/saveNavigation";
$route['navigations/editnav/(:num)'] 	= "navigations/editnav/$1";
$route['navigations/updateNavigation'] 	= "navigations/updateNavigation";
$route['navigations/sort'] 				= "navigations/sort";

//admin pages
$route['pages'] 						= "pages";
$route['pages/editpage'] 				= "pages/editpage";
$route['pages/editpage/(:num)'] 		= "pages/editpage/$1";
$route['pages/savePage'] 				= "pages/savePage";
$route['pages/updatePage'] 				= "pages/updatePage";
$route['pages/deletepage'] 				= "pages/deletepage";

//admin gallery
$route['gallery'] 						= "gallery";
$route['gallery/lists'] 				= "gallery/lists";
$route['gallery/lists/(:num)'] 			= "gallery/lists/$1";
$route['gallery/removeImage'] 			= "gallery/removeImage";
$route['uploader'] 						= "uploader";
$route['uploader/upload'] 				= "uploader/upload";

//admin blog
$route['blog'] 							= "blog";
$route['blog/newPost'] 					= "blog/newPost";
$route['blog/categories'] 				= "blog/categories";

//admin widget
$route['widget'] 						= "widget";

//admin filemanager
$route['filemanager'] 					= "filemanager";
$route['filemanager/elfinder_init'] 	= "filemanager/elfinder_init";

//admin settings
$route['settings'] 						= "settings";

//user login
$route['user/login'] 					= "user/login";

//use front end pages
$route['(:any)'] 						= "page/index/$1";


$route['404_override'] 					= '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */