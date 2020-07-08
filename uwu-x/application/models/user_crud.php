<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class user_crud extends CI_Model
{

    public function hapusData($id)
    {
        //$this->db->where('id',$id);
        $this->db->delete('tb_user', ['id' => $id]);
    }
    public function getDetail($id)
    {
        return $this->db->get_where('tb_user', ['id' => $id])->row_array();
    }
    public function editData()
    {
        $name = $this->input->post('name', true);
        $data = [
            'name' => $name,
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'notelp' => htmlspecialchars($this->input->post('notelp', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'role_id' => htmlspecialchars($this->input->post('role_id', true)),
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->set('name', $name);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user', $data);
    }
    public function cariData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('name', $keyword);
        $this->db->or_like('username', $keyword);
        $this->db->or_like('email', $keyword);
        return $this->db->get('tb_user')->result_array();
    }
    public function hapusRole($id)
    {
        //$this->db->where('id',$id);
        $this->db->delete('tb_user_role', ['id' => $id]);
    }
    public function GetRole($id)
    {
        return $this->db->get_where('tb_user_role', ['id' => $id])->row_array();
    }
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */