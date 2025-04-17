<?php
class Event_model extends CI_Model {

    public function get_all() {
        return $this->db->get('events')->result();
    }

    public function insert($data) {
        return $this->db->insert('events', $data);
    }

    public function delete($id) {
        return $this->db->delete('events', ['id' => $id]);
    }

    public function get($id) {
        return $this->db->get_where('events', ['id' => $id])->row();
    }

    public function get_peserta($event_id) {
        $this->db->select('users.username');
        $this->db->from('pendaftaran');
        $this->db->join('users', 'users.id = pendaftaran.user_id');
        $this->db->where('pendaftaran.event_id', $event_id);
        return $this->db->get()->result();
    }    
    
}

