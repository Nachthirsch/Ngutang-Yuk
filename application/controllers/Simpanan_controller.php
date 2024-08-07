<?php
class Simpanan_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Simpanan_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            echo "User ID is not set in session.";
            return;
        }
        $data['user'] = $this->Anggota_model->get_anggota($user_id);
        return $this->load->view('simpanan', $data);
    }

    public function view($id) {
        $data['simpanan'] = $this->Simpanan_model->get_simpanan($id);
        $this->load->view('simpanan/view', $data);
    }

    public function view_by_anggota_id($anggota_id = NULL) {
        $data['simpanan'] = $this->Simpanan_model->get_simpanan_by_anggota_id($anggota_id);
        $this->load->view('Simpanan_view', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $amount = (float)$this->input->post('jumlah');

            $current_saving_limit = (float)$this->Anggota_model->get_saving_limit($user_id);
            $new_saving_limit = $current_saving_limit + $amount;

            $this->Anggota_model->update_saving_limit($user_id, $new_saving_limit);

            $data = array(
                'Anggota_ID' => $this->session->userdata('user_id'),
                'Jumlah' => $this->input->post('jumlah'),
                'Tanggal' => date('Y-m-d'),
                'Jenis_Simpanan' => $this->input->post('jenis')
            );

            $this->Simpanan_model->create_simpanan($data);
            echo json_encode(['success' => true]);
            return;
        } else {
            $this->load->view('simpanan');
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');

            $data = array(
                'Anggota_ID' => $this->session->userdata('user_id'),
                'Jumlah' => $this->input->post('jumlah'),
                'Tanggal' => $this->input->post('tanggal'),
                'Jenis_Simpanan' => $this->input->post('jenis_simpanan')
            );
            $this->Simpanan_model->update_simpanan($id, $data);
            redirect('simpanan');
        } else {
            $data['simpanan'] = $this->Simpanan_model->get_simpanan($id);
            $this->load->view('simpanan/edit', $data);
        }
    }

    public function delete($id) {
        $this->Simpanan_model->delete_simpanan($id);
        redirect('simpanan');
    }
}
