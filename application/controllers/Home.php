<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table_name = null;
    public $current_path = null;

    function __construct() {
        parent::__construct();
        //load model
        $this->load->model(array('Category_Model', 'Photo_Model', 'User_Model'));
        $this->load->library(array('session', 'ConfigUtil'));
        //echo $this->configutil->getFirstImage(1);
    }

    public function getFirstImage($id) {
        
    }

    public function index($category_id = null) {
        //parse json
        $jsondata = file_get_contents($this->configutil->_JSON_URL);

        $array = json_decode($jsondata, true);
        $count = 0;

        //get category info
        $category_name['cat'] = $this->Category_Model->getDetail(5);
        $catName = $category_name['cat']->name;

        //insert to photos
        foreach ($array['data'] as $value) {
            $name = $value['caption']['text'];

            if ($name == "" || $name == null)
                $name = "Qubikal";

            $data = array(
                'name' => $catName,
                'description' => $name,
                'image_path' => $value['images']['standard_resolution']['url'],
                'qu_category_id' => '5'
            );

            $this->Photo_Model->add($data);
            $count++;
        }

        $current_path = base_url(uri_string());
        $data['listData'] = array();
        $data['category_id'] = $category_id;
        $data['current_path'] = $current_path;
        $data['configutil'] = $this->configutil;
        //get category tree
        $data['categoryTree'] = $this->Category_Model->getTree();
        //print_r($data['categoryTree']);
        $data["categoryCom"] = $this->configutil->categoryCombobox($data['categoryTree'], 0);
        //print_r($data['categoryTree']);

        if ($category_id == null) {
            //home
            if (!$this->Category_Model->getAll()) {
                $data['message'] = "There is no category";
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->Category_Model->getAll();
                $this->load->view('templates/index', $data);
            }
        } else {
            //get category detail
            $data['detail'] = $this->Category_Model->getDetail($category_id);
            if (!$this->Category_Model->getAllByParentId($category_id)) {
                //photos
                if ($this->Photo_Model->getAllByCategoryId($category_id)) {
                    $data['listData'] = $this->Photo_Model->getAllByCategoryId($category_id);
                    $this->load->view('templates/category_detail', $data);
                } else {
                    $data['message'] = "There is no photo in this category";
                    $this->load->view('templates/no_result', $data);
                }
            } else {
                //subcategory
                $data['listData'] = $this->Category_Model->getAllByParentId($category_id);
                $this->load->view('templates/subcategory', $data);
            }
        }
    }

    public function search($key = null, $mode = null) {
        $data['configutil'] = $this->configutil;
        if ($mode == null) {
            $this->session->set_userdata('search_mode', 'photo');
            $keyword = $this->input->post('keyword');
        } else {
            $this->session->set_userdata('search_mode', $mode);
            if ($key == null || $key == '-')
                $keyword = "";
            else
                $keyword = str_replace('%20', ' ', $key);
        }

        $data['search_mode'] = $this->session->userdata('search_mode');

        if ($this->session->userdata('search_mode') == 'photo') {
            if (!$this->Photo_Model->searchPhoto($keyword)) {
                $data['message'] = "There is no result for keyword " . $keyword;
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->Photo_Model->searchPhoto($keyword);
                $this->load->view('templates/search', $data);
            }
        } else {
            if (!$this->User_Model->searchUser($keyword)) {
                $data['message'] = "There is no result for keyword " . $keyword;
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->User_Model->searchUser($keyword);
                $this->load->view('templates/search', $data);
            }
        }
    }

    public function addCategory() {
        $name = $this->input->post('name');
        $parent_id = $_POST['parent_id'];
        echo $name . '/' . $parent_id;
        $this->Category_Model->add($name, "", $parent_id);
        redirect(base_url());
    }

    public function instagramRequires() {
        require 'application/libraries/instagram/instagram.class.php';
        require 'application/libraries/instagram/instagram.config.php';
    }

    public function login() {
        $data['popular_media'] = $this->instagram_api->get_popular_media();
        $this->load->view('templates/login', $data);
        //redirect($loginUrl);
    }

    public function loginresult() {
        // Make sure that there is a GET variable of code
        if (isset($_GET['code']) && $_GET['code'] != '') {

            $auth_response = $this->instagram_api->authorize($_GET['code']);

            // Set up session variables containing some useful Instagram data
            $this->session->set_userdata('instagram-token', $auth_response->access_token);
            $this->session->set_userdata('instagram-username', $auth_response->user->username);
            $this->session->set_userdata('instagram-profile-picture', $auth_response->user->profile_picture);
            $this->session->set_userdata('instagram-user-id', $auth_response->user->id);
            $this->session->set_userdata('instagram-full-name', $auth_response->user->full_name);
            //insert into db
            if (!$this->User_Model->getDetail($auth_response->user->id)) {
                $data = array(
                    'user_name' => $auth_response->user->username,
                    'full_name' => $auth_response->user->full_name,
                    'image_path' => $auth_response->user->profile_picture,
                    'instagram_id' => $auth_response->user->id,
                    'instagram_access_token' => $auth_response->access_token
                );
                $this->User_Model->add($data);
            }

            //go to main page
            redirect(base_url());
        } else {

            // There was no GET variable so redirect back to the homepage
            redirect(base_url() . 'index.php/home/login');
        }
    }

}
