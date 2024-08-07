<?php
class Dashboard_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models
        $this->load->model('Anggota_model');
        $this->load->model('Pinjaman_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Pengguna_model');
        $this->load->model('Simpanan_model');
    }

    public function index() {
        // Fetch summary data for the dashboard
        $data['total_anggota'] = $this->Anggota_model->count_all_anggota();
        $data['total_pinjaman'] = $this->Pinjaman_model->count_all_pinjaman();
        $data['total_pembayaran'] = $this->Pembayaran_model->count_all_pembayaran();
        $data['total_pengguna'] = $this->Pengguna_model->count_all_pengguna();

        // Load the dashboard view
        $this->load->view('dashboard', $data);
    }
}