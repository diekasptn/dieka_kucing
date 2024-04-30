<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats013 extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(! $this->session->userdata('username')) redirect('auth013/login');
		$this->load->model('Cats013_model');
		$this->load->model('categories013_model');
	}

	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('cats013/index');
		$config['total_rows'] = $this->db->count_all('cats013');
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$limit=$config['per_page'];
		$start=$this->uri->segment(3)?$this->uri->segment(3):0;

		$data['i']=$start + 1;
		$data['cats']=$this->Cats013_model->read($limit,$start);
		$this->load->view('cats013/cat_list_013',$data);
	}

	public function add()
	{
		if($this->input->post('submit')) {
			$this->Cats013_model->create();
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Cat successfuly added !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Cat add failed !</p>');
			}
			redirect('cats013');
		}
		$data['category']=$this->categories013_model->read();
		$this->load->view('cats013/cat_form_013', $data);
	}

	public function edit($id)
	{
		if($this->input->post('submit')) {
			$this->Cats013_model->update($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Cat successfuly update !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Cat update failed !</p>');
			}
			redirect('cats013');
		}
		$data['category']=$this->categories013_model->read();
		$data['cat']=$this->Cats013_model->read_by($id);
		$this->load->view('cats013/cat_form_013',$data);
	}

	public function delete($id)
	{
		$this->Cats013_model->delete($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Cat successfuly delete !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Cat delete failed !</p>');
			}
			redirect('cats013');
	}

	public function sale($id)
	{
		if($this->input->post('submit')) {
			$this->Cats013_model->sale($id);
			if($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('msg','<p style="color:green">Cat successfuly sold !</p>');
			} else {
				$this->session->set_flashdata('msg','<p style="color:red">Cat sale failed !</p>');
			}
			redirect('cats013');
		}

		$data['cat']=$this->Cats013_model->read_by($id);
		$this->load->view('cats013/cat_sale_013',$data);
	}

	public function sales()
	{
		if ($this->session->userdata('usertype') !='Manager') redirect('welcome');
		$data['sales']=$this->Cats013_model->sales();
		$this->load->view('cats013/sale_list_013',$data);
	}
}
