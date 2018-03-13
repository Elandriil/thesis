<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Coms extends CI_Controller {
	
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
		$coms = $this->coms_model->get_paged_list(10, $offset)->result();/*$this->limit*/
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('coms/index');
 		$config['total_rows'] = $this->coms_model->count_all();
 		$config['per_page'] = 10;//$this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Name', 'Comment','Date', 'Actions');
		$i = 0 + $offset;
		foreach ($coms as $com)
		{
			$this->table->add_row(++$i, $com->user_by, $com->txt_com,$com->date_c,
				anchor('coms/view/'.$com->id_com,'view',array('class'=>'view')).' '.
				anchor('coms/update/'.$com->id_com,'update',array('class'=>'update')).' '.
				anchor('coms/delete/'.$com->id_com,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/view_list', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add comment';
		$data['message'] = '';
		$data['action'] = site_url('coms/add_coms');
		$data['link_back'] = anchor('coms/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add_coms()
	{
		// set common properties
		$data['title'] = 'Add comment';
		$data['action'] = site_url('coms/add_coms');
		$data['link_back'] = anchor('coms/index/','Back to the list',array('class'=>'back'));
		
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
			$com = array('user_by' => $this->input->post('user_by'),
							'txt_com' => $this->input->post('txt_com'),
							'avatar' => $this->input->post('avatar')
							);
			$id = $this->coms_model->save($com);
			
			// set user message
			$data['message'] = '<div class="success">adding comment success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Details';
		$data['link_back'] = anchor('coms/index/','Back to list ',array('class'=>'back'));
		
		// get  details
		$data['coms'] = $this->coms_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/details', $data);
		$this->load->view('templates/a_footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$com = $this->coms_model->get_by_id($id)->row();
		$this->form_data->id_com = $id;
		$this->form_data->user_by = $com->user_by;
		$this->form_data->txt_com = $com->txt_com;
		$this->form_data->avatar = $com->avatar;
	
		
		// set common properties
		$data['title'] = 'Update comments';
		$data['message'] = '';
		$data['action'] = site_url('coms/edit');
		$data['link_back'] = anchor('coms/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function edit()
	{
		// set common properties
		$data['title'] = 'Update comments';
		$data['action'] = site_url('coms/update');
		$data['link_back'] = anchor('coms/index/','Back to the list',array('class'=>'back'));
		
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
			$com = array('user_by' => $this->input->post('user_by'),
						 'txt_com' => $this->input->post('txt_com'),
						 'avatar' => $this->input->post('avatar'));
			$this->coms_model->update($id,$com);
			
			// set user message
			$data['message'] = '<div class="success">update success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/com_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function delete($id)
	{
		// delete person
		$this->coms_model->delete($id);
		
		// redirect to person list page
		redirect('coms/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->id_com = '';
		$this->form_data->user_by = '';
		$this->form_data->txt_com = '';
		$this->form_data->avatar = '';
		
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('user_by', 'Name', 'trim|required');
		$this->form_validation->set_rules('txt_com', 'Comment', 'trim|required');
		$this->form_validation->set_rules('avatar', 'Avatar', 'trim|required');

		
		$this->form_validation->set_message('required', 'Input required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

	}