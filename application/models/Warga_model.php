<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga_model extends CI_Model{

    // Ambil semua data warga beserta aduan mereka
    public function get_all() {
        $warga_id = $this->session->userdata('warga_id');
        
        $this->db->select('aduan.*, warga.nama, warga.telepon');
        $this->db->from('aduan');
        $this->db->join('warga', 'warga.warga_id = aduan.warga_id');
        
        // Urutkan agar aduan milik warga yang login berada di atas
        $this->db->order_by("aduan.warga_id = $warga_id", "DESC", false);
        // Lalu urutkan berdasarkan status
        $this->db->order_by("FIELD(aduan.status, 'baru', 'diproses', 'selesai')", null, false);
        $this->db->order_by('aduan.aduan_id', 'DESC');
    
        return $this->db->get()->result();
    }
    

    // Menambahkan data warga baru
    public function insert($data){
        return $this->db->insert('warga', $data);
    }

    // Mengambil data warga berdasarkan ID
    public function get_by_id($warga_id){
        return $this->db->get_where('warga', ['warga_id' => $warga_id])->row();
    }

    // Mengupdate data warga berdasarkan ID
    public function update($warga_id, $data){
        return $this->db->where('warga_id', $warga_id)->update('warga', $data);
    }

    // Menghapus data warga berdasarkan ID
    public function delete($warga_id){
        return $this->db->delete('warga', ['warga_id' => $warga_id]);
    }

    // Mencari warga berdasarkan keyword (nama atau status aduan)
    public function searchWarga($keyword){
        if ($keyword) {
            $this->db->like('warga.nama', $keyword);
            $this->db->or_like('aduan.status', $keyword);
        }
        $this->db->join('aduan', 'warga.warga_id = aduan.warga_id', 'left');
        return $this->db->get('warga')->result();
    }

    // Mencari warga berdasarkan nama dan telepon (untuk login)
    public function get_by_nama_telepon($nama, $telepon){
        return $this->db->get_where('warga', ['nama' => $nama, 'telepon' => $telepon])->row_array();
    }
}
