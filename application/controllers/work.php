<?php
class Work extends Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index(){
		$this->load->view('work_index');
	}

}
?>