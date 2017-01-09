<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table_name = null;
    public $current_path = null;

    function __construct() {
        parent::__construct();
        //load model
        $this->load->model(array('Category_Model', 'Photo_Model', 'User_Model', 'Category', 'SubCategory', 'ImageModel'));
        $this->load->library(array('session', 'ConfigUtil'));
        $this->firebaseRequires();
        $this->firebase = new \Firebase\FirebaseLib('https://qubikalapp.firebaseio.com/','');   
        //echo $this->configutil->getFirstImage(1);
    }

    public function getFirstImage($id) {
        
    }

    private function firebaseRequires(){
        require 'application/libraries/firebaseInterface.php';
        require 'application/libraries/firebaseLib.php';
        require 'application/libraries/firebaseStub.php';
    }

    public function isLogin() {
        //check if logined
        if (!$this->session->userdata('isLogin'))
            redirect(base_url() . 'index.php/home/login');
    }

    public function index($category_id = null,$options = null) {
        //check if logined
        $this->isLogin();
        //parse json
        //$jsondata = file_get_contents($this->configutil->_FIREBASE_JSON);
        $path = "users/workwhiteweb/"; 
        $option = array();
        $jsondata = null;

        $array =array();

        $count = 0;

        //test instagram
       // var_dump($this->instagram_api);
        $medias = $this->instagram_api->get_user_feed(10,20,1);
        var_dump($medias);
        
        //$categories = array();

        //insert to photos        
        /*
        foreach ($array['categories'] as $key => $value) {

            //add category
            $data = array(
                'name' => $value['category'],
                'key' => $key,
                'qu_category_id' => '0'
            );

            $categoryEntity = new Category();
            $categoryEntity->category = $value['category'];
            $categoryEntity->keypath = $key;
            if (array_key_exists('subcategories', $value)) {
                $categoryEntity->subCategories = $value['subcategories'];
            }
            


            $count++;
        }
        */

        $current_path = base_url(uri_string());
        $data['listData'] = array();
        $data['category_id'] = $category_id;
        $data['current_path'] = $current_path;
        $data['configutil'] = $this->configutil;
        
         

        if ($category_id == null) {
           $jsondata = $this->firebase->get($path,$option);
           $array = json_decode($jsondata, true);
           //var_dump($array);
           $data["categoryCom"] = $this->configutil->categoryFirebaseCombobox($array);

           $data['listData'] = $array;

           if (!$data['listData']) {
                $data['message'] = "There is no category";
                $this->load->view('templates/no_result', $data);
            } else {
                //$data['listData'] = $this->Category_Model->getAll();
                //var_dump($this->session["userdata"]);
                $this->load->view('templates/index', $data);                
            }

        }
        else{
            if ($options != null) {
                $path .= "categories/".$category_id."/subcategories/".$options;
                $jsondata = $this->firebase->get($path,$option);
                $array = json_decode($jsondata, true);

                //var_dump($jsondata);
                $data['listData'] = $array;
                //var_dump($data);

                 if (!$data['listData']) {
                    $data['message'] = "There is no photo in this category";
                    $this->load->view('templates/no_result', $data);
                } else {
                    $this->load->view('templates/category_detail', $data);
                }

            }
            else{
                $path .= "categories/".$category_id;
                $jsondata = $this->firebase->get($path,$option);
                $array = json_decode($jsondata, true);
                $data['listPhotos'] = null;
                if(array_key_exists('images',$array)){
                    $data['listPhotos'] = $array['images'];
                }

                $data['listData'] = $array;
                
                //$data['listPhotos'] = $this->Photo_Model->getAllByCategoryId($category_id);                
                if (!$data['listPhotos']) {
                    $data['hasPhoto'] = false;
                } else
                    $data['hasPhoto'] = true;
                
                $this->load->view('templates/subcategory', $data);
            }
        }
        /*
        if ($category_id == null) {
            //home
            $data['listData'] = $array;//$this->Category_Model->getAll();

            //var_dump($data['listData']);
            if (!$data['listData']) {
                $data['message'] = "There is no category";
                $this->load->view('templates/no_result', $data);
            } else {
                //$data['listData'] = $this->Category_Model->getAll();
                $this->load->view('templates/index', $data);
            }
        } else {
            //get category detail
            $data['detail'] = $this->Category_Model->getDetail($category_id);
            //subcategory
            $data['listData'] = $this->Category_Model->getAllByParentId($category_id);
            if (!$data['listData']) {
                //photos
                $data['listData'] = $this->Photo_Model->getAllByCategoryId($category_id);
                if (!$data['listData']) {
                    $data['message'] = "There is no photo in this category";
                    $this->load->view('templates/no_result', $data);
                } else {
                    $this->load->view('templates/category_detail', $data);
                }
            } else {
                
                //get list photos
                $data['listPhotos'] = $this->Photo_Model->getAllByCategoryId($category_id);                
                if (!$data['listPhotos']) {
                    $data['hasPhoto'] = false;
                } else
                    $data['hasPhoto'] = true;
                
                $this->load->view('templates/subcategory', $data);
            }
        }*/
    }

    public function search($key = null, $mode = null) {

//check if logined
        $this->isLogin();

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
        /*$name = $this->input->post('name');
        $parent_id = $_POST['parent_id'];
        echo $name . '/' . $parent_id;
        $this->Category_Model->add($name, "", $parent_id);
        redirect(base_url());*/
        $name = $this->input->post('name');
        $parent_id = $_POST['parent_id'];
        echo $name . '/' . $parent_id;
        /*$data = array(
            'name' => $name,
            'key' => md5($name),
            'qu_category_id' => $parent_id
        );
        $this->Category_Model->add($data);
        */

        $dataoptions = array('category' => $name);

        $path = "users/workwhiteweb/"; 

        if ($parent_id == "0") {
            $path .= "categories/";
        }
        else{
            $path .= "categories/".$parent_id."/subcategories/";
        }

        $result = $this->firebase->push($path,array(),array());
        $resultArray = json_decode($result, true);

        if ($resultArray && array_key_exists('name',$resultArray)) {
             
            $genKey = $resultArray['name'];
            $path .= $genKey."/";
            $addResult = $this->firebase->set($path,$dataoptions,array());
            //var_dump($addResult);
        }

        redirect(base_url());
    }

    public function instagramRequires() {
        require 'application/libraries/instagram/instagram.class.php';
        require 'application/libraries/instagram/instagram.config.php';
    }

    public function login() {
        //$data['popular_media'] = $this->instagram_api->get_popular_media();
        $this->load->view('templates/login');
        //redirect($loginUrl);
    }

    public function userlogin() {
        $this->session->set_userdata('isLogin', true);
        redirect(base_url());
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

            $data = array(
                    'user_name' => $auth_response->user->username,
                    'full_name' => $auth_response->user->full_name,
                    'image_path' => $auth_response->user->profile_picture,
                    'instagram_id' => $auth_response->user->id,
                    'instagram_access_token' => $auth_response->access_token
                );
            //var_dump($data);
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
