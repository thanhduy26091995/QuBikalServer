<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConfigUtil {

    public $_TABLE_NAME = "qu_category";
    public $_JSON_URL = "http://www.json-generator.com/api/json/get/coZNLplkVu?indent=2";
    public $_JSON_VIEW_URL = "https://jsonblob.com/ecde9da0-b51d-11e6-871b-4b81b588c5fb";
    public $_FIREBASE_JSON = "https://qubikalapp.firebaseio.com/users/workwhiteweb.json";

    function checkRemoteFile($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if (curl_exec($ch) !== FALSE) {
            return true;
        } else {
            return false;
        }
    }

    function show_hello_world() {
        echo 'Hello World';
    }

    public function getFirstImage($category_id) {
        $image_path = "";
        $CI = & get_instance();
        // --------------
        $CI->load->model(array(
            'photo_model',
            'category_model'
        )); // <-------Load the Model firs
        // get list cat id
        $data ['listCat'] = $CI->category_model->getTree();

        $listID = $category_id . $this->desubId($data ['listCat'], $category_id);

        $listID = explode(',', $listID);
        $temp_count = "";

        foreach ($listID as $value) {
            if ($value != ',') {
                $data ['photo'] = $CI->photo_model->getListPhotoByCategoryId($value);
                if (!$data ['photo']) {
                    
                } else {
                    foreach ($data ['photo'] as $value) {
                        $image_path = $value ['image_path'];
                        break;
                    }
                }
                // $photo_count += count($data['photo']);

                $temp_count = "";
            } else {
                $temp_count += $value;
            }
        }
        if ($image_path == "")
            $image_path = "http://vignette3.wikia.nocookie.net/hunterxhunter/images/6/6d/No_image.png/revision/latest?cb=20120417110152";
        return $image_path;
    }

    public function getTotalImage($category_id) {
        $photo_count = 0;
        $CI = & get_instance();
        // --------------
        $CI->load->model(array(
            'photo_model',
            'category_model'
        )); // <-------Load the Model firs
        // get list cat id
        $data ['listCat'] = $CI->category_model->getTree();
        $listID = $category_id . $this->desubId($data ['listCat'], $category_id);

        $listID = explode(',', $listID);

        foreach ($listID as $value) {
            if ($value != ',') {
                $data ['photo'] = $CI->photo_model->getListPhotoByCategoryId($value);
                if (!$data ['photo']) {
                    
                } else
                    $photo_count = $photo_count + count($data ['photo']);
            }
        }

        return $photo_count;
    }

    function categoryFirebaseCombobox($firebaseData){

        $listId = "";

        if ($firebaseData) {
            if (array_key_exists('categories',$firebaseData)) {
                foreach ($firebaseData['categories'] as $key => $value) {
                    $listId .= '<option value="' . $key . '" class="optionGroup">' . $value ['category'] . '</option>';

                    if (array_key_exists('subcategories',$value)) {
                        foreach ($value['subcategories'] as $keySub => $valueSub) {
                            $listId .= '<option value="' . $keySub . '" class="optionChild">--' . $valueSub ['category'] . '</option>';
                        }
                    }
                }
            }
        }

        return $listId;
    }

    function categoryCombobox($listData, $parentId) {
        if (isset($listId)) {
            $listId .= "";
        } else {
            $listId = "";
        }
        foreach ($listData as $value) {
            if ($value ['qu_category_id'] == $parentId) {
                if ($parentId == 0)
                    $listId .= '<option value="' . $value ['id'] . '" class="optionGroup">' . $value ['name'] . '</option>';
                else
                    $listId .= '<option value="' . $value ['id'] . '" class="optionChild">--' . $value ['name'] . '</option>';
                $listId .= $this->categoryCombobox($listData, $value ['id']);
            }
        }
        return $listId;
    }

    function desubId($listData, $parentId) {
        if (isset($listId)) {
            $listId .= "";
        } else {
            $listId = "";
        }
        foreach ($listData as $value) {
            if ($value ['qu_category_id'] == $parentId) {
                $listId .= ',' . $value ['id'];
                $listId .= $this->desubId($listData, $value ['id']);
            }
        }
        return $listId;
    }

}
