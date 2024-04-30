<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users013_model extends CI_Model {

	public function create()
	{
		$data = array (
            'username_013' => $this->input->post('username_013'),
            'usertype_013' => $this->input->post('usertype_013'),
            'fullname_013' => $this->input->post('fullname_013'),
            'password_013' => password_hash($this->input->post('usertype_013'), PASSWORD_DEFAULT)
        );
        $this->db->insert('users013',$data);
	}

	public function read()
	{
		$query=$this->db->get('users013');
        return $query->result();
	}

    public function read_by($id)
	{
        $this->db->where('userid_013',$id);
		$query=$this->db->get('users013');
        return $query->row();
	}

    public function update($id)
    {
        $data = array (
            'username_013' => $this->input->post('username_013'),
            'password_013' => $this->input->post('password_013'),
            'usertype_013' => $this->input->post('usertype_013'),
            'fullname_013' => $this->input->post('fullname_013'),
            );
        $this->db->where('userid_013',$id);
        $this->db->update('users013',$data);
    }

    public function delete($id)
    {
        $this->db->where('userid_013',$id);
        $this->db->delete('users013');
    }

    public function reset($id)
    {
        $user = $this->db->where('userid_013', $id)->get('users013')->row();
        if($user) {
            $default_password = $user->usertype_013;
            $data = array(
                'password_013' => password_hash($default_password, PASSWORD_DEFAULT)
            );
            $this->db->where('userid_013', $id);
            $this->db->update('users013', $data);
        }
    }
}
