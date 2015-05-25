<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct() {
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('user_model');
		$this->load->model('age_category_model');
		$this->load->model('user_category_model');
	}
	
	private function _check_login() {
        if( $this->session->has_userdata('loginuser') ) {
			if( $this->session->has_userdata('u_category'))
				return $this->session->userdata('u_category');
		} else {
			redirect('login');
		}
	}
	
	public function password_check($str) {
        if (preg_match('/(?=.*\d)(?=.*[A-Z]).{5}/', $str)) {
			
			return true;
		} else{
			
			$this->form_validation->set_message('password_check', 
            '<span class="error">
                <ul>
                    <li> Password must be at least:</li>
                    <li> 5 characters</li>
                    <li> 4 upper, case letter</li>
                    <li> 1 number</li>  
                </ul>               
            </span>');
			
			return false;
		} 
    }

	public function login() {
		
		//get the posted values
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		//set validations
		$this->form_validation->set_rules("username", "Username", "trim|required");
		$this->form_validation->set_rules("password", "Password", "callback_password_check");
		
		if ($this->form_validation->run() == FALSE) {
		  
			//validation fails
			$data['title'] = ucfirst('login'); // Capitalize the first letter

			$this->load->view('templates/header', $data);
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer', $data);
		   
		} else {
		
			//validation succeeds
			if ($this->input->post('btn_login') == "Login") {
			
			   $data = $this->user_model->login($username, $password);
			   
			   if( isset($data['id_user_category']) && $data['id_user_category'] == '2') {
					
					//if active user record is present set the session variables
				   $sessiondata = array(
						  'id_log_user' => $data['id'],	
						  'username' => $username,
						  'name' => $data['name'],
						  'u_category' => 'user',
						  'loginuser' => TRUE
					);
					$this->session->set_userdata($sessiondata);
					
					redirect('get_user/'.$data['id']);
					exit;
					
				} else if(isset($data['id_user_category']) && $data['id_user_category'] == '1') {
				
				//if active user record is present set the session variables
				   $sessiondata = array(
						  'id_log_user' => $data['id'],
						  'username' => $username,
						  'name' => $data['name'],
						  'u_category' => 'admin',
						  'loginuser' => TRUE
					);
					$this->session->set_userdata($sessiondata);
					
					redirect('users');
					exit;
				} else {
					$this->session->set_flashdata('msg', 
					 '<div class="alert alert-danger text-center">Invalid username and/or password!</div>');
					redirect('login');
					exit;
				}
			}
		}
	}
	
	public function get_user($id) {
		
		$this->_check_login();
		
		$data['title'] = ucfirst('get_user');
		
		if ( $this->input->is_ajax_request() ) {
			$data['age_category'] = $this->age_category_model->get_age_category();
			$data['user'] = $this->user_model->get_users($id);
			$json = '{ "username":"'.$data['user']['username'].'", 
						"id_user_category":"'.$data['user']['id_user_category'].'",
						"id_age_category":"'.$data['user']['id_age_category'].'",
						"name":"'.$data['user']['name'].'",
						"email":"'.$data['user']['email'].'",
						"phone_number":"'.$data['user']['phone_number'].'",
						"description":"'.$data['user']['description'].'",
					  }';
			echo $json;
			
		} else {
			echo 'Sorry this is not ajax !';
		}
	}
	
	public function index() {
		
		if ($this->_check_login() == 'user')
			redirect(login);
		$data['age_category'] = $this->age_category_model->get_age_category();
		$data['user_category'] = $this->user_category_model->get_user_category();
		$data['title'] = ucfirst('users list');
		$temp = $this->user_model->get_users();
		$users = array();
		foreach($temp as $user) {
			$user['tooltip'] = 'Username: '.$user['username'].';  Name: '.$user['name'].';  Email: '.$user['email'].';  Phone: '.$user['phone_number'];
			$users[$user['id']] = $user;
		}
		
		$data['users'] = $users;
		
		$this->load->view('templates/header', $data);
		$this->load->view('users/view_age_categories_modal', $data);
		$this->load->view('users/view_admin_user_modal', $data);
		$this->load->view('users/view_users_list', $data);
		$this->load->view('templates/footer', $data);
		
	}
	
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('loginuser');
		$this->session->sess_destroy();
		redirect('/');
	}
	
	public function set_user() {
		$this->_check_login();
		
		if ( $this->input->is_ajax_request() ) {
			$id_sel = $this->input->post('id_sel');
			
			if($id_sel>0)
				$this->form_validation->set_rules('username', 'Username', 'required');
			else {
				$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
				$this->form_validation->set_rules("password", "Password", "callback_password_check");
			}
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('phone_number', 'Phone number', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');	
			if ($this->form_validation->run() === FALSE) {
				echo validation_errors();
				 
			} else {
				if ($id_sel >0) {
					$this->user_model->update();
					echo 'The user was updated !';
				} else { 
					$this->user_model->set_user();
					echo 'The user was registered !';
				}
			}
		} else {
			echo 'Sorry it is not ajax !';
		}
	}
	
	public function reset() {
		
		$data['title'] = ucfirst('reset password'); // Capitalize the first letter
		$email = $this->input->post('email');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');	
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('users/reset', $data);
			$this->load->view('templates/footer', $data);
		} else {
			
			$new_password = 'USER!'.time();
			$this->user_model->reset_psw($email, $new_password);
			$inside_mail = 'Password: '.$new_password;
			$subject = "Reset password";
			$headers  = "MIME-Version: 1.0". "\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1". "\r\n";
			$headers .= 'From: emilescu.890m.com <emi_lescu@yahoo.ro>'. "\r\n";
			mail($email, $subject , $inside_mail, $headers);
			
			
			
			/*
			$this->load->library('email'); // load email library
			$this->email->from('pemilpop@gmail.com', 'sender name');
			$this->email->to('pemilpop@gmail.com');
			$this->email->cc('emi_lescu@yahoo.com'); 
			$this->email->subject('Your Subject');
			$this->email->message('Your Message');
			//$this->email->attach('/path/to/file1.png'); // attach file
			//$this->email->attach('/path/to/file2.pdf');
			if ($this->email->send()) {
				echo "Mail Sent!";
			} else {
				$data['message'] = "There is error in sending mail! but ... new pessword is:".$new_password;
				$this->load->view('templates/header', $data);
				$this->load->view('users/reset', $data);
				$this->load->view('templates/footer', $data);
			}*/
		}
	}
	
	public function filter_users() {
		if ($this->_check_login() == 'user')
			redirect(login);
		
		if ( $this->input->is_ajax_request() ) {
			
			$f_age_category = $_REQUEST['f_age_category'];
			$f_username = $_REQUEST['f_username'];
			$f_user_category = $_REQUEST['f_user_category'];
			$f_order_by = $_REQUEST['f_order_by'];

			$users = $this->user_model->get_filter_users($f_username, $f_age_category, $f_user_category, $f_order_by);
			$output ='';
			foreach($users as $user_item) {
				$tooltip = 'Username: '.$user_item['username'].';  Name: '.$user_item['name'].';  Email: '.$user_item['email'].';  Phone: '.$user_item['phone_number'];
				$output .= '<tr onclick="edit_user('.$user_item['id'].')" data-toggle="tooltip" data-placement="top" title="'.$tooltip.'" class="tr_usr" id="'.$user_item['id'].'" >
								<td>'.$user_item['username'].'</td>
								<td>'.$user_item['email'].'</td>
								<td>'.$user_item['name'].'</td>
								<td>'.$user_item['phone_number'].'</td>
								<td>'.$user_item['u_category'].'</td>
								<td>'.$user_item['a_category'].'</td>
							</tr>';
			}
			echo $output;
			//echo $this->db->last_query();
		} else {
			echo 'Sorry it is not ajax !';
		}		
	}

}