<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
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
		$news = $this->news_model->get_paged_list(10, $offset)->result();/*$this->limit*/
		
		// generate pagination
		$this->load->library('pagination');
		$config['base_url'] = site_url('news/index');
 		$config['total_rows'] = $this->news_model->count_all();
 		$config['per_page'] = 10;//$this->limit;
		$config['uri_segment'] = $uri_segment;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		
		// generate table data
		$this->load->library('table');
		$this->table->set_empty("&nbsp;");
		$this->table->set_heading('No', 'Title', 'Text', 'Date','News By', 'Actions');
		$i = 0 + $offset;
		foreach ($news as $new)
		{
			$this->table->add_row(++$i, $new->title, $new->txt, $new->date_w, $new->news_by,
				anchor('news/view/'.$new->id_news,'view',array('class'=>'view')).' '.
				anchor('news/update/'.$new->id_news,'update',array('class'=>'update')).' '.
				anchor('news/delete/'.$new->id_news,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this?')"))
			);
		}
		$data['table'] = $this->table->generate();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/view_list', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add()
	{
		// set empty default form field values
		$this->_set_fields();
		// set validation properties
		$this->_set_rules();
		
		// set common properties
		$data['title'] = 'Add new news';
		$data['message'] = '';
		$data['action'] = site_url('news/add_news');
		$data['link_back'] = anchor('news/index/','Back to the list',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function add_news()
	{
		// set common properties
		$data['title'] = 'Add news';
		$data['action'] = site_url('news/add_news');
		$data['link_back'] = anchor('news/index/','Back to the list',array('class'=>'back'));
		
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
			$new = array('title' => $this->input->post('title'),
							'txt' => $this->input->post('txt'),
							);
			$id = $this->news_model->save($new);
			
			// set user message
			$data['message'] = '<div class="success">adding news success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function view($id)
	{
		// set common properties
		$data['title'] = 'Details';
		$data['link_back'] = anchor('news/index/','Back to list of news',array('class'=>'back'));
		
		// get person details
		$data['news'] = $this->news_model->get_by_id($id)->row();
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/details', $data);
		$this->load->view('templates/a_footer');
	}
	
	function update($id)
	{
		// set validation properties
		$this->_set_rules();
		
		// prefill form values
		$new = $this->news_model->get_by_id($id)->row();
		$this->form_data->id_news = $id;
		$this->form_data->title = $new->title;
		$this->form_data->txt = $new->txt;
		$this->form_data->date_w = $new->date_w;
		
		// set common properties
		$data['title'] = 'Update news';
		$data['message'] = '';
		$data['action'] = site_url('news/edit');
		$data['link_back'] = anchor('news/index/','Back to list of news',array('class'=>'back'));
	
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function edit()
	{
		// set common properties
		$data['title'] = 'Update news';
		$data['action'] = site_url('news/update');
		$data['link_back'] = anchor('news/index/','Back to list of news',array('class'=>'back'));
		
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
			$new = array('title' => $this->input->post('title'),
							'txt' => $this->input->post('txt'));
			$this->news_model->update($id,$new);
			
			// set user message
			$data['message'] = '<div class="success">update news success</div>';
		}
		
		// load view
		$this->load->view('templates/a_header');
		$this->load->view('admin/news_views/edit', $data);
		$this->load->view('templates/a_footer');
	}
	
	function delete($id)
	{
		// delete news
		$this->news_model->delete($id);
		
		// redirect to person list page
		redirect('news/index/','refresh');
	}
	
	// set empty default form field values
	function _set_fields()
	{
		$this->form_data->id_news = '';
		$this->form_data->title = '';
		$this->form_data->txt = '';
		
	}
	
	// validation rules
	function _set_rules()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('txt', 'Text', 'trim|required');

		
		$this->form_validation->set_message('required', 'Input required');
		$this->form_validation->set_message('isset', '* required');
		$this->form_validation->set_error_delimiters('<p class="error">', '</p>');
	}
	

	}