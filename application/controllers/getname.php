<?php
class Getname extends CI_Controller {
	function greeting() {
		$name = $this->input->get('name');
		$lname = $this->input->get('lname', true);
		echo $name." ".$lname;
	}
}