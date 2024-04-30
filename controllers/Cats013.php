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

	public function changephoto($id)
    {
        if (!$this->session->userdata('username'))
            redirect('auth045/login'); //filter LOGIN
    
        // Load the cat data by id
        $data['cat'] = $this->Cats013_model->read_by($id);
    
        if ($this->input->post('upload')) {
            if ($this->upload()) { // Jika upload berhasil
                $this->Cats013_model->changephoto($this->upload->data('file_name'), $id); // Ubah data foto di DB
                $this->session->set_userdata('photo', $this->upload->data('file_name')); // Perbarui data session dengan URL foto yang baru diunggah
                $this->session->set_flashdata('msg', '<p style="color:lime">Photo successfully changed!</p>'); // Pesan sukses
    
                redirect('cats013'); // Redirect ke halaman daftar kucing setelah berhasil mengunggah foto
            } else {
                $data['error'] = $this->upload->display_errors(); // Jika upload gagal
            }
        }
        // Jika belum submit form, tampilkan halaman upload foto
        $this->load->view('cats013/cat_form_photo_013', $data);
    }
    

    public function upload()
    {
        $config['upload_path'] = './uploads/cats/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 300;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }
}
