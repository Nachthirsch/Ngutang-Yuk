<?php
class Admin_model extends CI_Model {
    
    public function get_admin_by_username($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        return $query->row();
    }
    
    public function verify_password($input_password, $stored_hash) {
        return password_verify($input_password, $stored_hash);
    }

    public function insert_admin($username, $hashed_password) {
        $data = array(
            'username' => $username,
            'password' => $hashed_password
        );
        
        return $this->db->insert('admin', $data);
    }
}
?>