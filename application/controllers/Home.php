<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table_name = null;
    public $current_path = null;

    function __construct() {
        parent::__construct();
        //load model
        $this->load->model(array('category_model', 'photo_model', 'user_model'));
        $this->load->library(array('session', 'configutil'));
        
        //echo $this->configutil->getFirstImage(1);
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function getFirstImage($id) {
        
    }

    public function index($category_id = null) {
        $current_path = base_url(uri_string());
        $data['listData'] = array();
        $data['category_id'] = $category_id;
        $data['current_path'] = $current_path;
        $data['configutil'] = $this->configutil;
        //get category tree
        $data['categoryTree'] = $this->category_model->getTree();
        //print_r($data['categoryTree']);
        $data["categoryCom"] = $this->configutil->categoryCombobox($data['categoryTree'], 0);
        //print_r($data['categoryTree']);

        if ($category_id == null) {
            //home
            if (!$this->category_model->getAll()) {
                $data['message'] = "There is no category";
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->category_model->getAll();
                $this->load->view('templates/index', $data);
            }
        } else {
            //get category detail
            $data['detail'] = $this->category_model->getDetail($category_id);
            if (!$this->category_model->getAllByParentId($category_id)) {
                //photos
                if ($this->photo_model->getAllByCategoryId($category_id)) {
                    $data['listData'] = $this->photo_model->getAllByCategoryId($category_id);
                    $this->load->view('templates/category_detail', $data);
                } else {
                    $data['message'] = "There is no photo in this category";
                    $this->load->view('templates/no_result', $data);
                }
            } else {
                //subcategory
                $data['listData'] = $this->category_model->getAllByParentId($category_id);
                $this->load->view('templates/subcategory', $data);
            }
        }
    }

    public function search($key = null, $mode = null) {
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
            if (!$this->photo_model->searchPhoto($keyword)) {
                $data['message'] = "There is no result for keyword " . $keyword;
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->photo_model->searchPhoto($keyword);
                $this->load->view('templates/search', $data);
            }
        } else {
            if (!$this->user_model->searchUser($keyword)) {
                $data['message'] = "There is no result for keyword " . $keyword;
                $this->load->view('templates/no_result', $data);
            } else {
                $data['listData'] = $this->user_model->searchUser($keyword);
                $this->load->view('templates/search', $data);
            }
        }
    }

    public function addCategory() {
        $name = $this->input->post('name');
        $parent_id = $_POST['parent_id'];
        echo $name . '/' . $parent_id;
        $this->category_model->add($name, "", $parent_id);
        redirect(base_url());
    }

}
