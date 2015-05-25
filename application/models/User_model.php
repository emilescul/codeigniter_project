<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	public function reset_psw($email, $psw) {
		$data['password'] = md5($psw);
		$this->db->where('email', $email);
		$this->db->update('users', $data);
	}
	
	function login($usr, $pwd) {
		
		$query = $this->db->get_where('users', array('username' => $usr , 'password' => md5($pwd)));
		
		if ($query->num_rows() == 1) { 
			return $query->row_array();
		} else {
			return FALSE;
		}
	}
	
	public function get_users($id = FALSE)
	{
		$this->db->select('users.*');
		$this->db->select('age_category.a_category');
		if ($id === FALSE)
		{
			$this->db->select('user_category.u_category');
			$this->db->from('users');
			$this->db->join('age_category', 'age_category.id = users.id_age_category');
			$this->db->join('user_category', 'user_category.id = users.id_user_category');
			$this->db->order_by("username", "asc");
			$query = $this->db->get();
			return $query->result_array();
		}
		
		$this->db->from('users');
		$this->db->join('age_category', 'age_category.id = users.id_age_category');
		$this->db->where('users.id =', $id);
		$query = $this->db->get();

		//$query = $this->db->get_where('users', array('slug' => $slug));
		return $query->row_array();
	}
	
	public function get_filter_users($f_username, $f_age_category, $f_user_category, $f_order_by) {
		
		$this->db->select('users.*');
		$this->db->select('age_category.a_category');
		$this->db->select('user_category.u_category');
		$this->db->from('users');
		$this->db->join('age_category', 'age_category.id = users.id_age_category');
		$this->db->join('user_category', 'user_category.id = users.id_user_category');
		
		if(isset($f_username) && strlen($f_username) >0)
			$this->db->like('users.username', "$f_username", 'after');
			
		if( $f_age_category > 0 )
			$this->db->where('users.id_age_category =', "$f_age_category");
			
		if( $f_user_category > 0 )
			$this->db->where('users.id_user_category =', "$f_user_category");
			
		$this->db->order_by("username", "$f_order_by");
		$query = $this->db->get();
		
		return $query->result_array();
	}
	
	public function update() {
	
		$id = $this->input->post('id_sel');
		$psw = $this->input->post('password');
		$id_usr_category = $this->input->post('user_category');
		$data = array(
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone_number' => $this->input->post('phone_number'),
			'id_age_category' => $this->input->post('age_category'),
			'description' => $this->input->post('description')
		);
		
		if( $id_usr_category > 0)
			$data['id_user_category'] = $this->input->post('user_category');
		if( strlen($psw) > 1 )
			$data['password'] = md5($this->input->post('password'));

		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	
	public function set_user() {
		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'phone_number' => $this->input->post('phone_number'),
			'id_age_category' => $this->input->post('age_category'),
			'id_user_category' => $this->input->post('user_category'),
			'description' => $this->input->post('description')
		);

		$this->db->set($data);
		$this->db->insert('users');
	}
}