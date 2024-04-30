<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth013_model extends CI_Model {

    public function getuser ($username)
    {
        $this->db->where('username_013',$username);
        return $this->db->get('users013')->row();
    }

    public function changepass()
    {
        $this->db->set('password_013', password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT));
        $this->db->where('username_013',$this->session->userdata('username'));
        return $this->db->update('users013');
    }
    
    public function changephoto($photo)
    {
        if($this->session->userdata('photo') !== 'default.png')
            unlink('./uploads/users/'.$this->session->userdata('photo')); //hapus foto lama

        $this->db->set('photo_013', $photo);
        $this->db->where('username_013', $this->session->userdata('username'));
        return $this->db->update('users013');
    }
}

