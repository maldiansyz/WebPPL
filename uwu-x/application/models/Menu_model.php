<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query = "SELECT `tb_user_sub_menu`.*, `tb_user_menu`.`menu` 
                    FROM `tb_user_sub_menu` JOIN `tb_user_menu`
                    ON `tb_user_sub_menu`.`menu_id` = `tb_user_menu`.`id`
                ";

        return $this->db->query($query)->result_array();
    }
    public function hapusData($id)
    {
        //$this->db->where('id',$id);
        $this->db->delete('tb_user_sub_menu', ['id' => $id]);
    }
    public function hapusMenu($id)
    {
        //$this->db->where('id',$id);
        $this->db->delete('tb_user_menu', ['id' => $id]);
    }
    public function getDetailmenu($id)
    {
        return $this->db->get_where('tb_user_menu', ['id' => $id])->row_array();
    }
    public function getDetailsubmenu($id)
    {
        return $this->db->get_where('tb_user_sub_menu', ['id' => $id])->row_array();
    }
}
