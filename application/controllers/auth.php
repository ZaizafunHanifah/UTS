<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $this->load->view('login');
    }

    public function login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->User_model->check_login($username, $password);

        if ($user) {
            $this->session->set_userdata('user_id', $user->id);
            $this->session->set_userdata('username', $user->username);
            redirect('mahasiswa');

        } else {
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }

    public function register() {
        $this->load->view('register');
    }

    public function register_submit() {
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

        $data = [
            'username' => $username,
            'password' => $password
        ];

        // Cek apakah username sudah ada
        if ($this->User_model->get_by_username($username)) {
            $this->session->set_flashdata('error', 'Username sudah digunakan!');
            redirect('auth/register');
        }

        $this->User_model->register($data);
        $this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
        redirect('auth'); // Redirect ke halaman login setelah registrasi berhasil
    }
}
