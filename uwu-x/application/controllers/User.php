<?php
defined('BASEPATH') or exit('No direct script access allowed');

// controller user index disini
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Profile';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['gender'] = ['none', 'L', 'P'];
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('notelp', 'NoTelp', 'required|trim');
        $this->form_validation->set_rules('gender', 'gender', 'required|trim');
        //$this->form_validation->set_rules('username', 'Userame', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'notelp' => htmlspecialchars($this->input->post('notelp', true)),
                'gender' => htmlspecialchars($this->input->post('gender', true)),
            ];

            //cek jika ada gambar
            $upload_image = $_FILES['image']['name'];
            //var_dump($upload_image);
            //die;

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/profile/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['tb_user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('tb_user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Profile berhasil diupdate </div>');
            redirect('user');
        }
    }
    public function changepassword()
    {
        $data['title'] = 'Change Password';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['tb_user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Current Password! </div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password cannot be the same as current password! </div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('tb_user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Password Changed! </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
    public function databarang()
    {
        $data['title'] = 'Data Barang';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['data_barang'] = $this->db->get('tb_barang')->result_array();
        if ($this->input->post('keyword')) {
            $data['data_barang'] = $this->brg_crud->cariData();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/databarang', $data);
        $this->load->view('templates/footer');
    }

    public function tambahbarang()
    {
        $data['title'] = 'Data Barang';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('detail', 'Detail', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/databarang', $data);
            $this->load->view('templates/footer');

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Gagal menambahkan data barang !</div>');
            redirect('user/databarang');
        } else {
            $nama = $this->input->post('nama');
            $data = [
                'nama' => $nama,
                'jenis' => $this->input->post('jenis', true),
                'detail' => htmlspecialchars($this->input->post('detail', true)),
                'jumlah' => htmlspecialchars($this->input->post('jumlah', true)),
                'harga' => htmlspecialchars($this->input->post('harga', true)),
                'id_user' => htmlspecialchars($this->input->post('id_user', true)),
                'date_created' => time()
            ];
            $upload_image = $_FILES['gbr']['name'];
            //var_dump($upload_image);
            //die;

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/barang/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gbr')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gbr', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->db->set('nama', $nama);
            $this->db->where('id', $this->input->post('id'));
            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Barang berhasil ditambahkan </div>');
            redirect('user/databarang');
        }
    }

    public function transaksi()
    {
        $data['title'] = 'List Transaksi';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->get('tb_tran')->result_array();
        $data['jml'] = $this->db->get('tb_tran')->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/transaksi', $data);
        $this->load->view('templates/footer');
    }
    public function detailTran($id)
    {
        $data['title'] = 'List Transaksi';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tran'] = $this->db->get_where('tb_tran', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detailTran', $data);
        $this->load->view('templates/footer');
    }
    public function detailbrg($id)
    {
        $data['title'] = 'Detail Barang';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['brg'] = $this->brg_crud->getDetail($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detailbrg', $data);
        $this->load->view('templates/footer');
    }
    public function hapusbrg($id)
    {
        $data['title'] = 'Data Barang';
        $this->brg_crud->hapusdata($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barang berhasil dihapus </div>');
        redirect('user/databarang');
    }
    public function editbrg($id)
    {
        $data['title'] = 'Edit data';
        $data['tb_user'] = $this->db->get_where('tb_user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['brg'] = $this->brg_crud->getDetail($id);
        $data['jenis'] = ['PC & Laptop', 'Smartphone & Tablet', 'Electronic', 'Accessories', 'Lain-Lain'];
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('detail', 'Detail', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('harga', 'harga', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['brg'] = $this->brg_crud->getDetail($id);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/editbrg', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_image = $_FILES['gbr']['name'];
            //var_dump($upload_image);
            //die;
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|JPEG|png';
                $config['max_size']     = '2048';
                $config['upload_path']  = './assets/img/barang/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gbr')) {
                    $old_image = $data['brg']['gbr'];
                    if ($old_image != $upload_image) {
                        unlink(FCPATH . 'assets/img/barang/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gbr', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->brg_crud->editData();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Barang berhasil diedit </div>');
            redirect('user/databarang');
        }
    }
}
