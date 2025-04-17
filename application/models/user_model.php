<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function check_login($username, $password) {
        $user = $this->get_by_username($username);
        
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public function register($data) {
        return $this->db->insert('users', $data);
    }

    public function get_by_username($username) {
        return $this->db->get_where('users', ['username' => $username])->row();
    }
}
