<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAuth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'form']);
    }

    public function index() {
        $this->load->view('admin_login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password'); // password dalam bentuk plain text
        
        log_message('debug', "Username: $username, Password: $password");
    
        $admin = $this->Admin_model->check_login($username, $password);
    
        if ($admin) {
            $this->session->set_userdata([
                'admin_id' => $admin->id,
                'admin_username' => $admin->username,
                'is_admin_logged_in' => true
            ]);
            redirect('event'); // arahkan ke halaman CRUD Event
        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('adminauth');
        }
    }    

    public function logout() {
        $this->session->sess_destroy();
        redirect('adminauth');
    }
}
