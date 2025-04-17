<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Aduan_model');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/index');
        }
    }

    // menampilkan halaman edit aduan
    public function edit($aduan_id){
        $aduan = $this->Aduan_model->get_by_id($aduan_id);

        $data['aduan'] = $aduan;
        $this->load->view('warga/edit', $data);
    }

    // menampilkan halaman detail aduan
    public function show($aduan_id){
        $aduan = $this->Aduan_model->get_by_id($aduan_id);
        $data['aduan'] = $aduan;
        $this->load->view('warga/show', $data);
    }

    // mengambil data dari form tambah aduan oleh warga
    public function store(){
        $data = [
            'warga_id' => $this->session->userdata('warga_id'),
            'detail'   => $this->input->post('detail', true),
            'status'   => 'baru',
        ];
        $this->Aduan_model->insert($data);
        redirect('warga/index');
    }

    // menangani update aduan oleh warga
    public function update($aduan_id){
        $aduan = $this->Aduan_model->get_by_id($aduan_id);
        $data = [
            'detail' => $this->input->post('detail'),
            'status' => $aduan->status // tidak diubah
        ];

        $this->Aduan_model->update($aduan_id, $data);
        redirect('warga');
    }

    // menangani delete aduan oleh warga 
    public function delete($aduan_id){
        $aduan = $this->Aduan_model->get_by_id($aduan_id);
        $this->Aduan_model->delete($aduan_id);
        redirect('warga');
    }

    public function chartData(){
        $this->load->model('Aduan_model');
        $data = $this->Aduan_model->getAduanCountByStatus();
        echo json_encode($data);
    }

}
