<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
class Login extends CI_Controller{

	function logon(){
		$this->load->view('templates/header');
    	$this->load->view('login_form');
		$this->load->view('templates/footer');
	}
	
	function validate_credentials(){
		$query=$this->members_model->validate();
		
		if($query){
		$row=$query->row();
			$data=array(
						'usern'=>$this->input->post('usern'),
						'is_logged_in'=>true,
						'is_admin'=>$row->is_admin
						);
						$this->session->set_userdata($data);
						redirect('main/admin');
			}
			else {
				$this->logon();
				}
		}
		
	function signup(){
		$this->load->view('templates/header');
    	$this->load->view('signup');
		$this->load->view('templates/footer');
		}
	
	function create_user(){
		//$this->load->library('form_validation');
		
		//rules: field, error msg, rule
		$this->form_validation->set_rules('usern','Username','trim|required|min_lenght[6]|max_lenght[32]');
		$this->form_validation->set_rules('pass','Password','trim|required');
		$this->form_validation->set_rules('mail','E-mail','trim|required|valid_email');
		$this->form_validation->set_rules('pass2','Password Confirmation','trim|required|matches[pass]');
		
		if($this->form_validation->run()==FALSE){
			$this->signup();
			//$this->load->view('signup_form');
			}
		else {
			//$this->load->model('members_model');
			if($query=$this->members_model->create_member()){
				$this->load->view('signup_ok');
				}
			else{
				$this->load->view('signup');
				}
			}
		}
}
?>