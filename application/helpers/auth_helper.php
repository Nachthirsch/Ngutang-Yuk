<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('is_logged_in')) {
    function is_logged_in() {
        $CI =& get_instance();
        $CI->load->library('session');
        if (!$CI->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }
}
