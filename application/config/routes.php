<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['home']='Halaman/view';

$route['tabelrule']='Dataknowledge_control/dataRule';
$route['tabelrule/(:any)']='Dataknowledge_control/dataRule/$1';
$route['tambahRule']='Dataknowledge_control/tambahRule';
$route['deleteRule/(:any)']='Dataknowledge_control/deleteRule/$1';
$route['updateRule/(:any)']='Dataknowledge_control/updateRule/$1';

$route['tabelpertanyaan']='Dataknowledge_control/dataPenyakit';
$route['tambahPertanyaan']='Dataknowledge_control/tambahPertanyaan';
$route['tabelpertanyaan/(:any)']='Dataknowledge_control/dataPenyakit/$1';
$route['deletePertanyan/(:any)']='Dataknowledge_control/deletePertanyaan/$1';
$route['updatePertanyaan/(:any)']='Dataknowledge_control/updatePertanyaan/$1';

$route['tabelpenyakit']='Dataknowledge_control/dataTabelPenyakit';
$route['tabelpenyakit/(:any)']='Dataknowledge_control/dataTabelPenyakit/$1';
$route['tambahPenyakit']='Dataknowledge_control/tambahPenyakit';
$route['deletePenyakit/(:any)']='Dataknowledge_control/deletePenyakit/$1';
$route['updatePenyakit/(:any)']='Dataknowledge_control/updatePenyakit/$1';

$route['tabelgejala']='Dataknowledge_control/dataGejala';
$route['tabelgejala/(:any)']='Dataknowledge_control/dataGejala/$1';
$route['tambahGejala']='Dataknowledge_control/tambahGejala';
$route['deleteGejala/(:any)']='Dataknowledge_control/deleteGejala/$1';
$route['updateGejala/(:any)']='Dataknowledge_control/updateGejala/$1';


$route['konsultasi'] = 'Konsultasi_control/konsultasi';
$route['profile'] = 'Profile_control/edit_profile';
$route['konsultasi/(:any)'] = 'Konsultasi_control/konsultasi/$1';
$route['index.php/Konsultasi_control/konsultasi_backwardchaining/(:any)'] = 'Konsultasi_control/konsultasi_backwardchaining/$1';
$route['signOut'] = 'Login/logout';
$route['default_controller'] ='Halaman/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
