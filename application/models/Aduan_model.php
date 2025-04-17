<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan_model extends CI_Model{   

    // mengamnil semua data join warga dan aduan
    public function get_all(){
        $this->db->select('aduan.*, warga.nama, warga.telepon');
        $this->db->from('aduan');
        $this->db->join('warga', 'warga.warga_id = aduan.warga_id');
        $this->db->order_by("FIELD(aduan.status, 'baru', 'diproses', 'selesai')", null, false);
        return $this->db->get()->result();
    }

    // Mengambil aduan berdasarkan aduan_id
    public function get_by_id($aduan_id){
        return $this->db->get_where('aduan', ['aduan_id' => $aduan_id])->row();
    }

    // Menghapus aduan berdasarkan aduan_id
    public function delete($aduan_id){
        return $this->db->delete('aduan', ['aduan_id' => $aduan_id]);
    }

    // menambhakan data ke tabel aduan
    public function insert($data){
        return $this->db->insert('aduan', $data);
    }

    // update data aduan berdasrkan aduan_id
    public function update($aduan_id, $data){
        $this->db->where('aduan_id', $aduan_id);
        return $this->db->update('aduan', $data);
    }

    // upate status aduan berdasarkan aduan_id
    public function update_status($aduan_id, $status){
        $this->db->where('aduan_id', $aduan_id);
        return $this->db->update('aduan', ['status' => $status]);
    }

    // mengambil data join aduan warga berdasarkan aduan_id
    public function get_by_id_with_warga($aduan_id){
        $this->db->select('aduan.*, warga.nama, warga.telepon');
        $this->db->from('aduan');
        $this->db->join('warga', 'warga.warga_id = aduan.warga_id');
        $this->db->where('aduan.aduan_id', $aduan_id);
        return $this->db->get()->row();
    }

    // mengambil data klasifikasi aduan
    public function getAduanCountByStatus(){
        $this->db->select('status, COUNT(*) as total');
        $this->db->from('aduan');
        $this->db->group_by('status');
        $query = $this->db->get();
        return $query->result();    
    }
}
