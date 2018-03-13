<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prog extends CI_Controller {
	
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
		$progs = $this->prog_model->get_paged_list(10, $offset)->result();/*$this->limit*/
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('prog/index');
 		$config['total_rows'] = $this->prog_model->count_all();
 		$config['per_page'] = 10;//$this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'Description', 'Download link', 'Actions');
		$i = 0 + $offset;
		foreach ($progs as $prog)
		{
			$this->table->add_row(++$i, $prog->name_prog, $prog->descr_prog, $prog->dl_link,
				anchor('prog/view/'.$prog->id_prog,'view',array('class'=>'view')).
				anchor('prog/update/'.$prog->id_prog,'update',array('class'=>'update'))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/view_list', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new programs';
		$data['message'] = '';
		$data['action'] = site_url('prog/add_prog');
		$data['link_back'] = anchor('prog/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add_prog()
	{
		// set common properties
		$data['title'] = 'Add programs';
		$data['action'] = site_url('prog/add_prog');
		$data['link_back'] = anchor('prog/index/','Back to the list',array('class'=>'back'));
		
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
			$prog = array(	'name_prog' => $this->input->post('name_prog'),
							'descr_prog' => $this->input->post('descr_prog'),
							'dl_link' => $this->input->post('dl_link')
							);
			$id = $this->prog_model->save($prog);
			
			// set user message
			$data['message'] = '<div class="success">adding program success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Details';
		$data['link_back'] = anchor('prog/index/','Back to list of programs',array('class'=>'back'));
		
		// get person details
		$data['progs'] = $this->prog_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/details', $data);
		$this->load->view('templates/a_footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$prog = $this->prog_model->get_by_id($id)->row();
		$this->form_data->id_prog = $id;
		$this->form_data->name_prog = $prog->name_prog;
		$this->form_data->descr_prog = $prog->descr_prog;
		$this->form_data->dl_link = $prog->dl_link;
		
		// set common properties
		$data['title'] = 'Update programs';
		$data['message'] = '';
		$data['action'] = site_url('prog/edit');
		$data['link_back'] = anchor('prog/index/','Back to list of programs',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function edit()
	{
		// set common properties
		$data['title'] = 'Update program';
		$data['action'] = site_url('prog/update');
		$data['link_back'] = anchor('prog/index/','Back to list of programs',array('class'=>'back'));
		
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
			$prog = array(	'name_prog' => $this->input->post('name_prog'),
							'descr_prog' => $this->input->post('descr_prog'),
							'dl_link' => $this->input->post('dl_link')
							);
			$this->prog_model->update($id,$prog);
			
			// set user message
			$data['message'] = '<div class="success">update program success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/prog_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function delete($id)
	{
		// delete person
		$this->prog_model->delete($id);
		
		// redirect to person list page
		redirect('prog/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->id_prog = '';
		$this->form_data->name_prog ='';
		$this->form_data->descr_prog = '';
		$this->form_data->dl_link = '';
		
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('name_prog', 'Name', 'trim|required');
		$this->form_validation->set_rules('descr_prog', 'Description', 'trim|required');
		$this->form_validation->set_rules('dl_link', 'Download', 'trim|required');
		
		
		$this->form_validation->set_message('required', 'Input required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

	}