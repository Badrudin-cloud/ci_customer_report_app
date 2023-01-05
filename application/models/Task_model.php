<?php
class Task_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_tasks($id = 0)
    {
        if ($id === 0) {
            $query = $this->db->get('tasks');
            return $query->result_array();
        }

        $query = $this->db->get_where('tasks', array('id' => $id));
        return $query->row_array();
    }

    public function insert_entry($data)
    {
        return $this->db->insert('tasks', $data);
    }

    public function delete_entry($id)
    {
        return $this->db->delete('tasks', array('id' => $id));
    }


    public function get_task_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('tasks');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_task($data)
    {
        return $this->db->update('tasks', $data, array('id' => $data['id']));
    }
}
