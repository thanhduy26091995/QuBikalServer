<?php

class Category_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('categorytable');
    }

    public function getAll() {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        $this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0 );
        $this->db->where($this->categorytable->PARENT_ID . " = ", 0 );


        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }else return false;
    }
    public function getAllByParentId($id) {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        $this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0 );
        $this->db->where($this->categorytable->PARENT_ID . " = ", $id );


        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }else return false;
    }

    public function getDetail($id) {
        $this->db->select('*');


        $this->db->from($this->categorytable->TABLE_NAME);

        $this->db->where($this->categorytable->PHOTO_COUNT . " > ", 0 );
        $this->db->where($this->categorytable->ID . " = ", $id );


        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row();
            return $row;
        }else return false;
    }

}
