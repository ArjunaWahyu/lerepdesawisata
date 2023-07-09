<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'site';
$route['news'] = 'budaya';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['read/(:any)'] = 'site/read/$1';