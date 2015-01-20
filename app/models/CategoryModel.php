<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryModel
 *
 * @author ThomasElvin
 */
class CategoryModel {

    private $_db;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function create($fields = array()) {
        return $this->_db->insert(CATEGORY_TABLE, $fields);
    }

}
