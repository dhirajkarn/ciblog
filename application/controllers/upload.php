<?php
class Upload extends CI_Controller {
	function __construct() {
		parent :: __construct();
		$this->load->helper('form');
	}

	function index() {
		$this->load->view('upload_form', array('error'=>''));
	}

	// function do_upload() {
	// 	$config['upload_path'] = './uploads';
	// 	$config['allowed_types'] = 'gif|jpg|png';
	// 	$config['max_size'] = '1000';
	// 	$config['max_width'] = '3000';
	// 	$config['max_height'] = '2000';
	// 	$this->load->library('upload', $config);
	// 	if(!$this->upload->do_upload()) {
	// 		$error = array('error'=>$this->upload->display_errors());
	// 		$this->load->view('upload_form', $error);
	// 	} else {
	// 		$data = array('upload_data'=>$this->upload->data());
	// 		//RESIZE THE IMAGE
	// 		$this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
	// 		$this->load->view('upload_success', $data);
	// 	}
	// }

	function do_upload() {
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '3000';
		$config['max_height'] = '2000';
		// //Get the desired height and width
		// $height = $_POST['height'];
		// $width = $_POST['width'];
		// if($_POST['height']=="" || $_POST['width']=="") {
		// 	$error = array('error'=>'fill all the fields');
		// 	$this->load->view('upload_form', $error);
		// } else {
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload()) {
				$error = array('error'=>$this->upload->display_errors());
				$this->load->view('upload_form', $error);
			} else {
				$data = array('upload_data'=>$this->upload->data());
				//RESIZE THE IMAGE
				$this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
				$this->load->view('upload_success', $data);
			}
		// } 
		
	}

	function resize($path, $file) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = $path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 300;
		$config['height'] = 300;
		$config['new_image'] = './uploads/'.$file;
		//$config['thumb_marker'] = "";
		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
		//echo $config['new_image'];
	}
}