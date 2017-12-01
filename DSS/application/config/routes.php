<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['manage_major'] = 'manage_major/list';
$route['edit_major/(:num)']='manage_major/edit/$1';
// $route['post_edit_major/(:num)']='manage_major/post_edit/$1';
$route['delete_major/(:num)']='manage_major/delete/$1';
$route['add_major']='manage_major/add';
$route['post_add_major']='manage_major/post_add';

$route['manage_school'] = 'manage_school/list';
$route['edit_school/(:num)']='manage_school/edit/$1';
$route['delete_school/(:num)']='manage_school/delete/$1';
$route['add_school']='manage_school/add';
$route['post_add_school']='manage_school/post_add';

$route['manage_env_var'] = 'manage_env_var/list';
$route['edit_env_var/(:num)']='manage_env_var/edit/$1';
$route['delete_env_var/(:num)']='manage_env_var/delete/$1';
$route['add_env_var']='manage_env_var/add';
$route['post_add_env_var']='manage_env_var/post_add';