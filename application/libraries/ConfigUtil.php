<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ConfigUtil {

    public $_TABLE_NAME = "qu_category";

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
        $listID = substr($this->desubId($data['listCat'], $category_id), 1);

        $data['listData'] = $CI->photo_model->getListPhotoByCategoryId($category_id);
        if (!$CI->photo_model->getAllByCategoryId($category_id))
            $image_path = "";
        else {
            foreach ($data['listData'] as $value) {
                $image_path = $value["image_path"];
                break;
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
        
        $data['listData'] = $CI->photo_model->getListPhotoByCategoryId($listID);
        if (!$CI->photo_model->getAllByCategoryId($listID))
            $photo_count = 0;
        else {
            foreach ($data['listData'] as $value) {
                $photo_count++;
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
