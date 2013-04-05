<?php
class Email extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'demonterror@gmail.com', // change it to yours
		  'smtp_pass' => 'manide8118', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		 
		  $this->load->library('email', $config);
		  $this->email->set_newline("\r\n");
		  $this->email->from('demonterror@gmail.com'); // change it to yours
		  $this->email->to('dhiraj_md@yahoo.co.in'); // change it to yours
		  $this->email->subject('Email using Gmail Via CodeIgniter.');
		  $this->email->message('Working fine ! !');
		 
		 if($this->email->send()) {
		  	echo 'Email sent.';
		 } else {
		 	show_error($this->email->print_debugger());
		 }

	}
}