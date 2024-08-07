<?php
class Pinjaman_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pinjaman_model');
        $this->load->model('Anggota_model');
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');

        if (!$user_id) {
            echo "User ID is not set in session.";
            return;
        }
        $data['user'] = $this->Anggota_model->get_anggota($user_id);
        $this->load->view('pinjaman', $data);
    }

    public function view_by_anggota_id($anggota_id = NULL) {
        $data['pinjaman'] = $this->Pinjaman_model->get_pinjaman_by_anggota_id($anggota_id);
        $this->load->view('Pinjaman_view', $data);
    }

    public function create() {
        if ($this->input->post()) {
            $amount = $this->input->post('jumlah');
            $duration = $this->input->post('durasi');
            $user_id = $this->session->userdata('user_id');
    
            // Tentukan bunga berdasarkan durasi
            switch ($duration) {
                case 3:
                    $interest_rate = 0.05; // 5% untuk 3 bulan
                    break;
                case 6:
                    $interest_rate = 0.07; // 7% untuk 6 bulan
                    break;
                case 12:
                    $interest_rate = 0.1; // 10% untuk 12 bulan
                    break;
                default:
                    $interest_rate = 0;
            }
    
            // Hitung total bunga dan angsuran per bulan
            $total_interest = $amount * $interest_rate;
            $total_amount = $amount + $total_interest;
            $monthly_installment = $total_amount / $duration;
            $interest_per_month = $total_interest / $duration;

            $current_loan_limit = $this->Anggota_model->get_loan_limit($user_id);

            $new_loan_limit = $current_loan_limit - $amount;

            $this->Anggota_model->update_loan_limit($user_id, $new_loan_limit);

            $current_loan = $this->Anggota_model->get_current_loan($user_id);
            $this->Anggota_model->update_current_loan($user_id, $current_loan + $total_amount);
    
            $data = array(
                'Anggota_ID' => $this->session->userdata('user_id'),
                'Jumlah' => $amount,
                'Durasi' => $duration,
                'Tanggal_Pinjaman' => date('Y-m-d'),
                'Bunga' => $interest_rate,
                'Total_Bunga' => $total_interest,
                'Bunga_Bulanan' => $interest_per_month,
                'Total_Jumlah' => $total_amount,
                'Angsuran_Bulanan' => $monthly_installment,
                'Status' => $this->input->post('status')
            );
    
            $this->Pinjaman_model->create_pinjaman($data);
            redirect('Pinjaman');
        } else {
            $this->load->view('pinjaman');
        }
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'Anggota_ID' => $this->input->post('anggota_id'),
                'Jumlah' => $this->input->post('jumlah'),
                'Tanggal_Pinjaman' => $this->input->post('tanggal_pinjaman'),
                'Bunga' => $this->input->post('bunga'),
                'Status' => $this->input->post('status')
            );
            $this->Pinjaman_model->update_pinjaman($id, $data);
            redirect('pinjaman');
        } else {
            $data['pinjaman'] = $this->Pinjaman_model->get_pinjaman($id);
            $this->load->view('pinjaman/edit', $data);
        }
    }

    public function delete($id) {
        $this->Pinjaman_model->delete_pinjaman($id);
        redirect('pinjaman');
    }
}
