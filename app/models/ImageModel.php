<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ImageModel
 *
 * @author ThomasElvin
 */
class ImageModel {

    //Get all users
    public function getImages() {
        $this->_db->get(array('*'), IMAGES_TABLE, null);
        return $this->_db->results();
    }

    public function getImage($ID) {
        $this->_db->get(array('*'), IMAGES_TABLE, array(IMAGE_ID, '=', $ID));
        return $this->_db->results();
    }

    public function delete($ID) {
        return $this->_db->delete(IMAGES_TABLE, array(IMAGE_ID, '=', $ID));
    }

}
