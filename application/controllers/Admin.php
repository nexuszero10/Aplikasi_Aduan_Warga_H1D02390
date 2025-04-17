<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/index');
        }
        $this->load->model('Aduan_model');
    }

    // mengakses dashboard admin
    public function index()
    {
        $data['aduan'] = $this->Aduan_model->get_all();
        $this->load->view('admin/index', $data);
    }

    // menangani aduan warga -> mendapatkan detail aduan dari satu warga
    public function ubah_status($aduan_id)
    {
        $data['aduan'] = $this->Aduan_model->get_by_id_with_warga($aduan_id);
        if (!$data['aduan']) {
            show_404();
        }
        $this->load->view('admin/ubah_status', $data);
    }

    // mengubah status aduan warga 
    public function update_status($aduan_id)
    {
        $status = $this->input->post('status');
        $this->Aduan_model->update_status($aduan_id, $status);
        $this->session->set_flashdata('success', 'Status aduan berhasil diperbarui.');
        redirect('admin/index');
    }
}
