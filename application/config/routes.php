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


$route['default_controller'] = "welcome";
$route['404_override'] = '';
*/
//my custom routes
$route['default_controller'] = "main";
$route['about'] = "main/about";
$route['services'] = "main/services";
$route['art']="main/art";
$route['it']="main/it";
$route['login']="main/login";
$route['upanel']="main/upanel";
$route['admin']="main/admin";
$route['contact']="main/contact";

//art routes
$route['tribal']="art_contr/ds2";
$route['manga']="art_contr/manga";
$route['tribal']="art_contr/tribal";
$route['port']="art_contr/port";
$route['rosario']="art_contr/rosario";
$route['other']="art_contr/other";
$route['cars']="art_contr/cars";
//login routes
$route['logon']="login/logon";
$route['logout']="main/logout";

//it routes
$route['cs']="it_contr/cs";
$route['vk']="it_contr/vk";
$route['js']="it_contr/js";
$route['mvc']="it_contr/mvc";
$route['weather']="it_contr/weather";
$route['acc']="it_contr/acc";
$route['html']="it_contr/html";
$route['java']="it_contr/java";

//admin routes
$route['news']="news/index";
$route['pictures']="pics/index";
$route['categories']="categ/index";
$route['comments']="coms/index";
$route['programs']="prog/index";
$route['slider']="slider/index";
$route['upload']="upload/index";
/* End of file routes.php */
/* Location: ./application/config/routes.php */