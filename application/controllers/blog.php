<?php

class Blog extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('post');
        $this->load->model('upload');
    }

    // function getLinks() {
    //     $sql = "SELECT DATE_FORMAT(blog_create_time, '%b %Y') AS dt FROM blog GROUP BY dt ORDER BY blog_create_time DESC";
    //     $query = $this->db->query($sql);
    //     $result = $query->result_array();

    //     // foreach($result as $nav) {
    //     //     echo $nav['dt']."<br>";
    //     // }
    // }

    function logged_in() {
        if($this->session->userdata('user_id')) {
            return true;
        } else {
            return FALSE;
        }
    }

    function check_git() {
        echo "success";
    }

    function index($start=0) {
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 0;
        $this->load->view('header');
        if($this->session->userdata('user_id')) {
            $this->load->library('pagination');
            $data['blogs'] = $this->post->get_all_posts(3, $start);
            $config['total_rows'] = $this->post->get_posts_count();
            $config['base_url'] = base_url().'blog/index/';
            $config['per_page'] = 3;
            $config['num_links'] = 4;
            $config['next_link'] = '&gt;&gt;';
            $config['prev_link'] = '&lt;&lt;';
            $config['cur_tag_open'] = '<b>';
            $config['cur_tag_close'] = '</b>';
            $this->pagination->initialize($config);
            $data['pages'] = $this->pagination->create_links();
            $this->load->view('blogview', $data);
        } else {
            //redirect(base_url().'users/login');
            $data['errors'] = "";
            $this->load->helper('form');
            // Facebook plugin
            // require base_url().'src/facebook.php';
            // $facebook = new Facebook(array(
            //   'appId'  => '137660183068312',
            //   'secret' => 'c2cbb7c61d67f7bc3099e1a8029b7674',
            // ));
            // $data['user'] = $facebook->getUser();
            $this->load->view('welcome', $data);
        }
        
        $this->load->view('footer', $nav);
    }
    function blogtext($blog_id) {
        if(!$this->logged_in()) {
            redirect(base_url().'users/login');
        }
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 0;
        $this->load->view('header');
        $this->load->model('comment');
        $data['comments'] = $this->comment->get_comments($blog_id);
        $data['blog_details'] = $this->post->get_post_by_id($blog_id);
        $this->load->helper('captcha');
        $vals = array(
                'img_path'=>'./captcha/',
                'img_url'=>base_url().'captcha/',
                'img_width'=>'150',
                'img_height'=>'50',
                'word'=>'test'
            );
        $cap = create_captcha($vals);
        $data['captcha'] = $cap['image'];
        $this->session->set_userdata('captcha', $cap['word']);
        $this->load->helper('form');
        $this->load->view('postview', $data);
        $this->load->view('footer', $nav);
    }

    function new_post() {
        if(!$this->logged_in()) {
            redirect(base_url().'users/login');
        }
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 0;
        $this->load->view('header');
        $data['error'] = "";
        if($_POST) {
            $data = array(
                'user_id'=>$this->session->userdata('user_id'),
                'blog_title'=>$_POST['blog_title'],
                'blog_post'=>$_POST['blog_post'],
                'blog_create_time'=>date('Y-m-d h:i:s'),
                'img'=>$_FILES["userfile"]["name"]
            );
            $this->post->insert_post($data);
            $this->upload->do_upload();
            redirect(base_url().'blog/');
        } else {
            $this->load->view('newpost', $data);
        }
         $this->load->view('footer', $nav);
    }

    function editpost($blog_id) {
        if(!$this->logged_in()) {
            redirect(base_url().'users/login');
        }
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 0;
        $this->load->view('header');
        $data['success'] = 0;
        if($_POST) {
            $data_post = array(
                'user_id'=>$this->session->userdata('user_id'),
                'blog_title'=>$_POST['blog_title'],
                'blog_post'=>$_POST['blog_post']
                //'blog_create_time'=>'2012-12-15'
            );
            $this->post->update_post($blog_id, $data_post);
            $data['success'] = 1;
        }
        $data['post'] = $this->post->get_post_by_id($blog_id);
        $this->load->view('edit_post', $data);
         $this->load->view('footer', $nav);
    }

    function deletepost($blog_id) {
        if(!$this->logged_in()) {
            redirect(base_url().'users/login');
        }
        $this->post->delete_post($blog_id);
        redirect(base_url().'blog/');
    }

    function archive() {
        $nav['links'] = $this->post->getLinks();
        $nav['display'] = 0;
        $this->load->view('header');
        $month = $this->input->get('month', true);
        $data['blogs'] = $this->post->get_posts_by_month($month);
        $this->load->view('archive', $data);
        $this->load->view('footer', $nav);
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