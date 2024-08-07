<?php
class Pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengguna_model');
    }

    public function index() {
        $data['pengguna'] = $this->Pengguna_model->get_all_pengguna();
        $this->load->view('pengguna/index', $data);
    }

    public function view($id) {
        $data['pengguna'] = $this->Pengguna_model->get_pengguna($id);
        $this->load->view('pengguna/view', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'Role' => $this->input->post('role'),
                'Anggota_ID' => $this->input->post('anggota_id')
            );
            $this->Pengguna_model->create_pengguna($data);
            redirect('pengguna');
        } else {
            $this->load->view('pengguna/create');
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'Role' => $this->input->post('role'),
                'Anggota_ID' => $this->input->post('anggota_id')
            );
            $this->Pengguna_model->update_pengguna($id, $data);
            redirect('pengguna');
        } else {
            $data['pengguna'] = $this->Pengguna_model->get_pengguna($id);
            $this->load->view('pengguna/edit', $data);
        }
    }

    public function delete($id) {
        $this->Pengguna_model->delete_pengguna($id);
        redirect('pengguna');
    }
}
