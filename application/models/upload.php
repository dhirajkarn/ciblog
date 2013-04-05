<?php
class Upload extends CI_Model {
	function do_upload() {
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '1000';
		$config['max_width'] = '3000';
		$config['max_height'] = '2000';
		$this->load->library('upload', $config);
		if(!$this->upload->do_upload()) {
			$error = array('error'=>$this->upload->display_errors());
		} else {
			$data = array('upload_data'=>$this->upload->data());
			//RESIZE THE IMAGE
			$this->resize($data['upload_data']['full_path'], $data['upload_data']['file_name']);
		}
	}


	function resize($path, $file) {
		$config['image_library'] = 'gd2';
		$config['source_image'] = $path;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width'] = 300;
		$config['height'] = 300;
		$config['new_image'] = './uploads/'.$file;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}
}