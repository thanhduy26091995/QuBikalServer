<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConfigUtil {

    public $_TABLE_NAME = "qu_category";
    public $_JSON_URL = "http://www.json-generator.com/api/json/get/coZNLplkVu?indent=2";
            public$_JSON_VIEW_URL = "https://jsonblob.com/ecde9da0-b51d-11e6-871b-4b81b588c5fb";

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
        //--------------
        $CI->load->model(array('photo_model', 'category_model'));  //<-------Load the Model firs
        //get list cat id
        $data['listCat'] = $CI->category_model->getTree();
        $listID = $category_id . $this->desubId($data['listCat'], $category_id);

        $listID = str_split($listID);

        $temp_count = "";
        foreach ($listID as $value) {
            if ($value != ',') {
                $data['photo'] = $CI->photo_model->getListPhotoByCategoryId($value);
                if (!$data['photo']) {
                    
                }else{
                    foreach ($data['photo'] as $value) {
                        $image_path = $value['image_path'];
                        break;
                    }
                }
                //$photo_count += count($data['photo']);

                $temp_count = "";
            } else {
                $temp_count += $value;
            }
        }

        return $image_path;
    }

    public function getTotalImage($category_id) {
        $photo_count = "";
        $CI = & get_instance();
        //--------------
        $CI->load->model(array('photo_model', 'category_model'));  //<-------Load the Model firs
        //get list cat id
        $data['listCat'] = $CI->category_model->getTree();
        $listID = $category_id . $this->desubId($data['listCat'], $category_id);

        $listID = str_split($listID);

        $temp_count = "";
        foreach ($listID as $value) {
            if ($value != ',') {
                $data['photo'] = $CI->photo_model->getListPhotoByCategoryId($value);
                $photo_count += count($data['photo']);
                $temp_count = "";
            } else {
                $temp_count += $value;
            }
        }

        return $photo_count;
    }

    function categoryCombobox($listData, $parentId) {
        if (isset($listId)) {
            $listId .= "";
        } else {
            $listId = "";
        }
        foreach ($listData as $value) {
            if ($value['qu_category_id'] == $parentId) {
                if ($parentId == 0)
                    $listId .= '<option value="' . $value['id'] . '" class="optionGroup">' . $value['name'] . '</option>';
                else
                    $listId .= '<option value="' . $value['id'] . '" class="optionChild">--' . $value['name'] . '</option>';
                $listId .= $this->categoryCombobox($listData, $value['id']);
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
            if ($value['qu_category_id'] == $parentId) {
                $listId .= ',' . $value['id'];
                $listId .= $this->categoryCombobox($listData, $value['id']);
            }
        }
        return $listId;
    }

}
