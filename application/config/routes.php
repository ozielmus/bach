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


$route['default_controller'] = "login";
$route['login'] = "admin/user/login";
$route['logout'] = "admin/user/logout";
$route['signup'] = "admin/user/signup";
$route['dashboard'] = "admin/dashboard";
$route['profile'] = "admin/profile";
$route['setting'] = "admin/setting";
$route['c/(:any)'] = "admin/user/confirm_account/$1";
$route['admin/profile/(:num)'] = "admin/profile/index/$1";
$route['404_override'] = "404";
$route['article/(:num)/(:any)'] = "article/index/$1/$2";


// URI like '/en/about' -> use controller 'about'
// $route['^(en|es)/(.+)$'] = "$2";

// // '/en', '/de', '/fr' and '/nl' URIs -> use default controller
// $route['^(en|es)$'] = $route['default_controller'];


/* End of file routes.php */
/* Location: ./application/config/routes.php */