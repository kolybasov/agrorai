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
$route['admin/orders/(:any)'] = 'admin/admin/index/orders/$1';
$route['admin/orders_manipulating'] = 'admin/admin/orders_manipulating';
$route['admin/info_validator'] = 'admin/admin/info_validator';
$route['admin/price_validator'] = 'admin/admin/price_validator';
$route['admin/auth/logout'] = 'admin/auth/logout';
$route['admin/auth/register'] = 'admin/auth/register';
$route['admin/auth/login'] = 'admin/auth/login';
$route['admin/order/(:num)'] = 'admin/admin/view_order/$1';
$route['admin'] = 'admin/admin/index/admin';
$route['admin/(:any)'] = 'admin/admin/index/$1';
$route['pages/validator'] = 'pages/validator';
$route['pages/captcha'] = 'pages/captcha';
$route['(:any)'] = 'pages/index/$1';
$route['default_controller'] = 'pages/index';
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */