<?php
class Post extends CI_Model {
    function getLinks() {
        $sql = "SELECT DATE_FORMAT(blog_create_time, '%b %Y') AS dt FROM blog GROUP BY dt ORDER BY blog_create_time DESC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_posts($num=20, $start=0) {
        $this->db->select()->from('blog')->limit($num, $start);
        $query = $this->db->get();
        return $query->result_array();

        // Using Join
        // $this->db->select('*');
        // $this->db->from('users');
        // $this->db->join('blog', 'blog.user_id = users.id', 'left');
        // $query = $this->db->get();
        // return $query->result_array();
    }

    function get_user($user_id) {
        $this->db->select()->from('users')->where('id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_post_by_id($blog_id) {
        $this->db->select()->from('blog')->where('blog_id', $blog_id);
        $query = $this->db->get();
        return $query->first_row('array');
    }

    function get_posts_by_month($month) {
        $sql = "SELECT blog_id, user_id, blog_post, blog_title,
                   DATE_FORMAT(blog_create_time,  '%b %d %Y') AS
                    fmt_blog_create_time FROM blog WHERE DATE_FORMAT(blog_create_time, '%b %Y') = '{$month}'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }   

    function get_posts_count() {
        $this->db->select()->from('blog');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_posts_count_by_month($month) {
        $sql = "SELECT blog_id, user_id, blog_post, blog_title,
                   DATE_FORMAT(blog_create_time,  '%b %d %Y') AS
                    fmt_blog_create_time FROM blog WHERE DATE_FORMAT(blog_create_time, '%b %Y') = '{$month}'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function insert_post($data) {
        $this->db->insert('blog', $data);
        return $this->db->insert_id();
    }

    function update_post($blog_id, $data) {
        $this->db->where('blog_id', $blog_id);
        $this->db->update('blog', $data);
    }

    function delete_post($blog_id) {
        $this->db->where('blog_id', $blog_id);
        $this->db->delete('blog');
    }
}