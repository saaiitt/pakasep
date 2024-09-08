<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['administrator/login'] = 'admin/auth';
$route['administrator/login/process'] = 'admin/auth/process_login';
$route['administrator/logout'] = 'admin/auth/logout';

$route['dashboard'] = 'admin/dashboard';

$route['data-kerusakan'] = 'admin/data_kerusakan';
$route['data-kerusakan/insert'] = 'admin/data_kerusakan/insert';
$route['data-kerusakan/edit/(:any)'] = 'admin/data_kerusakan/edit/$1';
$route['data-kerusakan/delete/(:any)'] = 'admin/data_kerusakan/delete/$1';


$route['data-gejala'] = 'admin/data_gejala';
$route['data-gejala/insert'] = 'admin/data_gejala/insert';
$route['data-gejala/edit/(:any)'] = 'admin/data_gejala/edit/$1';
$route['data-gejala/delete/(:any)'] = 'admin/data_gejala/delete/$1';

$route['data-rule'] = 'admin/data_rule';
$route['data-rule/insert'] = 'admin/data_rule/insert';
$route['data-rule/edit/(:any)'] = 'admin/data_rule/edit/$1';
$route['data-rule/delete/(:any)'] = 'admin/data_rule/delete/$1';

$route['data-riwayat'] = 'admin/data_riwayat';
$route['data-riwayat/print'] = 'admin/cetak/data_riwayat';
$route['data-riwayat/pdf'] = 'admin/cetak/pdf';
$route['data-riwayat/delete/(:any)'] = 'admin/data_riwayat/delete/$1';

$route['data-pasien'] = 'admin/data_pasien';
$route['data-pasien/edit/(:any)'] = 'admin/data_pasien/edit/$1';
$route['data-pasien/delete/(:any)'] = 'admin/data_pasien/delete/$1';

$route['data-admin'] = 'admin/data_admin';
$route['data-admin/insert'] = 'admin/data_admin/insert';
$route['data-admin/edit/(:any)'] = 'admin/data_admin/edit/$1';
$route['data-admin/delete/(:any)'] = 'admin/data_admin/delete/$1';

$route['data-berita'] = 'admin/data_berita';
$route['data-berita/insert'] = 'admin/data_berita/insert';
$route['data-berita/edit/(:any)'] = 'admin/data_berita/edit/$1';
$route['data-berita/delete/(:any)'] = 'admin/data_berita/delete/$1';


$route['berita'] = 'Berita';
$route['detail-berita/(:any)'] = 'Berita/detail_berita/$1';
$route['contact'] = 'Contact';
$route['periksa'] = 'Periksa';

$route['periksa/delete'] = 'Periksa/delete';
$route['periksa/step1'] = 'Periksa/insert_one';
$route['periksa/step2'] = 'Periksa/insert_two';
