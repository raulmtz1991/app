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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'home';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "home" class
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
$route['404_override'] = '';


$route['agregar-paciente'] = "pacientes/paciente/formPaciente";
$route['listar-paciente'] = "pacientes/Paciente/formListarPaciente";
$route['actualizar-historia/(:num)'] = "pacientes/Paciente/formHistoriaClinica/$1";
$route['ver-pacientes']="pacientes/paciente/datatable";
$route['guardar-paciente']="pacientes/paciente/addOrUpdate";

$route['buscar-paciente/(:any)']='pacientes/paciente/autocomplete/$1';
$route['actualizar-paciente/(:num)'] = "pacientes/paciente/get/$1";
$route['eliminar-paciente/(:num)'] = "pacientes/paciente/delete/$1";
$route['agregar-enfermedad'] = "pacientes/enfermedad/addOrUpdate";

$route['editar-enfermedad/(:num)'] = "pacientes/enfermedad/get/$1";
$route['subir-ecografia'] = "ecografia/ecografia/uploadEcografia";

$route['eliminar-ecografia/(:num)/(:num)/(:any)'] = "ecografia/ecografia/delete/$1/$2/$3";
$route['subir-informe'] = "pacientes/informe/uploadInforme";
$route['eliminar-informe/(:num)/(:num)/(:any)'] = "pacientes/informe/delete/$1/$2/$3";
$route['listar-informe/(:num)'] = "pacientes/informe/datatable/$1";
$route['subir-rayosx'] = "rayosx/rayosx/uploadRayosx";
$route['eliminar-rayosx/(:num)/(:num)/(:any)'] = "rayosx/rayosx/delete/$1/$2/$3";

$route['agregar-medico'] = "medico/medico/formMedico";
$route['guardar-medico'] = "medico/medico/addOrUpdate";
$route['actualizar-medico/(:num)'] = "medico/medico/get/$1";
$route['eliminar_medico/(:num)/(:num)'] = "medico/medico/delete/$1/$2";
$route['listar-medico'] = "medico/medico/formListarMedico";
$route['ver-medico'] = "medico/medico/datatable";

$route['agregar-secretaria'] = "secretaria/secretaria/formSecretaria";
$route['guardar-secretaria'] = "secretaria/secretaria/addOrUpdate";
$route['listar-secretaria'] = "secretaria/secretaria/formListarSecretaria";
$route['ver-secretaria']='secretaria/secretaria/datatable';
$route['actualizar_secretaria/(:num)'] = "secretaria/secretaria/get/$1";

$route['eliminar_secretaria/(:num)/(:num)'] = "secretaria/secretaria/delete/$1/$2";

$route['calendario-citas'] = "cita/cita/cita_medica";
$route['agregar-cita'] = "cita/cita/addOrUpdate";
$route['buscar-cita'] = "cita/cita/autocomplete";
$route['listar-cita'] = "cita/cita/getAll";
$route['eliminar-cita/(:num)'] = "cita/cita/delete/$1";
$route['mover-cita/(:num)/(:any)/(:any)'] = "cita/cita/move/$1/$2/$3";
$route['agrandar-cita/(:num)/(:any)'] = "cita/cita/resize/$1/$2/";
$route['lista-por-especialidad']="medico/medico/getByEspecialidad";

$route['buscar-dni/(:num)']="secretaria/secretaria/buscar_dni/$1";
$route['buscar-paciente-existe/(:any)']="pacientes/paciente/get_paciente/$1";