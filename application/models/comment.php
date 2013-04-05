<?php
class Comment extends CI_Model {
	function add_comment($data) {
		$this->db->insert('comments', $data);
	}

	function get_comments($blog_id) {
		//$this->db->select()->from('comments')->where('blog_id', $blog_id);
		$query_com = "SELECT comment, commenter_name, blog_id, DATE_FORMAT(comment_create_time,  '%b %e %Y at %r') AS
                    fmt_comment_create_time FROM comments WHERE blog_id = {$blog_id} ORDER BY comment_create_time ASC";
		$query = $this->db->query($query_com);
		return $query->result_array();
	}
}