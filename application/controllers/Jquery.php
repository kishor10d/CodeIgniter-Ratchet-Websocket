<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jquery extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model("post_model");
	}
	 
	
	function index()
	{
        $data["posts"] = $this->post_model->getPosts();

		$this->load->view("jquery", $data);
	}

	/**
	 * This function add post into DB
	 */
	function addPost() 
	{
	 	$postText =  $this -> input -> post("postText");	
		
		$rec = array('postText'=>$postText);
		
		$postId = $this->post_model->addPost($rec);
		
		$postData = $this->post_model->getPostById($postId);
		
		if ($postId > 0) {echo json_encode(array('status' => 'success', 'postData'=>$postData[0]));}
		else {echo json_encode(array('status' => 'error'));}
	}
}

?>