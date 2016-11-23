<?php

class User_model extends CI_Model {

    public $id = "id";
    public $name;
    public $created_date;
    public $table_name = "qu_category";

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('configutil');
    }

    public function get_last_ten_entries() {
        //echo $this->table_name;
        $query = $this->db->get($this->table_name, 10);
        return $query->result_array();
    }

    public function insert_entry() {
        $this->title = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->insert($this->table_name, $this);
    }

    public function update_entry() {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update($this->table_name, $this, array('id' => $_POST['id']));
    }

}
