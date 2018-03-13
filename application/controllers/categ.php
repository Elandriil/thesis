<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Categ extends CI_Controller {
	
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
		$cats = $this->cat_model->get_paged_list(10, $offset)->result();/*$this->limit*/
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('categ/index');
 		$config['total_rows'] = $this->cat_model->count_all();
 		$config['per_page'] = 10;//$this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'Description', 'Actions');
		$i = 0 + $offset;
		foreach ($cats as $cat)
		{
			$this->table->add_row(++$i, $cat->name_cat, $cat->descr_cat,
				anchor('categ/view/'.$cat->id_cat,'view',array('class'=>'view')).' '.
				anchor('categ/update/'.$cat->id_cat,'update',array('class'=>'update'))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/view_list', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add category';
		$data['message'] = '';
		$data['action'] = site_url('categ/add_cats');
		$data['link_back'] = anchor('categ/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add_cats()
	{
		// set common properties
		$data['title'] = 'Add category';
		$data['action'] = site_url('categ/add_cats');
		$data['link_back'] = anchor('categ/index/','Back to the list',array('class'=>'back'));
		
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
			$cat = array('name_cat' => $this->input->post('name_cat'),
							'descr_cat' => $this->input->post('descr_cat'),
							);
			$id = $this->cat_model->save($cat);
			
			// set user message
			$data['message'] = '<div class="success">adding category success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Details';
		$data['link_back'] = anchor('categ/index/','Back to list ',array('class'=>'back'));
		
		// get  details
		$data['cats'] = $this->cat_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/details', $data);
		$this->load->view('templates/a_footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$cat = $this->cat_model->get_by_id($id)->row();
		$this->form_data->id_cat = $id;
		$this->form_data->name_cat = $cat->name_cat;
		$this->form_data->descr_cat = $cat->descr_cat;
	
		
		// set common properties
		$data['title'] = 'Update categories';
		$data['message'] = '';
		$data['action'] = site_url('categ/edit');
		$data['link_back'] = anchor('categ/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function edit()
	{
		// set common properties
		$data['title'] = 'Update categories';
		$data['action'] = site_url('categ/update');
		$data['link_back'] = anchor('categ/index/','Back to the list',array('class'=>'back'));
		
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
			$cat = array('name_cat' => $this->input->post('name_cat'),
							'descr_cat' => $this->input->post('descr_cat'));
			$this->cat_model->update($id,$cat);
			
			// set user message
			$data['message'] = '<div class="success">update success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/cat_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function delete($id)
	{
		// delete person
		$this->cat_model->delete($id);
		
		// redirect to person list page
		redirect('categ/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->id_cat = '';
		$this->form_data->name_cat = '';
		$this->form_data->descr_cat = '';
		
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('name_cat', 'Category', 'trim|required');
		$this->form_validation->set_rules('descr_cat', 'Description', 'trim|required');

		
		$this->form_validation->set_message('required', 'Input required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

	}