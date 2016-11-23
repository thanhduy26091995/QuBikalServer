<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public $table_name = null;

    function __construct() {
        parent::__construct();
        //load model
        $this->load->model('category_model');
        //local category
        $this->load->library('configutil');
        $this->load->helper('categorytable');
        //access category function
        $this->configutil->show_hello_world();
        //access category variables
        echo $this->configutil->_TABLE_NAME;
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
    public function index() {
        //access model funtion
        $data['listCategory'] = $this->category_model->get_last_ten_entries();
        print_r($data['listCategory']);
        $this->load->view('home/index', $data);
    }

}
