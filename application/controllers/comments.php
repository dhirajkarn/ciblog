<?php
class Comments extends CI_Controller {
	function add_comment($blog_id) {
		if(!$_POST) {
			redirect(base_url().'blog/blogtext/'.$blog_id);
		}
		date_default_timezone_set('Asia/Kolkata');
		if($this->session->userdata('captcha') != $_POST['captcha']) {
			$this->session->set_flashdata('message', 'Captcha is Wrong');
			redirect(base_url().'blog/blogtext/'.$blog_id);
		} else {
			$this->load->model('comment');
			$data = array(
					'blog_id'=>$blog_id,
					'commenter_name'=>$_POST['commenter_name'],
					'comment'=>$_POST['comment'],
					'comment_create_time'=>date('Y-m-d h:i:s')
				);
			$this->comment->add_comment($data);
			redirect(base_url().'blog/blogtext/'.$blog_id);
		}
	}
}