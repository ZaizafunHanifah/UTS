<?php
class Admin_model extends CI_Model {

    public function check_login($username, $password) {
        $admin = $this->db->get_where('admin', ['username' => $username])->row();

        if ($admin && $admin->password === $password) {
            return $admin;
        }

        return false;
    }
}

