<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

    public function insert_pembayaran($data) {
        return $this->db->insert('pembayaran_pinjaman', $data);
    }

    public function get_pembayaran_by_anggota_id($anggota_id) {
        $this->db->where('Anggota_ID', $anggota_id);
        $query = $this->db->get('Pembayaran_pinjaman');
        return $query->result();
    }

    public function get_total_pembayaran() {
        $this->db->select_sum('Jumlah');
        $query = $this->db->get('pembayaran_pinjaman');
        $result = $query->row();
        return $result->Jumlah;
    }

    public function get_all_pembayaran() {
        return $this->db->get('Pembayaran_pinjaman')->result();
    }

    public function count_all_pembayaran() {
        return $this->db->count_all('Pembayaran_pinjaman');
    }

    public function get_pembayaran_by_id($id) {
        $this->db->where('Pembayaran_ID', $id);
        $query = $this->db->get('pembayaran_pinjaman');
        return $query->row();
    }

    // Tambahkan method delete_pembayaran
    public function delete_pembayaran($id) {
        $this->db->where('Pembayaran_ID', $id);
        return $this->db->delete('pembayaran_pinjaman');
    }

    public function update_pembayaran($id, $data) {
        // Hapus 'pembayaranId' dari $data jika ada
        if(isset($data['pembayaranId'])) {
            unset($data['pembayaranId']);
        }
        
        $this->db->where('Pembayaran_ID', $id);
        return $this->db->update('pembayaran_pinjaman', $data);
    }

    public function get_recent_transactions($limit = 5) {
        // Query untuk pinjaman
        $this->db->select('a.Nama, "Pinjaman" as Jenis, p.Jumlah, p.Tanggal_Pinjaman as Tanggal')
                 ->from('pinjaman p')
                 ->join('anggota a', 'p.Anggota_ID = a.Anggota_ID')
                 ->where('a.is_deleted', 0);
        $pinjaman = $this->db->get_compiled_select();
    
        // Query untuk pembayaran pinjaman
        $this->db->select('a.Nama, "Pembayaran Pinjaman" as Jenis, pp.Jumlah, pp.Tanggal_Pembayaran as Tanggal')
                 ->from('pembayaran_pinjaman pp')
                 ->join('anggota a', 'pp.Anggota_ID = a.Anggota_ID')
                 ->where('a.is_deleted', 0);
        $pembayaran = $this->db->get_compiled_select();
    
        // Query untuk simpanan
        $this->db->select('a.Nama, CONCAT("Simpanan ", s.Jenis_Simpanan) as Jenis, s.Jumlah, s.Tanggal')
                 ->from('simpanan s')
                 ->join('anggota a', 's.Anggota_ID = a.Anggota_ID')
                 ->where('a.is_deleted', 0);
        $simpanan = $this->db->get_compiled_select();
    
        // Gabungkan semua query dan urutkan
        $query = $this->db->query("($pinjaman) UNION ALL ($pembayaran) UNION ALL ($simpanan) ORDER BY Tanggal DESC LIMIT $limit");
        
        return $query->result();
    }
}