<?php
class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('post');
    }
    function login() {
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 1;
        $data['error'] = 0;
        if($_POST) {
            $this->load->model('user');
            $username = $this->input->post('username', true);
            $password = $this->input->post('password', true);
            $user = $this->user->login($username, $password);
            if(!$user) {
                $data['error'] = 1;
            } else {
                $this->session->set_userdata('user_id', $user['id']);
                $this->session->set_userdata('username', $user['username']);
                redirect(base_url().'blog');
            }
        }
        $this->load->view('header', $nav);
        $this->load->view('login', $data);
        $this->load->view('footer');
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function register() {
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 1;
        $data['errors'] = "";
        if($_POST) {
            $config = array(
                    array(
                        'field' => 'username',
                        'label' => 'Username',
                        'rules' => 'trim|required|min_length[3]|is_unique[users.username]'
                    ),
                    array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'trim|required|min_length[5]|max_length[10]'
                    ),
                    array(
                        'field' => 'password2',
                        'label' => 'Confirm Password',
                        'rules' => 'trim|required|matches[password]'
                    ),
                    array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'trim|required|is_unique[users.email]|valid_email'
                    )
                );
            $this->load->library('form_validation');
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == FALSE) {
                $data['errors'] = validation_errors();
            } else {
                $data = array(
                    'username'=>$_POST['username'],
                    'email'=>$_POST['email'],
                    'password'=>$_POST['password']
                );
                $this->load->model('user');
                $user_id = $this->user->create_user($data);
                $user = $this->user->get_username_by_id($user_id);
                $this->session->set_userdata('user_id', $user_id);
                $this->session->set_userdata('username', $user['username']);
                redirect(base_url().'blog');

                //Sending activation email
              //   $to = $_POST['email'];
              //   $subject = "Activation Email";
              //   $activationMessage = "Thanks for registering on our site. To complete the registration please click on the link below..
              //                          <a href=\"http://localhost:8080/ciblog/users/activate?email={$to}\">link</a>";
              //   $config = Array(
              //     'protocol' => 'smtp',
              //     'smtp_host' => 'ssl://smtp.googlemail.com',
              //     'smtp_port' => 465,
              //     'smtp_user' => 'demonterror@gmail.com', // change it to yours
              //     'smtp_pass' => 'manide8118', // change it to yours
              //     'mailtype' => 'html',
              //     'charset' => 'iso-8859-1',
              //     'wordwrap' => TRUE
              //   );
              //   $this->load->library('email', $config);
              // $this->email->set_newline("\r\n");
              // $this->email->from('demonterror@gmail.com'); // change it to yours
              // $this->email->to($to); // change it to yours
              // $this->email->subject($subject);
              // $this->email->message($activationMessage);
              // if($this->email->send()) {
              //   //$this->session->set_flashdata('message', 'Activation Email Sent.');
              //   $data['success'] = "Thank You Registering. An Email Activation has been Sent to You.";
              //   $this->load->view('header', $nav);
              //   $this->load->view('email_success',$data);
              //   $this->load->view('footer');
              // } else {
              //   show_error($this->email->print_debugger());
              // }
                //End of email stuff
            }
        }
        $this->load->helper('form');
        $this->load->view('header', $nav);
        $this->load->view('welcome',$data);
        $this->load->view('footer');
    }

    function activate() {
        $email = $this->input->get('email', TRUE);
        $this->load->model('user');
        //$result = $this->user->email_exists($email);
        if($this->user->email_exists($email)) {
            //UPDATE `blog`.`users` SET `status` = 'pending' WHERE `users`.`id` =1;
            $data = array(
                    'status'=>'active'
                );
            $where = array(
                    'email'=>$email
                );
            $this->user->activate_email($where, $data);
            redirect(base_url().'blog');
        } else {
            echo "Email does not exist.";
        }
    }

    
}