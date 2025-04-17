<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('Warga_model');
        $this->load->library('session');

        // pengecekan jika warga belum login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/index'); 
        }
    }

    // menampilkan halaman index || daftar aduan warga lain
    public function index(){
        $data['warga'] = $this->Warga_model->get_all();
        $data['nama'] = $this->session->userdata('nama');
        $this->load->view('warga/index', $data);
    }

    // menampilkan halaman tamba aduan baru
    public function create(){
        $data['nama'] = $this->session->userdata('nama');
        $data['telepon'] = $this->session->userdata('telepon');
        $data['warga_id'] = $this->session->userdata('warga_id');

        $this->load->view('warga/create', $data);
    }

}
