<?php

class User_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('usertable');
    }

    public function searchUser($keyword) {
        $this->db->select('*');


        $this->db->from($this->usertable->TABLE_NAME);
        
        if($keyword != null) {
            $this->db->like($this->usertable->USER_NAME, $keyword );
            $this->db->or_like($this->usertable->FULL_NAME, $keyword );
        }


        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->result_array();
            return $row;
        }else return false;
    }

}
