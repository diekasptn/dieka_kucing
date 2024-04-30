<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cats013_model extends CI_Model {

	public function create()
	{
		$data = array (
            'name_013' => $this->input->post('name_013'),
            'type_013' => $this->input->post('type_013'),
            'gender_013' => $this->input->post('gender_013'),
            'age_013' => $this->input->post('age_013'),
            'price_013' => $this->input->post('price_013')
        );
        $this->db->insert('cats013',$data);
	}

	public function read($limit,$start)
	{
        $this->db->limit($limit,$start);
		$query=$this->db->get('cats013');
        return $query->result();
	}

    public function read_by($id)
	{
        $this->db->where('id_013',$id);
		$query=$this->db->get('cats013');
        return $query->row();
	}

    public function update($id)
    {
        $data = array (
            'name_013' => $this->input->post('name_013'),
            'type_013' => $this->input->post('type_013'),
            'gender_013' => $this->input->post('gender_013'),
            'age_013' => $this->input->post('age_013'),
            'price_013' => $this->input->post('price_013')
        );
        $this->db->where('id_013',$id);
        $this->db->update('cats013',$data);
    }

    public function delete($id)
    {
        $this->db->where('id_013',$id);
        $this->db->delete('cats013');
    }

    public function validation() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name_013', 'Cat name', 'required');
        $this->form_validation->set_rules('type_013', 'Cat type', 'required');
        $this->form_validation->set_rules('gender_013', 'Cat gender', 'required|numeric');
        $this->form_validation->set_rules('price_013', 'Cat price', 'required|numeric');

        if($this->form_validation->run())
            return TRUE;
        else
            return FALSE;
    }

    public function sale($id)
    {
        $data = array (
            'customer_name_013' => $this->input->post('customer_name_013'),
            'customer_address_013' => $this->input->post('customer_address_013'),
            'customer_phone_013' => $this->input->post('customer_phone_013'),
            'cat_id_013' => $id
        );
        $this->db->insert('catsales013', $data);
        
        $this->db->set('sold_013','1');
        $this->db->where('id_013',$id);
        $this->db->update('cats013');
    }

    public function sales()
	{
		$query=$this->db->get('catsales013');
        return $query->result();
	}

    public function changephoto ($file,$id){
        $this->db->select('photo_cats_013');
        $this->db->from('cats013');
        $this->db->where('id_013', $id);
        $query = $this->db->get();
        $photo = $query->row()->photo_cats;

        if($photo != 'default.png'){
        unlink('uploads/cats/'.$photo);

        $this->db->set('photo_cats_013', $file);
        $this->db->where('id_013',$id);
        return $this->db->update('cats013');
        }
    }
}
