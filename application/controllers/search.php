<?php 
	class Search extends CI_Controller {
		function __construct() {
			parent::__construct();
		}

		function index() {
			$this->load->view('header');
			$yahhoId = 'dhiraj_md';
			// if($_GET) {
			// 	$keyword = $this->input->get('keyword', true);

			// }
			$data['data'] = file_get_contents('http://www.google.com/search?q=red&client=google-csbe&output=xml_no_dtd&cx=002443069980448651367:ubynzwev-xi');
			$data['result'] = '<pre>'.nl2br(htmlspecialchars($data['data'])). '</pre>';
			$this->load->view('search', $data);
			$this->load->view('footer');
		}
	}
