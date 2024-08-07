<?php
class Anggota_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Anggota_model');
    }

    public function index() {
        $data['anggota'] = $this->Anggota_model->get_all_anggota();
        $this->load->view('anggota/index', $data);
    }

    public function view($id) {
        $data['anggota'] = $this->Anggota_model->get_anggota($id);
        $this->load->view('anggota/view', $data);
    }

    public function create() {
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Anggota_model');
        $this->load->model('Pengguna_model');
        $this->load->view('anggota/create');

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[anggota.Email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if($this->form_validation->run() === FALSE) {
            $this->load->view('anggota/create');
        } else {
            $data_anggota = array(
                'Nama' => $this->input->post('nama'),
                'Alamat' => $this->input->post('alamat'),
                'Telepon' => $this->input->post('telepon'),
                'Email' => $this->input->post('email'),
                'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'Tanggal_Gabung' => date('Y-m-d')
            );

            log_message('debug', 'Debug message: Data anggota value is ' . print_r($data_anggota, TRUE));

            $anggota_id = $this->Anggota_model->create_anggota($data_anggota); // Pastikan ini mengembalikan ID anggota yang baru disimpan

            if ($anggota_id) {
                // Data untuk tabel Pengguna
                $data_pengguna = array(
                    'Username' => $this->input->post('email'), // Menggunakan email sebagai username
                    'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'Role' => 'Anggota', // Atau role lain sesuai kebutuhan // ID anggota yang baru disimpan
                );

                if ($this->Pengguna_model->create_pengguna($data_pengguna)) {
                    $this->session->set_flashdata('success', 'Berhasil mendaftar! Silahkan login');
                    redirect('Anggota_controller/create'); // Asumsi Anda memiliki route untuk login
                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data pengguna.');
                    $this->load->view('anggota/create');
                }
            } else {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mendaftar. Silahkan coba lagi.');
                $this->load->view('anggota/create');
            }
        }
    }

    public function edit($id) {
        if($this->input->post()) {
            $data = array(
                'Nama' => $this->input->post('nama'),
                'Alamat' => $this->input->post('alamat'),
                'Telepon' => $this->input->post('telepon'),
                'Email' => $this->input->post('email'),
            );
            $this->Anggota_model->update_anggota($id, $data);
            redirect('anggota');
        } else {
            $data['anggota'] = $this->Anggota_model->get_anggota($id);
            $this->load->view('anggota/edit', $data);
        }
    }

    public function delete($id) {
        $this->Anggota_model->delete_anggota($id);
        redirect('anggota');
    }
}
