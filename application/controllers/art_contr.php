<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Art_contr extends CI_Controller {
//constructor
function __construct(){
        parent::__construct();
    }
//fnctions to load pictures to view	
function tribal()
	{
		$this->load->view('templates/header');
	$seg=end($this->uri->segments); //takes the last segment from url
	$data=array();
	if($query=$this->site_model->get_art($seg))//if get result from model fill the array
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);//load the view with data from database	
	$this->load->view('templates/footer');	
		}
		
function ds2()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}
		
function cars()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}
		
function manga()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}
		
function port()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}

function rosario()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}

function other()
	{
		$this->load->view('templates/header');
		$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_art($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('artslides/slides',$data);	
	$this->load->view('templates/footer');		
		}
//function to get art, last segment of url is passed to the model function		
function get_art(){
	$seg=end($this->uri->segments);
	$this->site_model->get_art($seg);
		}
//function to reuse the model function gat_art, here the $seg equals a string whitch in database is reserved for hope page slider		
function get_slider(){
	$seg='slides';
	$this->site_model->get_art($seg);
	}

	}	
	?>