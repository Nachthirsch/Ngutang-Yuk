<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan_model extends CI_Model {

    public function get_all_simpanan() {
        return $this->db->get('Simpanan')->result();
    }

    public function get_simpanan_by_id($id) {
        return $this->db->get_where('Simpanan', array('Simpanan_ID' => $id))->row();
    }

    public function get_simpanan_by_anggota_id($anggota_id) {
        $this->db->where('Anggota_ID', $anggota_id);
        return $this->db->get('Simpanan')->result();
    }

    public function create_simpanan($data) {
        return $this->db->insert('Simpanan', $data);
    }

    public function get_total_simpanan() {
        $this->db->select_sum('Jumlah');
        $query = $this->db->get('simpanan');
        $result = $query->row();
        return $result->Jumlah;
    }

    public function count_all_simpanan() {
        return $this->db->count_all('Simpanan');
    }

    public function update_simpanan($id, $data) {
        $this->db->where('Simpanan_ID', $id);
        return $this->db->update('Simpanan', $data);
    }

    public function delete_simpanan($id) {
        $this->db->where('Simpanan_ID', $id);
        return $this->db->delete('Simpanan');
    }
}