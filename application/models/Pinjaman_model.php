<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman_model extends CI_Model {

    public function get_all_pinjaman() {
        return $this->db->get('pinjaman')->result();
    }

    public function get_pinjaman_by_id($id) {
        return $this->db->get_where('pinjaman', array('Pinjaman_ID' => $id))->row();
    }

    public function create_pinjaman($data) {
        $insert = $this->db->insert('pinjaman', array(
            'Anggota_ID' => $data['Anggota_ID'],
            'Jumlah' => $data['Jumlah'],
            'Durasi' => $data['Durasi'],
            'Tanggal_Pinjaman' => $data['Tanggal_Pinjaman'],
            'Bunga' => $data['Bunga'],
            'Total_Bunga' => $data['Total_Bunga'],
            'Bunga_Bulanan' => $data['Bunga_Bulanan'],
            'Total_Jumlah' => $data['Total_Jumlah'],
            'Angsuran_Bulanan' => $data['Angsuran_Bulanan'],
            'Status' => $data['Status']
        ));

        if ($insert) {
            return array('status' => 'success', 'message' => 'Pinjaman created successfully');
        } else {
            return array('status' => 'error', 'message' => 'Failed to create pinjaman');
        }
    }

    public function get_total_pinjaman() {
        $this->db->select_sum('Jumlah');
        $query = $this->db->get('pinjaman');
        $result = $query->row();
        return $result->Jumlah;
    }

    public function get_pinjaman_by_anggota_id($anggotaId) {
        return $this->db->get_where('pinjaman', array('Anggota_ID' => $anggotaId))->result();
    }

    public function update_pinjaman($data) {
        $this->db->where('Pinjaman_ID', $data['pinjamanId']);
        $update = $this->db->update('pinjaman', array(
            'Jumlah' => $data['Jumlah'],
            'Durasi' => $data['Durasi'],
            'Tanggal_Pinjaman' => $data['Tanggal_Pinjaman'],
            'Bunga' => $data['Bunga'],
        ));

        if ($update) {
            return array('status' => 'success', 'message' => 'Pinjaman updated successfully');
        } else {
            return array('status' => 'error', 'message' => 'Failed to update pinjaman');
        }
    }

    public function delete_pinjaman($id) {
        $this->db->where('Pinjaman_ID', $id);
        $delete = $this->db->delete('pinjaman');

        if ($delete) {
            return array('success' => true, 'message' => 'Pinjaman deleted successfully');
        } else {
            return array('success' => false, 'message' => 'Failed to delete pinjaman');
        }
    }
}