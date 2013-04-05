<?php

class Ajax extends CI_Controller {

  function __construct() {
      parent::__construct();
  }


  public function username_taken()
  {
    $this->load->model('user');
    $username = trim($_POST['username']);
    // if the username exists return a 1 indicating true
    if ($this->user->username_exists($username)) {
      echo '1';
    }
  }

  function login_validate() {
    $this->load->model('user');
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($user = $this->user->login($username, $password)) {
      $this->session->set_userdata('user_id', $user['id']);
      $this->session->set_userdata('username', $user['username']);
      //redirect(base_url().'blog');
    } else {
      $output = "Incorrect Username Or Password!";
      echo $output;
    }
  }

  function comment() {
    date_default_timezone_set('Asia/Kolkata');
    $message = "";
    $error = "";
    $this->load->model('comment');
    $blog_id = $_POST['blog_id'];
    $commenter_name = $_POST['commenter_name'];
    $comment = $_POST['comment'];
    $captcha = $_POST['captcha'];
    
    if ($this->session->userdata('captcha') != $_POST['captcha']) {
      $error .= "<h4>Captcha is Wrong</h4>";
    } else {
      $comment_data = array(
          'blog_id'=>$_POST['blog_id'],
          'commenter_name'=>$_POST['commenter_name'],
          'comment'=>$_POST['comment'],
          'comment_create_time'=>date('Y-m-d h:i:s')
        );
      $this->comment->add_comment($comment_data);
    }

    // displaying comments
    $comments = $this->comment->get_comments($blog_id);
    foreach($comments as $row) {
      $message .= "<b>".$row['commenter_name']."</b> said at ".$row['fmt_comment_create_time']."<br>";
      $message .= "<p>".$row['comment']."<p><hr>";
      //echo $message;
    }
    echo $message."<br>".$error;
  }

}

