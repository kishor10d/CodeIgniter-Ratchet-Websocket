<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Post_model extends CI_Model
{
	function getPosts()
	{
		$this->db->select('postId, postText');
  		$this->db->from('tbl_post');
		$this->db->order_by('postId','DESC');
		$data = $this->db->get();
		return $data->result();
	}
	
	function addPost($postData)
	{ 
	 	$this->db->insert("tbl_post", $postData);
		$insertId = $this->db->insert_id();
		return $insertId;
	}
	
	function getPostById($postId)
	{
		$this->db->select('postId, postText');
  		$this->db->from('tbl_post');
		$this->db->where('postId', $postId);
		$data = $this->db->get();
		return $data->result();
	}
	
}