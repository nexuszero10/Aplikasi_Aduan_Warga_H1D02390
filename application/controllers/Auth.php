<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->library('session');
    }

    // menampilkan form login sebagai index
    public function index(){   
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'warga') {
                redirect('warga/index');
            } else {
                redirect('admin/index');
            }
        }
        $this->load->view('auth/login');
    }

    // menangangi verifikasi login 
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // verifikasi login admin
        if (strpos($username, '@admin') !== false) {
            $admin = $this->db->get_where('admin', ['username' => $username])->row();
            if ($admin && $password === $admin->password) {
                $this->session->set_userdata([
                    'logged_in' => true,
                    'role' => 'admin',
                    'username' => $admin->username
                ]);
                redirect('admin/index');
            } else {
                $this->session->set_flashdata('error', 'Username atau password admin salah');
                redirect('auth/index');
            }
        } else {
            // verifikasi login warga
            $warga = $this->db->get_where('warga', [
                'nama' => $username,
                'telepon' => $password
            ])->row();

            if ($warga) {
                $this->session->set_userdata([
                    'logged_in' => true,
                    'role' => 'warga',
                    'warga_id' => $warga->warga_id,
                    'nama' => $warga->nama,
                    'telepon' => $warga->telepon
                ]);
                redirect('warga/index');
            } else {
                $this->session->set_flashdata('error', 'Nama atau nomor telepon salah');
                redirect('auth/index');
            }
        }
    }

    // menangani logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/index');
    }
}
