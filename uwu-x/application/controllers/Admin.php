<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controller admin index disini
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['jml_user'] = $this->db->query('SELECT COUNT(*) as jml FROM tb_user', ['name' =>
        $this->session->userdata('name')])->row_array();
        $data['jml_barang'] = $this->db->query('SELECT COUNT(*) as jml FROM tb_barang', ['nama' =>
        $this->session->userdata('nama')])->row_array();
        $data['jml_tran'] = $this->db->query('SELECT COUNT(*) as jml FROM tb_tran', ['nama' =>
        $this->session->userdata('nama')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    public function datauser()
    {
        $data['title'] = 'Data User';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['data_user'] = $this->db->get('tb_user')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datauser', $data);
        $this->load->view('templates/footer');
    }

    public function tambahuser()
    {
        $data['title'] = 'Data User';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Userame', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/datauser', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image']['name'];
            //var_dump($upload_image);
            //die;

            if (!$upload_image) {
                $data = [
                    'name' => htmlspecialchars($this->input->post('name', true)),
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'image' => 'default.jpg',
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'alamat' => '-',
                    'notelp' => '-',
                    'gender' => 'none',
                    'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                    'is_active' => 1,
                    'date_created' => time()
                ];
                $this->db->insert('tb_user', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan </div>');
                redirect('admin/datauser');
            } else {
                $name = $this->input->post('name', true);
                $data = [
                    'name' => $name,
                    'username' => htmlspecialchars($this->input->post('username', true)),
                    'email' => htmlspecialchars($this->input->post('email', true)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'alamat' => '-',
                    'notelp' => '-',
                    'gender' => 'none',
                    'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                    'is_active' => 1,
                    'date_created' => time()
                ];
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/profile/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('name', $name);
            $this->db->where('id', $this->input->post('id'));
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil ditambahkan </div>');
            redirect('admin/datauser');
        }
    }

    public function detailuser($id)
    {
        $data['title'] = 'Detail User';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user'] = $this->user_crud->getDetail($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detailuser', $data);
        $this->load->view('templates/footer');
    }
    public function hapususer($id)
    {
        $data['title'] = 'Data User';
        $this->user_crud->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User berhasil dihapus </div>');
        redirect('admin/datauser');
    }
    public function edituser($id)
    {
        $data['title'] = 'Edit User';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user'] = $this->user_crud->getDetail($id);
        $data['gender'] = ['none', 'L', 'P'];
        $data['role_id'] = ['1', '2'];
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Userame', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('notelp', 'NoTelp', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->user_crud->getDetail($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edituser', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['image'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/profile/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->user_crud->editData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User berhasil diedit </div>');
            redirect('admin/datauser');
        }
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function tambahrole()
    {
        $data['title'] = 'Role';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];
            // insert ke db
            $this->db->insert('tb_user_role', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil ditambahkan </div>');
            redirect('admin/role');
        }
    }
    public function roleaccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $role_id])->row_array();

        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeaccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);
        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_access_menu', $data);
        } else {
            $this->db->delete('tb_user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed! </div>');
    }
    public function hapusRole($id)
    {
        $data['title'] = 'Role';
        $this->user_crud->hapusRole($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role berhasil dihapus </div>');
        redirect('admin/role');
    }
    public function editRole($id)
    {
        $data['title'] = 'Role';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('tb_user_role')->result_array();
        $this->user_crud->GetRole($id);
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->user_crud->GetRole($id);
            $role = $this->input->post('role');

            $this->db->set('role', $role);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('tb_user_role', $role);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role berhasil diedit </div>');
            redirect('admin/role');
        }
    }
}
