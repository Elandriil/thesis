<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php 

class It_contr extends CI_Controller {
//constructor
function __construct(){
        parent::__construct();
    }

function data(){
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_info($seg))
	{
		$data['info']=$query;
		}
	$this->load->view('it/it_data',$data);
	}
function cat(){
	$seg=end($this->uri->segments);
	$data=array();
	$query=$this->site_model->get_cat($seg);
	
		$data['cat']=$query;
		
	$this->load->view('it/it_com',$data);
	}
function com(){
	$seg=end($this->uri->segments);
	$data=array();
	$query2=$this->site_model->get_cat($seg);
	$query=$this->site_model->get_pro_com($seg);
	
		$data['comments']=$query;
		$data['category']=$query2;
		
	$this->load->view('it/it_com',$data);
	}
	

function cs(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}
function vk(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
}
function js(){
	$this->load->view('templates/header');
	$this->data();
	$this->com();
	$this->load->view('templates/footer');
	}
function mvc(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}
function weather(){
	//$this->tst();
	
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}
function acc(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}
function html(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}
/*function java(){
	$this->load->view('templates/header');
	$this->data();
	$seg=end($this->uri->segments);
	$data=array();
	if($query=$this->site_model->get_pro_pic($seg))
	{
		$data['picture']=$query;
		}
	$this->load->view('it/it_pic',$data);
	$this->com();
	$this->load->view('templates/footer');
	}	
function get_pro_pic(){
	$seg=end($this->uri->segments);
	$this->site_model->get_pro_pic($seg);
		}	
function get_pro_info(){
	$seg=end($this->uri->segments);
	$this->site_model->get_pro_info($seg);
		}
function get_pro_com(){
	$seg=end($this->uri->segments);
	$this->site_model->get_pro_com($seg);
		}	*/
function add_com(){
	$this->form_validation->set_rules('name','Name','trim|required|min_lenght[6]|max_lenght[32]');
	$this->form_validation->set_rules('comment','Comment','trim|required');
	$this->form_validation->set_rules('avatar','Avatar','trim|required');
	
	if($this->form_validation->run()==FALSE){
		redirect('main/it');
		}
	else {
		if($query=$this->site_model->add_com()){
			$this->load->view('templates/header');
			$this->load->view('it/com_posted');
			$this->load->view('templates/footer');
			}
		else{
			redirect('main/it');
			}
		}
	}			
}