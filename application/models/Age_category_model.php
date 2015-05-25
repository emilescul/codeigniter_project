<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Age_category_model extends CI_Model {

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function get_age_category()
	{
		$query = $this->db->get('age_category');
		return $query->result_array();
	}
	
	public function add_category()
	{
		$data = array(
			'a_category' => $this->input->post('title'),
		);
		$this->db->set($data);
		$this->db->insert('age_category');
	}
	
	public function del_category()
	{
		$id = $this->input->post('id_sel');
		if($id > 0) { 
			$this->db->where('id', $id);
			$this->db->delete('age_category');
		}
	}
}