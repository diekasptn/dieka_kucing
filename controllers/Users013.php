<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users013 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('username')) redirect('auth013/login');
		if ($this->session->userdata('usertype')!='Manager') redirect('welcome');
		$this->load->model('Users013_model');
	}

	public function index()
	{
		$data['users']=$this->Users013_model->read();
		$this->load->view('users013/user_list_013',$data);
	}

	public function add()
	{
		if($this->input->post('submit')) {
			$this->Users013_model->create();
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">User successfuly added !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">User add failed !</p>');
			}
			redirect('users013');
		}

		$this->load->view('users013/user_form_013');
	}

	public function edit($id)
	{
		if($this->input->post('submit')) {
			$this->Users013_model->update($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">User successfuly update !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">User update failed !</p>');
			}
			redirect('users013');
		}
		$data['user']=$this->Users013_model->read_by($id);
		$this->load->view('users013/user_form_013',$data);
	}

	public function delete($id)
	{
		$this->Users013_model->delete($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">User successfuly delete !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">User delete failed !</p>');
			}
			redirect('users013');
	}

	public function reset($id)
	{
		$this->Users013_model->reset($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('msg','<p style="color:green">Password successfuly reset !</p>');
		} else {
			$this->session->set_flashdata('msg','<p style="color:red">Reset Password Failed !</p>');
		}
		redirect('users013');
	}
	
}