<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth013 extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('Auth013_model');
	}

    public function login()
    {
        if($this->input->post('login') && $this->validation('login')) {
            $login=$this->Auth013_model->getuser($this->input->post('username'));
            if($login != NULL) {
                if(password_verify($this->input->post('password'), $login->password_013)) {
                    $data = array (
                        'username' => $login->username_013,
                        'usertype' => $login->usertype_013,
                        'fullname' => $login->fullname_013,
                        'photo' => $login->photo_013
                    );
                    $this->session->set_userdata($data);
                    redirect('welcome');
                }
            } 
            $this->session->set_flashdata('msg','<p style="color:red">Invalid username or password !</p>');
        }
        $this->load->view('auth013/form_login_013');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth013/login');
    }

    public function changepass()
    {
        if(! $this->session->userdata('username')) redirect('auth013/login'); //filter LOGIN
        if($this->input->post('change') && $this->validation('change')) {
            $change=$this->Auth013_model->getuser($this->session->userdata('username'));
            if(password_verify($this->input->post('oldpassword'), $change->password_013)) {
                if($this->Auth013_model->changepass())
                    $this->session->set_flashdata('msg','<p style="color:green">Password sucessfully changed!</p>');
                else 
                    $this->session->set_flashdata('msg','<p style="color:green">Change password failed!</p>');
            }   else {
                $this->session->set_flashdata('msg','<p style="color:red">Wrong old password!</p>');
            }
        }
        $this->load->view('auth013/form_password_013');
    }

    public function changephoto()
    {
        if(! $this->session->userdata('username')) redirect('auth013/login'); //filter LOGIN
        $data['error']='';
        if($this->input->post('upload')) {
            if($this->upload()) { //jika sukses upload
                $this->Auth013_model->changephoto($this->upload->data('file_name')); //ubah data foto di database
                $this->session->set_userdata('photo',$this->upload->data('file_name')); //update data session
                $this->session->set_flashdata('msg','<p style="color:green">Photo succesfully changed ! </p>'); //pesan sukses
            } else $data['error'] = $this->upload->display_errors(); //jika gagal upload
        }
        $this->load->view('auth013/form_photo_013', $data);
    }

    private function upload()
    {
        $config['upload_path']              ='./uploads/users/';
        $config['allowed_types']            ='./gif|jpg|png|jpeg';
        $config['max_size']                 = 100;
        $config['max_width']                = 1024;
        $config['max_height']               = 768;

        $this->load->library('upload', $config);
        return $this->upload->do_upload('photo');
    }

    public function validation($type) {
        $this->load->library('form_validation');

        if($type=='login') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
        }else {
            $this->form_validation->set_rules('oldpassword', 'Old Password', 'required');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
        }

        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }
}
    