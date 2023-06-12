<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Model
{
    public function read($table, $field, $where)
    {
        $this->db->select($field);
        $this->db->from($table);
        if ($where != 'null') {
            $this->db->where($where);
        }
        $result = $this->db->get();
        return $result;
    }

    // Add a new item
    public function add($table, $data)
    {
        if ($this->db->insert($table, $data)) {
            return true;
        } else {
            return false;
        };
    }


    //Update one item
    public function update($table, $where, $data)
    {
        $this->db->set($data);
        $this->db->where($where);
        if ($this->db->update($table)) {
            return true;
        } else {
            return false;
        };
    }

}
