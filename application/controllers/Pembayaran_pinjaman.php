<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_pinjaman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembayaran_model');
    }

    public function index() {
        // Load view pembayaran
        $this->load->view('pembayaran_view');
    }

    public function view_by_anggota_id($anggota_id = NULL) {
        $data['pembayaran'] = $this->Pembayaran_model->get_pembayaran_by_anggota_id($anggota_id);
        $this->load->view('pembayaran_view', $data);
    }

    public function proses_pembayaran() {
        log_message('info', 'Data yang diterima: ' . print_r($this->input->post(), true));
        $user_id = $this->session->userdata('user_id');
        $pinjaman_id = $this->input->post('pinjaman_id');
        $jumlah = $this->input->post('amount');
        $duration = $this->input->post('duration');
          // Ensure this is correctly received as a number
        $tanggal_pembayaran = date('Y-m-d H:i:s');
    
        $data = array(
            'Anggota_ID' => $this->session->userdata('user_id'),
            'Pinjaman_ID' => $pinjaman_id,
            'Jumlah' => $jumlah,
            'Bulan_Angsuran' => $duration,
            'Tanggal_Pembayaran' => $tanggal_pembayaran
        );
    
        $result = $this->Pembayaran_model->insert_pembayaran($data);
    
        if ($result) {
            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false));
        }
    }
}
