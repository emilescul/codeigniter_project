<?php
class Age_category extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('age_category_model');
	}

	
	
	public function add_age_category() {
		$data['title'] = 'Create a new age category item';
		$title = $this->input->post('title');
		$this->form_validation->set_rules('title', 'Title', 'required');
		if ( $this->input->is_ajax_request() ) {
			if ($this->form_validation->run() === FALSE) {
				echo  form_error('title');
			} else {
				$this->age_category_model->add_category();
				echo 'It is ok !';
			}
		}
			
	}
	public function del_age_category()
	{
		$data['title'] = 'Delete a age category item';
		$this->form_validation->set_rules('id_sel', 'Id selected', 'required');
		if ( $this->input->is_ajax_request() ) {
			if ($this->form_validation->run() === FALSE)
			{
				echo 'There is someting wrong';
			}
			else
			{
				$this->age_category_model->del_category();
				echo 'The age category was removed';
			}
		}
	}
}