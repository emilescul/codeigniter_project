<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_category_model extends CI_Model {

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function get_user_category()
	{
		$query = $this->db->get('user_category');
		return $query->result_array();
	}
}