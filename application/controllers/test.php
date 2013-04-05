<?php
class Test extends CI_Controller {
    function current() {
        echo basename($_SERVER['SCRIPT_NAME']);
    }

    function home() {
        echo "Welcome Home!";
    }
    function urlcheck() {
        echo base_url();
    }
    function info() {
        echo phpinfo();
    }
    function gettime() {
        date_default_timezone_set('Asia/Kolkata');
        echo date('Y-m-d h:i:s');
    }
    function getquery() {
        redirect(base_url().'getname/greeting?name=dhiraj&&lname=karn');
    }

    function get_calender() {
        // $this->load->library('calendar');
        // echo $this->calendar->generate();
        $this->load->library('calendar');
        $data = array(
                       3  => 'http://example.com/news/article/2006/03/',
                       7  => 'http://example.com/news/article/2006/07/',
                       13 => 'http://example.com/news/article/2006/13/',
                       26 => 'http://example.com/news/article/2006/26/'
                     );
        echo $this->calendar->generate(2006, 6, $data);
    }

    function get_table() {
        $this->load->library('table');
        $data = array(
                     array('Name', 'Color', 'Size'),
                     array('Fred', 'Blue', 'Small'),
                     array('Mary', 'Red', 'Large'),
                     array('John', 'Green', 'Medium')   
                     );
        echo $this->table->generate($data);
    }

}
