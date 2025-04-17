<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(['Event_model', 'User_model']);
        $this->load->library('session');
        $this->load->helper('url');

        // Proteksi admin
        if (!$this->session->userdata('is_admin_logged_in')) {
            redirect('adminauth');
        }
    }

    public function index() {
        $events = $this->Event_model->get_all();
    
        foreach ($events as &$event) {
            $event->peserta = $this->Event_model->get_peserta($event->id);
        }
    
        $data['events'] = $events;
        $this->load->view('admin/event_list', $data);
    }        

    public function add() {
        $this->load->view('admin/event_add');
    }

    public function store() {
        $data = [
            'nama_event' => $this->input->post('nama_event'),
            'tanggal' => $this->input->post('tanggal'),
            'deskripsi' => $this->input->post('deskripsi')
        ];
        $this->Event_model->insert($data);
        $this->session->set_flashdata('success', 'Event berhasil ditambahkan!');
        redirect('event');
    }

    public function delete($id) {
        $this->Event_model->delete($id);
        $this->session->set_flashdata('success', 'Event berhasil dihapus');
        redirect('event');
    }    

    public function laporan($id) {
        $data['event'] = $this->Event_model->get($id);
        $data['peserta'] = $this->Event_model->get_peserta($id);
        $this->load->view('admin/event_laporan', $data);
    }
}
