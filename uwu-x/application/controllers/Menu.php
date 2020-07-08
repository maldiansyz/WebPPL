<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controller Menu  disini
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambahmenu()
    {
        $data['title'] = 'Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('tb_user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('tb_user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">New menu added!</div>');
            redirect('menu');
        }
    }
    public function editmenu($id)
    {
        $data['title'] = 'Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->Menu_model->getDetailmenu($id);
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->getDetailmenu($id);
            $menu = $this->input->post('menu');
            $id = $this->input->post('id');

            $this->db->set('menu', $menu);
            $this->db->where('id', $id);
            $this->db->update('tb_user_menu', $menu);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Edit menu berhasil</div>');
            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();
        $data['getmenu'] = ['1', '2', '3'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }
    public function tambahsubmenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->Menu_model->getSubMenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data =  [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->insert('tb_user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">New Sub menu added!</div>');
            redirect('menu/submenu');
        }
    }
    public function editsubmenu($id)
    {
        $data['title'] = 'Sub Menu Management';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Menu_model->getSubMenu();
        $this->Menu_model->getDetailsubMenu($id);
        $data['getmenu'] = ['1', '2', '3'];

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $title = $this->input->post('title');
            $data =  [
                'title' => $title,
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->set('title', $title);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tb_user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">Edit Sub menu Berhasil</div>');
            redirect('menu/submenu');
        }
    }
    public function hapusSubMenu($id)
    {
        $data['title'] = 'Sub Menu Management';
        $this->Menu_model->hapusData($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub Menu berhasil dihapus </div>');
        redirect('menu/submenu');
    }
    public function hapusMenu($id)
    {
        $data['title'] = 'Menu Management';
        $this->Menu_model->hapusMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu berhasil dihapus </div>');
        redirect('menu');
    }
}
