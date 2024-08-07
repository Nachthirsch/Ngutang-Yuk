<?php
class Pengguna_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengguna() {
        return $this->db->get('pengguna')->result();
    }

    public function get_pengguna($id) {
        return $this->db->get_where('pengguna', array('User_ID' => $id))->row();
    }

    public function create_pengguna($data) {
        return $this->db->insert('pengguna', $data);
    }

    public function update_pengguna($id, $data) {
        $this->db->where('User_ID', $id);
        return $this->db->update('pengguna', $data);
    }

    public function delete_pengguna($id) {
        $this->db->where('User_ID', $id);
        return $this->db->delete('pengguna');
    }

    public function get_user_by_username($username) {
        return $this->db->get_where('pengguna', array('Username' => $username))->row();
    }
}
