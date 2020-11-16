<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{

    public function get_by_username(string $login)
    {
        return $this->db->select()->from('users')->where('email', $login)->get()->row();
    }

    public function get_by_id(string $id, string $fields = '*')
    {
        return $this->db->select($fields)->from('users')->where('id', $id)->get()->row();
    }

    public function register(array $data)
    {
        $insert = $this->db->insert('users', $data);

        if ($insert === true) {
            return $this->get_by_id($this->db->insert_id(), 'id,email,activation_hash');
        } else {
            return $this->db->error();
        }

        // DUMMY DATA !!!
        // return (object) ['id' => '',
        //          //'email' => 'test@test.local',
        //         // 'email' => '',
        //         // 'email' => '',
        //     // 'password' => password_hash('password', PASSWORD_DEFAULT),
        //         'activation_hash' => password_hash('username' . 'password', PASSWORD_DEFAULT)
        // ];
    }

    public function activate(string $id)
    {
        $this->db->set(array(
            'active' => 1,
            'activation_hash' => '',
        ));
        $this->db->where('id', $id);
        $update = $this->db->update('users');

        if ($update === true && ($this->db->affected_rows() == 1)) {
            return true;
        } else {
            return $this->db->error();
        }

    }

}
