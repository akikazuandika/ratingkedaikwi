<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['api/store/id/:any'] = 'api/getStoreById';
$route['api/store/rate'] = 'api/rate';
$route['admin/store/id/:any'] = 'admin/getStoreById';
$route['admin/store/edit/:any'] = 'admin/editStore';
$route['admin/store/delete/:any'] = 'admin/deleteStore';
$route['admin/store/add'] = 'admin/addStore';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
