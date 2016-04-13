<?php

class Upload extends Application {
	
	function __construct() {
		parent::__construct();
		//session_start();
		$this->load->helper(array('form', 'url'));
	}
	
	function index() {
		$this->data['pagebody'] = 'upload_choose';
		$this->render();
	}
	
	function do_upload() {
		$config['upload_path'] = "./images/";
		$config['file_name'] = $this->session->userdata('playername');
		$config['is_image'] = 1;
		$config['allowed_types'] = '*';
		$config['max_size']	= '1000';
		$config['max_width']  = '1500';
		$config['max_height']  = '1500';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			// fail to upload
			$error = array('error' => $this->upload->display_errors());
			echo $error;
			foreach ($error as $e)
				echo $e;
			redirect("/upload");
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			/* DEBUGGING: check data
			foreach ($data as $d)
				foreach($d as $c)
					echo $c;
					*/
			//$_SESSION['avatar'] = true;
			$this->session->set_userdata('avatar', true);
			redirect("/");
		}
	}
}
?>