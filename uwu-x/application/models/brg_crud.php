<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class brg_crud extends CI_Model
{

    public function hapusData($id)
    {
        //$this->db->where('id',$id);
        $this->db->delete('tb_barang', ['id' => $id]);
    }
    public function getDetail($id)
    {
        return $this->db->get_where('tb_barang', ['id' => $id])->row_array();
    }
    public function editData()
    {
        $nama = $this->input->post('nama', true);
        $data = [
            'nama' => $nama,
            'jenis' => $this->input->post('jenis', true),
            'detail' => htmlspecialchars($this->input->post('detail', true)),
            'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),
            'date_created' => time()
        ];
        $this->db->set('nama', $nama);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_barang', $data);
    }
    public function cariData()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('jenis', $keyword);
        return $this->db->get('tb_barang')->result_array();
    }
}

/* End of file Perpus_model.php */
/* Location: ./application/models/Perpus_model.php */