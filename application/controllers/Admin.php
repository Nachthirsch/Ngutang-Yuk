<?php
class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function login() {
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $admin = $this->Admin_model->get_admin_by_username($username);

            if ($admin && $this->Admin_model->verify_password($password, $admin->password)) {
                $this->session->set_userdata('admin_id', $admin->id);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }

    // Dalam controller Admin.php atau yang relevan
    public function register_admin() {
        $this->load->model('Admin_model');
        
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Asumsikan method insert_admin belum ada dan perlu Anda buat
        // dalam model Admin_model untuk menyimpan data admin baru
        if ($this->Admin_model->insert_admin($username, $hashed_password)) {
            echo "Admin berhasil didaftarkan.";
            redirect ('admin/login');
        } else {
            echo "Terjadi kesalahan saat mendaftarkan admin.";
        }
    }

    public function logout() {
        $this->session->unset_userdata('admin_id');
        redirect('admin/login');
    }

    
    public function anggota() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        // Load model Anggota
        $this->load->model('Anggota_model');
        
        // Mengambil semua data anggota
        $data['anggota'] = $this->Anggota_model->get_all_anggota();
        
        // Passing data ke view
        $this->load->view('admin/anggota', $data);
    }

    public function pinjaman() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        $this->load->model('Pinjaman_model');
        $data['pinjaman'] = $this->Pinjaman_model->get_all_pinjaman();
        $this->load->view('admin/pinjaman', $data);
    }

    public function get_pinjaman_by_id($id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        $this->load->model('Pinjaman_model');
        $pinjaman = $this->Pinjaman_model->get_pinjaman_by_id($id);
        echo json_encode($pinjaman);
    }

    public function update_pinjaman() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        $this->load->model('Pinjaman_model');
        $data = $this->input->post();
        $result = $this->Pinjaman_model->update_pinjaman($data);
        echo json_encode($result);
    }

    public function delete_pinjaman() {
        if (!$this->session->userdata('admin_id')) {
            echo json_encode(['error' => true, 'message' => 'Akses ditolak']);
            exit;
        }
    
        $pinjaman_id = $this->input->post('id');
    
        if ($pinjaman_id) {
            $this->load->model('Pinjaman_model');
            $result = $this->Pinjaman_model->delete_pinjaman($pinjaman_id);
            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'ID pinjaman tidak ditemukan.']);
        }
        exit;
    }

    public function get_pembayaran_by_id($id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        $this->load->model('Pembayaran_model');
        $pembayaran = $this->Pembayaran_model->get_pembayaran_by_id($id);
        echo json_encode($pembayaran);
    }

    public function pembayaran() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }

        $this->load->model('Pembayaran_model');
        $data ['pembayaran'] = $this->Pembayaran_model->get_all_pembayaran();

        $this->load->view('admin/pembayaran', $data);
    }
    // Untuk Anggota

    public function add_anggota() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        
        if ($this->input->post()) {
            $this->load->model('Anggota_model');
            $data = array(
                'Nama' => $this->input->post('Nama'),
                'Alamat' => $this->input->post('Alamat'),
                'Telepon' => $this->input->post('Telepon'),
                'Email' => $this->input->post('Email'),
                'loan_limit' => $this->input->post('loan_limit'),
                'saving_limit' => $this->input->post('saving_limit')
            );
            
            $result = $this->Anggota_model->insert_anggota($data);
            if ($result) {
                $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan anggota');
            }
            redirect('admin/anggota');
        } else {
            $this->load->view('admin/add_anggota');
        }
    }

    public function delete_anggota() {
        if (!$this->session->userdata('admin_id')) {
            echo json_encode(['error' => true, 'message' => 'Akses ditolak']);
            exit;
        }
    
        $anggota_id = $this->input->post('id');
    
        if ($anggota_id) {
            $this->load->model('Anggota_model');
            if ($this->Anggota_model->delete_anggota($anggota_id)) {
                echo json_encode(['success' => true, 'message' => 'Anggota berhasil dihapus.']);
            } else {
                echo json_encode(['error' => true, 'message' => 'Terjadi kesalahan saat menghapus anggota.']);
            }
        } else {
            echo json_encode(['error' => true, 'message' => 'ID anggota tidak ditemukan.']);
        }
        exit;
    }
    
    // Untuk Pinjam
    
    // Untuk Pembayaran
    public function delete_pembayaran() {
        if (!$this->session->userdata('admin_id')) {
            echo json_encode(['success' => false, 'message' => 'Akses ditolak']);
            exit;
        }
    
        $pembayaran_id = $this->input->post('id');
    
        if ($pembayaran_id) {
            $this->load->model('Pembayaran_model');
            $result = $this->Pembayaran_model->delete_pembayaran($pembayaran_id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Pembayaran berhasil dihapus']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menghapus pembayaran']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID pembayaran tidak ditemukan']);
        }
    }

    // Untuk Anggota
    public function get_anggota_by_user_id($user_id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        $this->load->model('Anggota_model');
        $anggota = $this->Anggota_model->get_anggota_by_user_id($user_id);
        echo json_encode($anggota);
    }
    
    public function update_anggota() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        $this->load->model('Anggota_model');
        $id = $this->input->post('anggotaId');
        $data = array(
            'Nama' => $this->input->post('Nama'),
            'Alamat' => $this->input->post('Alamat'),
            'Telepon' => $this->input->post('Telepon'),
            'Email' => $this->input->post('Email'),
            'loan_limit' => $this->input->post('loan_limit'),
            'saving_limit' => $this->input->post('saving_limit')
        );
        log_message('debug', 'Update data: ' . print_r($data, true));
        $result = $this->Anggota_model->update_anggota($id, $data);
        echo json_encode(array('status' => $result ? 'success' : 'error'));
    }
    
    // Untuk Pinjaman
    public function edit_pinjaman($id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        $this->load->model('Pinjaman_model');
        $data['pinjaman'] = $this->Pinjaman_model->get_pinjaman_by_id($id);
        if ($this->input->post()) {
            $this->Pinjaman_model->update_pinjaman($id, $this->input->post());
            redirect('admin/pinjaman');
        }
        $this->load->view('admin/edit_pinjaman', $data);
    }
    
    // Untuk Pembayaran
    public function edit_pembayaran($id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
        $this->load->model('Pembayaran_model');
        $data['pembayaran'] = $this->Pembayaran_model->get_pembayaran_by_id($id);
        if ($this->input->post()) {
            $this->Pembayaran_model->update_pembayaran($id, $this->input->post());
            redirect('admin/pembayaran');
        }
        $this->load->view('admin/edit_pembayaran', $data);
    }


    public function update_pembayaran() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }
    
        $this->load->model('Pembayaran_model');
        $data = $this->input->post();
        $pembayaranId = $data['pembayaranId']; // Simpan ID terpisah
        unset($data['pembayaranId']); // Hapus dari data yang akan diupdate
        
        $result = $this->Pembayaran_model->update_pembayaran($pembayaranId, $data);
        
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data pembayaran berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data pembayaran']);
        }
    }

    public function simpanan() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }

        $this->load->model('Simpanan_model');
        $data['simpanan'] = $this->Simpanan_model->get_all_simpanan();
        $this->load->view('admin/simpanan', $data);
    }

    public function get_simpanan_by_id($id) {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }

        $this->load->model('Simpanan_model');
        $simpanan = $this->Simpanan_model->get_simpanan_by_id($id);
        echo json_encode($simpanan);
    }

    public function update_simpanan() {
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }

        $this->load->model('Simpanan_model');
        $data = $this->input->post();
        $simpananId = $data['Simpanan_ID'];
        unset($data['Simpanan_ID']);

        $result = $this->Simpanan_model->update_simpanan($simpananId, $data);
        
        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Data simpanan berhasil diperbarui']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data simpanan']);
        }
    }

    public function delete_simpanan() {
        if (!$this->session->userdata('admin_id')) {
            echo json_encode(['success' => false, 'message' => 'Akses ditolak']);
            exit;
        }

        $simpanan_id = $this->input->post('id');

        if ($simpanan_id) {
            $this->load->model('Simpanan_model');
            $result = $this->Simpanan_model->delete_simpanan($simpanan_id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Simpanan berhasil dihapus']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Gagal menghapus simpanan']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'ID simpanan tidak ditemukan']);
        }
    }


    public function dashboard() {
        $this->load->model('Anggota_model');
        $this->load->model('Pinjaman_model');
        $this->load->model('Pembayaran_model');
        $this->load->model('Simpanan_model');
        
        $data['total_anggota'] = $this->Anggota_model->count_all_anggota();
        $data['total_pinjaman'] = $this->Pinjaman_model->get_total_pinjaman();
        $data['total_pembayaran'] = $this->Pembayaran_model->get_total_pembayaran();
        $data['total_simpanan'] = $this->Simpanan_model->get_total_simpanan();
        $data['recent_transactions'] = $this->Pembayaran_model->get_recent_transactions();
        if (!$this->session->userdata('admin_id')) {
            redirect('admin/login');
        }

        $this->load->view('admin/dashboard', $data);
    }
}
