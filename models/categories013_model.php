<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class categories013_model extends CI_Model {

	public function create()
	{
		$data = array (
            'category_name_013' => $this->input->post('category_name_013'),
            'description_013' => $this->input->post('description_013'),
        );
        $this->db->insert('categories013',$data);
	}

	public function read()
	{
		$query=$this->db->get('categories013');
        return $query->result();
	}

    public function read_by($id)
	{
        $this->db->where('category_id_013',$id);
		$query=$this->db->get('categories013');
        return $query->row();
	}

    public function update($id)
    {
        $data = array (
            'category_name_013' => $this->input->post('category_name_013'),
            'description_013' => $this->input->post('description_013'),
            );
        $this->db->where('category_id_013',$id);
        $this->db->update('categories013',$data);
    }

    public function delete($id)
    {
        $this->db->where('category_id_013',$id);
        $this->db->delete('categories013');
    }
}
