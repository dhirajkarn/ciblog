<?php
class User extends CI_Model {
    function create_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function login($username, $password) {
        $where = array(
            'username'=>$username,
            'password'=>$password,
            'status'=>'active'
        );
        $this->db->select()->from('users')->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function get_username_by_id($user_id) {
        $this->db->select()->from('users')->where('id', $user_id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function username_exists($username) {
        $this->db->select()->from('users')->where('username', $username);
        $query = $this->db->get();
        return $query->first_row('array');
        // if($query->num_rows() > 0) {
        //     return TRUE;
        // } else {
        //     return false;
        // }
    }

    function email_exists($email) {
        $where = array(
            'email'=>$email,
            'status'=>'pending'
        );
        $this->db->select()->from('users')->where($where);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function activate_email($where, $data) {
        $this->db->where($where);
        $this->db->update('users', $data);
    }

    // function login($username, $password) {
    //     $where = array(
    //         'username'=>$username,
    //         'password'=>$password
    //     );
    //     $this->db->select()->from('users')->where($where);
    //     $query = $this->db->get();
    //     return $query->first_row('array');
    // }
}