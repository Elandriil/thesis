<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('templates/a_header');
		
		$this->load->view('admin/upload/upload_form', array('error' => ' ' ));
		$this->load->view('templates/a_footer');
	}

	function do_upload()
	{	//$this->load->library('upload');
		$config['upload_path'] = 'C:\xampp\htdocs\extra\pics\slider';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1000';
		$config['max_width']  = '5000';
		$config['max_height']  = '5000';

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('templates/a_header');		
			$this->load->view('admin/upload/upload_form', $error);
			$this->load->view('templates/a_footer');
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('templates/a_header');		
			$this->load->view('admin/upload/upload_success', $data);
			$this->load->view('templates/a_footer');
		}
	}
}
?>