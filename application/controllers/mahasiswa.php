<?php
class Mahasiswa extends CI_Controller {

public function __construct() {
    parent::__construct();
    $this->load->model('Event_model');
    $this->load->library('session');
    $this->load->helper('url');

    if (!$this->session->userdata('username')) {
        redirect('auth');
    }
}

public function index() {
    $data['events'] = $this->Event_model->get_all();
    $this->load->view('mahasiswa/event_list', $data);
}

public function daftar($event_id) {
    $user_id = $this->session->userdata('user_id');

    $data = [
        'user_id' => $user_id,
        'event_id' => $event_id
    ];

    $this->db->insert('pendaftaran', $data);
    redirect('mahasiswa');
}
}