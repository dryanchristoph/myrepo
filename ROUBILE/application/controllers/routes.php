<?php
class Routes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('routes_model');
		$this->load->helper('form');
		$this->load->helper('assets');
		$this->load->library('form_validation');
	}
	
	
}