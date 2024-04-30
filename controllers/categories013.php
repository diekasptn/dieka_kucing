<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories013 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('username')) redirect('auth013/login');
		$this->load->model('categories013_model');
	}

	public function index()
	{
		$data['categories013']=$this->categories013_model->read();
		$this->load->view('categories013/category_list_013',$data);
	}

	public function add()
	{
		if($this->input->post('submit')) {
			$this->categories013_model->create();
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Category successfuly added !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Category add failed !</p>');
			}
			redirect('categories013');
		}
		
		$this->load->view('categories013/category_form_013');
	}

	public function edit($id)
	{
		if($this->input->post('submit')) {
			$this->categories013_model->update($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Category successfuly update !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Category update failed !</p>');
			}
			redirect('categories013');
		}

		$data['category']=$this->categories013_model->read_by($id);
		$this->load->view('categories013/category_form_013',$data);
	}

	public function delete($id)
	{
		$this->categories013_model->delete($id);
		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg','<p style="color:green">Category successfuly delete !</p>');
		} else {
			$this->session->set_flashdata('msg','<p style="color:red">Category delete failed !</p>');
		}
		redirect('categories013');
	}
}
