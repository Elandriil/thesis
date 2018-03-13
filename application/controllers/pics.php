<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pics extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index($offset = 0)
	{
		// offset
		$uri_segment = 3;
		$offset = $this->uri->segment($uri_segment);
		
		// load data
		$pics = $this->pics_model->get_paged_list(10, $offset)->result();/*$this->limit*/
		//$cats=$this->pics_model->list_cat();
		// generate pagination
		//$this->load->library('pagination');
		$config['base_url'] = site_url('pics/index');
 		$config['total_rows'] = $this->pics_model->count_all();
 		$config['per_page'] = 10;//$this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		//$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'Description', 'Picture link', 'Actions');
		$i = 0 + $offset;
		foreach ($pics as $pic)
		{
			
			$this->table->add_row(++$i, 
			$pic->name_pic, 
			$pic->descr_pic, 
			$pic->p_link,
				anchor('pics/view/'.$pic->id_pic,'view',array('class'=>'view')).' '.
				anchor('pics/update/'.$pic->id_pic,'update',array('class'=>'update')).' '.
				anchor('pics/delete/'.$pic->id_pic,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/view_list', $data);
		$this->load->view('templates/a_footer');
	}
	
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new pictures';
		$data['message'] = '';
		$data['action'] = site_url('pics/add_pics');
		$data['link_back'] = anchor('pics/index/','Back to the list',array('class'=>'back'));
		
		//$query=$this->pics_model->get_cat();
		//$data['category']=$query;
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add_pics()
	{
		// set common properties
		$data['title'] = 'Add pics';
		$data['action'] = site_url('pics/add_pics');
		$data['link_back'] = anchor('pics/index/','Back to the list',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$pic = array(
							'name_pic' => $this->input->post('name_pic'),
							'descr_pic' => $this->input->post('descr_pic'),
							'pic_cat' => $this->input->post('pic_cat'),
							't_link' => $this->input->post('t_link'),
							'p_link' => $this->input->post('p_link')
							);
			$id = $this->pics_model->save($pic);
			
			// set user message
			$data['message'] = '<div class="success">adding pics success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Details';
		$data['link_back'] = anchor('pics/index/','Back to list of pictures',array('class'=>'back'));
		
		// get person details
		$data['pics'] = $this->pics_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/details', $data);
		$this->load->view('templates/a_footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$pic = $this->pics_model->get_by_id($id)->row();
		$this->form_data->id_pic = $id;
		$this->form_data->name_pic = $pic->name_pic;
		$this->form_data->descr_pic = $pic->descr_pic;
		$this->form_data->pic_cat = $pic->pic_cat;
		$this->form_data->t_link = $pic->t_link;
		$this->form_data->p_link = $pic->p_link;
		
		// set common properties
		$data['title'] = 'Update pictures';
		$data['message'] = '';
		$data['action'] = site_url('pics/edit');
		$data['link_back'] = anchor('pics/index/','Back to list of pictures',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function edit()
	{
		// set common properties
		$data['title'] = 'Update pictures';
		$data['action'] = site_url('pics/update');
		$data['link_back'] = anchor('pics/index/','Back to list of pictures',array('class'=>'back'));
		
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// run validation
		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = '';
		}
		else
		{
			// save data
			$id = $this->input->post('id');
			$pic = array(	'name_pic' => $this->input->post('name_pic'),
							'descr_pic' => $this->input->post('descr_pic'),
							'pic_cat' => $this->input->post('pic_cat'),
							't_link' => $this->input->post('t_link'),
							'p_link' => $this->input->post('p_link'));
			$this->pics_model->update($id,$pic);
			
			// set user message
			$data['message'] = '<div class="success">update pics success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/pics_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function delete($id)
	{
		// delete person
		$this->pics_model->delete($id);
		
		// redirect to person list page
		redirect('pics/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->id_pic = '';
		$this->form_data->name_pic = '';
		$this->form_data->descr_pic ='';
		$this->form_data->pic_cat ='';
		$this->form_data->t_link = '';
		$this->form_data->p_link = '';
		
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('name_pic', 'Name', 'trim|required');
		$this->form_validation->set_rules('descr_pic', 'Description', 'trim|required');
		$this->form_validation->set_rules('t_link', 'Thumbnail', 'trim|required');
		$this->form_validation->set_rules('p_link', 'Picture', 'trim|required');
		

		
		$this->form_validation->set_message('required', 'Input required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

	}