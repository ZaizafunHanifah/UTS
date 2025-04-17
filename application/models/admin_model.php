<?php
class Admin_model extends CI_Model {

    public function check_login($username, $password) {
        // Ambil data admin berdasarkan username
        $admin = $this->db->get_where('admin', ['username' => $username])->row();

        // Cek apakah username dan password cocok
        if ($admin && $admin->password === $password) {
            return $admin; // Jika cocok, kembalikan data admin
        }

        return false; // Jika tidak cocok, kembalikan false
    }
}

