<?php

class Category_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('CategoryTable');
    }

    public function getAll() {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        //$this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0);
        $this->db->where($this->categorytable->PARENT_ID . " = ", 0);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }

    public function getTree() {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }

    public function getAllByParentId($id) {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        //$this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0);
        $this->db->where($this->categorytable->PARENT_ID . " = ", $id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }

    public function getDetail($id) {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        //$this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0);
        $this->db->where($this->categorytable->ID . " = ", $id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else
            return false;
    }

    public function add($name, $image_path, $qu_category_id) {
        $data = array(
            'name' => $name,
            'image_path' => $image_path,
            'qu_category_id' => $qu_category_id
        );

        $this->db->insert($this->categorytable->TABLE_NAME, $data);
    }

}
