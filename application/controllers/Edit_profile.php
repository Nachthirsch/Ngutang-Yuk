<?php
class Edit_profile extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load model yang diperlukan
        $this->load->model('Anggota_model');
        // Memastikan hanya user yang sudah login yang bisa mengakses controller ini
        if (!$this->session->userdata('user_id')) {
            redirect('login'); // Asumsi 'login' adalah route untuk halaman login
        }
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        // Mengambil data user dari database berdasarkan user_id dari session
        $data['user'] = $this->Anggota_model->get_anggota($user_id);
        if (is_null($data['user'])) {
            // Jika data user tidak ditemukan, tampilkan error message
            show_error('Data pengguna tidak ditemukan.');
            return;
        }
        // Load view edit profile dengan data user
        $this->load->view('anggota/edit', $data);
    }

    public function update() {
        $user_id = $this->session->userdata('user_id');
        
        // Ambil data dari form
        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'email' => $this->input->post('email'),
        );
    
        // Konfigurasi upload
        $config['upload_path'] = './assets/uploads/profile_pictures/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048; // 2MB
        $config['encrypt_name'] = TRUE; // Nama file unik
    
        $this->load->library('upload', $config);
    
        // Cek apakah ada file yang diupload
        if (!empty($_FILES['profile_picture']['name'])) {
            // Attempt to upload the file
            if ($this->upload->do_upload('profile_picture')) {
                // File uploaded successfully
                $upload_data = $this->upload->data();
                $data['profile_picture'] = $upload_data['file_name']; // Add file name to data array
    
                // Delete old profile picture if exists
                $old_picture = $this->Anggota_model->get_profile_picture($user_id);
                if ($old_picture && file_exists('./assets/uploads/profile_pictures/' . $old_picture)) {
                    unlink('./assets/uploads/profile_pictures/' . $old_picture);
                }
            } else {
                // Handle upload error, except for "no file selected" error
                if ($_FILES['profile_picture']['error'] != 4) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('error', 'Gagal mengupload gambar: ' . $error['error']);
                    redirect('edit_profile');
                    return;
                }
            }
        }
    
        // Update data user
        if ($this->Anggota_model->update_anggota($user_id, $data)) {
            $this->session->set_flashdata('success', 'Profil berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui profil.');
        }
    
        redirect('edit_profile');
    }
    
}