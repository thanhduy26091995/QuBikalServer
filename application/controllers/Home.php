<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table_name = null;
    public $current_path = null;
    function __construct() {
        parent::__construct();
        //load model
        $this->load->model(array('category_model', 'photo_model'));
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
    public function index($category_id = null) {
        $current_path =  base_url(uri_string());
        $data['listData'] = array();
        $data['category_id'] = $category_id;
        $data['current_path'] = $current_path;
        
        if($category_id == null)
        {
            //home
            if(!$this->category_model->getAll()){
                $data['message'] = "There is no category";
                    $this->load->view('templates/no_result', $data);

            } else{
                    $data['listData'] = $this->category_model->getAll();
                $this->load->view('templates/index', $data);
                }       
        }else{
            //get category detail
            $data['detail'] = $this->category_model->getDetail($category_id);            
            if(!$this->category_model->getAllByParentId($category_id)){
                //photos
                if($this->photo_model->getAllByCategoryId($category_id)){
                    $data['listData'] = $this->photo_model->getAllByCategoryId($category_id);
                    $this->load->view('templates/category_detail', $data);
                }   else{
                    $data['message'] = "There is no photo in this category";
                    $this->load->view('templates/no_result', $data);
                }  
                
            }else{
                  //subcategory
                $data['listData'] = $this->category_model->getAllByParentId($category_id);
                $this->load->view('templates/subcategory', $data);         
            }
        }        
    }
    public function search($keyword = null){
        $this->load->view('templates/search');
    }
}
