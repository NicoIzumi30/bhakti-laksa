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
$route['default_controller'] = 'DashboardController';
$route['404_override'] = '';
$route['dashboard'] = 'DashboardController';

// Program Studi
$route['program-studi'] = 'ProgramStudiController';
$route['program-studi/store'] = 'ProgramStudiController/store';
$route['program-studi/update/(:any)'] = 'ProgramStudiController/update/$1';
$route['program-studi/delete/(:any)'] = 'ProgramStudiController/destroy/$1';

$route['dosen'] = 'DosenController';
$route['dosen/create'] = 'DosenController/create';
$route['dosen/store'] = 'DosenController/store';
$route['dosen/edit/(:any)'] = 'DosenController/edit/$1';
$route['dosen/update/(:any)'] = 'DosenController/update/$1';
$route['dosen/delete/(:any)'] = 'DosenController/destroy/$1';

// Matakuliah
$route['mata-kuliah'] = 'MataKuliahController';
$route['mata-kuliah/create'] = 'MataKuliahController/create';
$route['mata-kuliah/store'] = 'MataKuliahController/store';
$route['mata-kuliah/edit/(:any)'] = 'MataKuliahController/edit/$1';
$route['mata-kuliah/delete/(:any)'] = 'MataKuliahController/destroy/$1';
$route['mata-kuliah/student-course/(:any)'] = 'MataKuliahController/studentCourse/$1';
$route['mata-kuliah/student-course/create/(:any)'] = 'MataKuliahController/studentCourseCreate/$1';
$route['mata-kuliah/student-course/delete/(:any)/(:any)'] = 'MataKuliahController/studentCourseDestroy/$1/$2';

// Mahasiswa
$route['mahasiswa'] = 'MahasiswaController';
$route['mahasiswa/create'] = 'MahasiswaController/create';
$route['mahasiswa/store'] = 'MahasiswaController/store';
$route['mahasiswa/edit/(:any)'] = 'MahasiswaController/edit/$1';
$route['mahasiswa/update/(:any)'] = 'MahasiswaController/update/$1';
$route['mahasiswa/delete/(:any)'] = 'MahasiswaController/destroy/$1';


$route['penilaian'] = 'PenilaianController';
$route['penilaian/create/(:any)'] = 'PenilaianController/create/$1';
$route['penilaian/detail/(:any)'] = 'PenilaianController/detail/$1';
$route['penilaian/store'] = 'PenilaianController/store';
$route['penilaian/edit/(:any)/(:any)'] = 'PenilaianController/edit/$1/$2';
$route['penilaian/update/(:any)'] = 'PenilaianController/update/$1';
$route['penilaian/delete/(:any)'] = 'PenilaianController/destroy/$1';

// Profile
$route['profile'] = 'ProfileController';
$route['profile/update'] = 'ProfileController/update';
$route['profile/change-password'] = 'ProfileController/change_password';


$route['detail-penilaian/(:any)'] = 'PenilaianController/detail/$1';
$route['login'] = 'AuthController';
$route['logout'] = 'AuthController/logout';

$route['translate_uri_dashes'] = FALSE;
