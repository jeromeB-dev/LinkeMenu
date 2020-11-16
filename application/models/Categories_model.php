<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Categories_model extends CI_Model
{
    private string $table = 'categories';

    public function get_by_id(string $id, string $fields = '*')
    {
        return $this->db->select($fields)->from($this->table)->where('id', $id)->get()->row();
    }

    public function get_by_userid(string $id, string $fields = '*')
    {
        return $this->db->select($fields)->from($this->table)->join('establishments', 'est_id = establishments.id')->where('user_id', $id)->get()->result();
    }

    public function get_fields()
    {
        return $this->db->list_fields($this->table);
    }

    public function get_url(string $url, string $fields = '*')
    {
        return $this->db->select($fields)->from($this->table)->where('url', $url)->get()->row();
    }

    public function insert(array $data)
    {
        $insert = $this->db->insert($this->table, $data);

        if ($insert === true) {
            return true;
        } else {
            return $this->db->error();
        }

    }

    public function update(string $id, array $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $update = $this->db->update($this->table);

        if ($update === true && ($this->db->affected_rows() <= 1)) {
            return true;
        } else {
            return $this->db->error();
        }

    }

}
