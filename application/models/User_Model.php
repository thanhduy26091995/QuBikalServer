<?php

class User_model extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->library('usertable');
    }

    public function getDetail($id) {
        $this->db->select('*');


        $this->db->from($this->usertable->TABLE_NAME);

        //$this->db->where($this->usertable->PHOTO_COUNT . " > ", 0);
        $this->db->where($this->usertable->ID . " = ", $id);


        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row;
        } else
            return false;
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

    public function add($user_name, $full_namem, $image_path, $bio, $website, $instagram_id, $instagram_token) {
        $data = array(
            'name' => $name,
            'image_path' => $image_path,
            'qu_category_id' => $qu_category_id
        );

        $this->db->insert($this->categorytable->TABLE_NAME, $data);
    }

}
