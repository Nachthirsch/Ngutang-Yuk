<?php

class Anggota_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_anggota() {
        return $this->db->get('anggota')->result();
    }

    public function get_anggota($id) {
        $query = $this->db->get_where('anggota', array('Anggota_ID' => $id));
        return $query->row_array(); // Returns a single result row as an array
    }

    public function get_anggota_by_username($username) {
        $query = $this->db->get_where('anggota', array('Email' => $username));
        return $query->row(); // Returns a single result row as an object
    }
    
    public function get_anggota_by_user_id($user_id) {
        $this->db->where('Anggota_ID', $user_id);
        $query = $this->db->get('anggota');
        return $query->row(); // atau ->row() jika Anda mengharapkan satu baris
    }

    



    // Dalam Anggota_model.php

    public function get_loan_limit($user_id) {
        $this->db->select('loan_limit');
        $this->db->from('anggota');
        $this->db->where('anggota_id', $user_id); // Updated column name
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->loan_limit;
        }
        return 0; // Jika tidak ditemukan, kembalikan 0
    }

    public function update_loan_limit($user_id, $new_loan_limit) {
        $this->db->where('anggota_id', $user_id); // Updated column name
        $this->db->update('anggota', array('loan_limit' => $new_loan_limit));
    }

    public function get_saving_limit($user_id) {
        $this->db->where('anggota_id', $user_id); // Gunakan kolom yang benar
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            return $query->row()->saving_limit;
        }
        return 0; // Jika tidak ditemukan, kembalikan 0
    }

    public function update_saving_limit($user_id, $new_saving_limit) {
        $this->db->where('anggota_id', $user_id); // Gunakan kolom yang benar
        $this->db->update('anggota', array('saving_limit' => $new_saving_limit));
    }

    public function count_all_anggota() {
        return $this->db->count_all('anggota');
    }

    public function get_current_loan($user_id) {
        $this->db->where('anggota_id', $user_id); // Gunakan kolom yang benar
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            return $query->row()->current_loan;
        }
        return 0; // Jika tidak ditemukan, kembalikan 0
    }

    public function update_current_loan($user_id, $new_current_loan) {
        $this->db->where('anggota_id', $user_id); // Gunakan kolom yang benar
        $this->db->update('anggota', array('current_loan' => $new_current_loan));
    }


    public function create_anggota($data) {
        $data['loan_limit'] = 3000000;
        $this->db->insert('anggota', $data);
        return $this->db->insert_id();
    }

    public function update_anggota($id, $data) {
        if (!$id || empty($data)) {
            return false;
        }
        $this->db->where('Anggota_ID', $id);
        return $this->db->update('anggota', $data);
    }

    public function delete_anggota($id) {
        try {
            $this->db->where('Anggota_ID', $id);
            $result = $this->db->delete('anggota');
            
            if (!$result) {
                throw new Exception($this->db->error()['message']);
            }
            
            return true;
        } catch (Exception $e) {
            log_message('error', 'Model delete_anggota error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function get_profile_picture($id) {
        $this->db->select('profile_picture');
        $this->db->from('anggota'); // Ganti 'nama_tabel_anggota' dengan nama tabel yang sesuai
        $this->db->where('Anggota_ID', $id); // Asumsikan 'id' adalah primary key. Sesuaikan jika berbeda.
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return $query->row()->profile_picture;
        } else {
            return FALSE;
        }
    }
}
