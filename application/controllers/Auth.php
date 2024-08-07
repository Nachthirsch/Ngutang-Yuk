<?php
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengguna_model');
    }

    public function login() {
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $user = $this->Anggota_model->get_anggota_by_username($username);

            if ($user && password_verify($password, $user->Password)) {
                $this->session->set_userdata(array(
                    'user_id' => $user->Anggota_ID,
                    'username' => $user->Username,
                    'role' => $user->Role,
                    'logged_in' => TRUE
                ));

                log_message('debug', 'User session data: ' . print_r($this->session->userdata(), TRUE));
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
                echo "<script>alert('Username atau Password salah');</script>";
                redirect('auth/login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function signup() {
        if ($this->input->post()) {
            $data = array(
                'Username' => $this->input->post('username'),
                'Password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'Role' => 'user'
            );

            $this->Pengguna_model->create_user($data);
            redirect('auth/login');
        } else {
            $this->load->view('auth/signup');
        }
    }
}
