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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['home'] = 'home/index';
$route['Pinjaman_controller'] = 'Pinjam_controller/index';
$route['auth/login'] = 'auth/login';
$route['Pinjaman'] = 'Pinjaman_controller';
$route['Pinjaman/create'] = 'Pinjaman_controller/create';
$route['auth/signup'] = 'auth/signup';
$route['Pinjaman/view_by_anggota_id/(:num)'] = 'Pinjaman_controller/view_by_anggota_id/$1';
$route['anggota/create'] = 'anggota/create';
$route['Pembayaran_pinjaman'] = 'Pembayaran_pinjaman';
$route['Pembayaran_pinjaman/proses_pembayaran'] = 'pembayaran_pinjaman/proses_pembayaran';
$route['Simpanan'] = 'Simpanan_controller';
$route['Simpanan/create'] = 'Simpanan_controller/create';
$route['Simpanan/view_by_anggota_id/(:num)'] = 'Simpanan_controller/view_by_anggota_id/$1';
$route['Pembayaran_pinjaman/view_by_anggota_id/(:num)'] = 'Pembayaran_pinjaman/view_by_anggota_id/$1';
$route['404_override'] = '';
$route['admin/login'] = 'admin/login';
$route['admin/register_admin'] = 'admin/register_admin';
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/anggota'] = 'admin/anggota';
$route['admin/anggota/edit/(:num)'] = 'admin/anggota/edit/$1';
$route['admin/anggota/delete/(:num)'] = 'admin/anggota/delete/$1';
$route['admin/delete_anggota/'] = 'admin/delete_anggota/';
$route['admin/pinjaman'] = 'admin/pinjaman';
$route['admin/pinjaman/edit/(:num)'] = 'admin/pinjaman/edit/$1';
$route['admin/pinjaman/delete/(:num)'] = 'admin/pinjaman/delete/$1';
$route['admin/pembayaran'] = 'admin/pembayaran';
$admin['admin/get_anggota_by_user_id/(:num)'] = 'admin/get_anggota_by_user_id/$1';
$admin['admin/get_anggota_by_user_id/'] = 'admin/get_anggota_by_user_id/';
$route['admin/update_anggota'] = 'admin/update_anggota';
$route['admin/simpanan'] = 'admin/simpanan';
$route['translate_uri_dashes'] = FALSE;