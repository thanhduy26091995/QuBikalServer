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
//        if (!$this->session->userdata('instagram-token')){
//            redirect(base_url().'home/login');
//        }            
        //instagram
//        session_start();
//        if($_GET['id']=='logout')
//        {
//            unset($_SESSION['userdetails']);
//            session_destroy();
//        }
//        //load requires files
//        $this->instagramRequires();
//
//        if (!empty($_SESSION['userdetails']))
//        {
//            $data=$_SESSION['userdetails'];
//
//            echo '<img src='.$data->user->profile_picture.' >'; 
//            echo 'Name:'.$data->user->full_name;
//            echo 'Username:'.$data->user->username;
//            echo 'User ID:'.$data->user->id;
//            echo 'Bio:'.$data->user->bio;
//            echo 'Website:'.$data->user->website;
//            echo 'Profile Pic:'.$data->user->profile_picture;
//            echo 'Access Token: '.$data->access_token;
//
//            // Store user access token
//            $instagram->setAccessToken($data);
//            // Your uploaded images
//            $popular = $instagram->getUserMedia($data->user->id);
//            foreach ($popular->data as $data) {
//            echo '<img src='.$data->images->thumbnail->url.'>';
//        }
//
//        // Instagram Data Array
//        print_r($data);
//        }
//        else
//        { 
//        header('Location: index.php');
//        }

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

    public function instagramRequires() {
        require 'application/libraries/instagram/instagram.class.php';
        require 'application/libraries/instagram/instagram.config.php';
    }

    public function login() {
//        //session_start();
//        // User session data availability check 
//        if (!empty($_SESSION['userdetails'])) 
//        {
//        // Redirecting to home.php
//        header('Location: ' . base_url());
//        }
//        //load requires files
//        $this->instagramRequires();
//
//        // Login URL
//        $loginUrl = $instagram->getLoginUrl();
//        $data["loginUrl"] = $loginUrl;
        // Get popular media using the client id call
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
            if (!$this->user_model->getDetail($id)) {
                $data = array(
                    'user_name' => $auth_response->user->username,
                    'full_name' => $auth_response->user->full_name,
                    'image_path' => $auth_response->user->profile_picture,
                    'instagram_id' => $auth_response->user->id,
                    'instagram_access_token' => $auth_response->access_token
                );
                $this->user_model->add($data);
            }

            //go to main page
            redirect(base_url());
        } else {

            // There was no GET variable so redirect back to the homepage
            redirect(base_url() . 'home/login');
        }
//        //load requires files
//        $this->instagramRequires();
//
//        // Receive OAuth code parameter
//        $code = $_GET['code'];
//
//        // Check whether the user has granted access
//        if (true === isset($code)) {
//            // Receive OAuth token object
//            $data = $instagram->getOAuthToken($code);
//            if (empty($data->user->username)) {
//                header('Location: ' . base_url());
//            } else {
//                session_start();
//                // Storing instagram user data into session
//                $_SESSION['userdetails'] = $data;
//
//                $user = $data->user->username;
//                $fullname = $data->user->full_name;
//                $bio = $data->user->bio;
//                $website = $data->user->website;
//                $id = $data->user->id;
//                $token = $data->access_token;
//                $profile_picture = $data->user->profile_picture;
//
//                //check if user exist
//                if (!$this->user_model->getDetail($id)) {
//                    $data = array(
//                        'user_name' => $user,
//                        'full_name' => $fullname,
//                        'image_path' => $profile_picture,
//                        'bio' => $bio,
//                        'website' => $website,
//                        'instagram_id' => $id,
//                        'instagram_access_token' => $token
//                    );
//                    $this->user_model->add($data);
//                }
//                header('Location: ' . base_url());
//            }
//        } else {
//            // Check whether an error occurred
//            if (true === isset($_GET['error'])) {
//                echo 'An error occurred: ' . $_GET['error_description'];
//            }
//        }
    }

}
