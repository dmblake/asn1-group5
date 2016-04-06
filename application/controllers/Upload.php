<?php

class Upload extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	
	function index() {
		$this->load->view('homepage', array('error' => ' ' ));
	}
	
	
	function do_upload() {
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['max_width']  = '1500';
		$config['max_height']  = '1500';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			// fail to upload
			$error = array('error' => $this->upload->display_errors());
			foreach ($error as $e)
				echo $e;
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			// handle success case
		}
	}
}
?>