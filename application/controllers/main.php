<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
    function __construct(){
        parent::__construct();
    }
//function to load the home page in site, it loads the slider view and and news from database
function index(){
	
	$data=array();
	$this->load->view('templates/header');//load view header
	$this->slider();//calls the function that loads the view to show slider
	if($query=$this->site_model->get_news())//checks if the result exists and fills the array
	{
		$data['news']=$query;
		}
	
	$this->load->view('home',$data);//load view and pass array
	$this->load->view('templates/footer');//load view footer
}
//function to get pictures to slider in home page
function slider()
	{
	$seg='slides';
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slider',$data);		
		}
//loads about view
function about(){
    $this->load->view('templates/header');//header
    $this->load->view('about');//about page
	$this->load->view('templates/footer');//footer
}


function services(){
	$this->load->view('templates/header');
    $this->load->view('services');
	$this->load->view('templates/footer');
}

/*function cv(){
	echo '<a href="cv.pdf" target="_blank">My PDF file</a>';
	}*/

function art(){
	$this->load->view('templates/header');
    $this->load->view('art');
	//$this->load->view('artslides/gallery');
	$this->load->view('templates/footer');
	
}

function it(){
	$this->load->view('templates/header');
    $this->load->view('it/it');
	//$this->load->view('it/it_data');
	$this->load->view('templates/footer');
}

function login(){
	$this->load->view('templates/header');
    $this->load->view('login_form');
	$this->load->view('templates/footer');
}
//config.php sess_encryp_cookie ->true for it to work
//function that checks if there is a user logged in
function is_logged_in(){
	$is_logged_in=$this->session->userdata('is_logged_in');//sets the variable to session data 'is_logged_in' thats is set in members area
	if(!isset($is_logged_in)|| $is_logged_in!=true){ //checks if variable is set or doesnt equal true
		
		echo 'You do not have access to this page.';
		echo anchor('main/index','Home');
		die();
		}
	}
//function to check if logged in user is admin or not
function is_admin(){
	$is_admin=$this->session->userdata('is_admin');
	if(!isset($is_admin)|| $is_admin!=true){
		
		echo 'You do not have access to this page.';
		echo anchor('main/index','Home');
		die();
		}
	}

//function to kill session and logout
function logout(){
	$this->session->sess_destroy();
	$this->index();
	}
function admin(){
	$this->is_admin();//uses the is_admin function to see if the permission is granted
	$this->load->view('templates/header');
    $this->load->view('admin/admin');
	$this->load->view('templates/footer');
}

function upanel(){
	$this->is_logged_in();
	$this->load->view('templates/header');
    $this->load->view('upanel');
	$this->load->view('templates/footer');
}

function contact(){
	$this->load->view('templates/header');
    $this->load->view('contact');
	$this->load->view('templates/footer');
	}
	
function mail_send(){
	
	//field name, error msg, rule itself
	$this->form_validation->set_rules('name','Name','trim|required');
	$this->form_validation->set_rules('subject','Subject','trim|required');
	$this->form_validation->set_rules('mail','E-mail','trim|required|valid_email');
	$this->form_validation->set_rules('message','Message','trim|required');
	//checks if validation is correct, if not the form is reloaded
	if($this->form_validation->run()==FALSE){
		$this->contact();
		}
	else{
		//$this->load->library('email',$config);
		//loads the email library
	$this->load->library('email');
	//sets the new line
	$this->email->set_newline("\r\n");
	//email parts
	$this->email->from($this->input->post('mail'),$this->input->post('name'));
	$this->email->to('timosoiunen@gmail.com');
	$this->email->subject($this->input->post('subject'));
	$this->email->message($this->input->post('message'));
	//sends the mail or shows error
		if($this->email->send()){
			echo 'sent';
			}
		else{
			show_error($this->email->print_debugger());
			}
		}
	}
}
?>