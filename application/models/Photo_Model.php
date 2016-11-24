<?php

class Photo_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('phototable');
    }

    public function getAllByCategoryId($id) {
        $this->db->select('*');


        $this->db->from($this->phototable->TABLE_NAME);

        $this->db->where($this->phototable->CATEGORY_ID . " = ", $id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }
    
    public function getListPhotoByCategoryId($id) {
        $this->db->select('*');


        $this->db->from($this->phototable->TABLE_NAME);

        $this->db->where_in($this->phototable->CATEGORY_ID, array($id));


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }

    public function searchPhoto($keyword) {

        $this->db->select('*');


        $this->db->from($this->phototable->TABLE_NAME);

        if ($keyword != null) {
            $this->db->like($this->phototable->NAME, $keyword);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else
            return false;
    }

}
