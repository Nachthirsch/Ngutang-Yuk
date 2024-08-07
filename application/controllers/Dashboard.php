<?php
class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->helper('url');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');

        log_message('debug', 'Session data in Dashboard index: ' . print_r($this->session->userdata(), TRUE));

        if (!$user_id) {
            log_message('error', 'User ID is not set in session.');
            echo "User ID is not set in session.";
            return;
        }

        $data['user'] = $this->Anggota_model->get_anggota($user_id);

        if (is_null($data['user'])) {
            log_message('error', 'User data not found in database for User ID: ' . $user_id);
            echo "User data not found in database.";
            return;
        }

        $this->load->view('dashboard', $data);
    }
}    
